<?php

// Feed.php contains functions that deal with fetching rss feeds and determining keywords of articles fetched.

class Feed extends CI_controller{
	
	// Sync_Feed loads latest articles from rss feed providers in the database (~60).
	// Sync_Feed uses SimplePie RSS feed parser to fetch the rss feeds and parse them.
	// For each articles:
	// 1. Parse the data in the article - source, title, date, and content.
	// 2. Use AlchemyAPI to identify the keyword of the article.
	// 3. Add the article to our database along with the identified keyword.
	
	function sync_feed_all(){
		$this->load->model('feed_model');
		$sources = $this->feed_model->load_sources_all();
		foreach($sources as $source){
			echo $this->sync_feed($source->url);
		}
		echo "Sync complete";
	}
	
	function sync_feed($url){
		$ALCHEMY_QUOTA = 30000;
		date_default_timezone_set('GMT');
		require_once('inc/simplepie.inc');	// SimplePie for parsing RSS feeds
		require_once('inc/AlchemyAPI.php');	// AlchemyAPI for extracting keywords
		$this->load->model('feed_model');
		
		//Fetch the RSS feeds using SimplePie
		
		$feed = new SimplePie($url);
		$feed->enable_cache(false);
		$feed->set_cache_location('cache');
		$feed->set_cache_duration(100);	//default: 10 minutes
		$feed->set_item_limit(11);
		$feed->init();
		$feed->handle_content_type();
		
		// For each articles...
		
		foreach ($feed->get_items() as $item){
			
			// Parse the data in the article fetched.
			
			$permalink = $item->get_permalink();
			if (!$this->feed_model->check_aid($permalink)){	// Proceed only if we don't have the same article in our database.
				$source = $item->get_feed()->get_title();
				$title = $item->get_title();
				$date = $item->get_date();
				$content = $item->get_content();
				
				// Identify the topic of each article using AlchemyAPI, as long as we are under the quota (30000)
				
				if ($this->feed_model->check_meter() < $ALCHEMY_QUOTA) {
					$result = $this->extract_keyword($content, $permalink);
					
					// Save the article and the tag associated with the article into our database.
					
					$article_id = $this->feed_model->add_article($permalink, 1, $title, $source, $result['category'], $date, $content);
					$this->feed_model->add_tags($result['tags'], $result['category'], $article_id, $source);
				} 
				
			}
		}
		return "Sync in progress...";
	}
	
	// Given the permalink of an article, return the content of an article as a string.
	// The "content" of an article is determined by AlchemyAPI.
	
	function feed_hunter($permalink){
		$this->load->model('feed_model');
		
		require_once('inc/AlchemyAPI.php');
		$alchemyObj = new AlchemyAPI();
		$alchemyObj->setAPIKey("1414657c7c56cc31a067f8daafabf1d6978c28fe");
		
		$result = json_decode($alchemyObj->URLGetText($permalink, 'json'));
		
		$this->feed_model->alchemy_meter(1);
		return $result;
	}
	
	// Determines the keyword of an article using AlchemyAPI.
	// Returns the concept, keyword, and category of an article.
	
	function extract_keyword($content, $permalink){
		
		// Set up the text to analyze keyword.
		// If the length of the feed is not up to quality standards, track down and load the actual article.
		
		if (strlen(strip_tags($content)) < 500){
			$extracted_text = $this->feed_hunter($permalink)->text;
					
			// Make sure the newly loaded feed is up to quality standards.
			if (strlen(strip_tags($content)) > 500){
				$specimen = $extracted_text;
			} else {
				$specimen = strip_tags($content);
			}
		} else {
			$specimen = strip_tags($content);
		}
					
		$characters = array('"');
		$replacements = array(' ');
		$text = str_replace($characters, $replacements, $specimen);
		
		// Load the AlchemyAPI and configure access key.
		
		require_once('inc/AlchemyAPI.php');
		$alchemyObj = new AlchemyAPI();
		$alchemyObj->setAPIKey("1414657c7c56cc31a067f8daafabf1d6978c28fe");
		
		// Analyze the article, fetching the concept, keyword, and category of an article.
		
		$tags_json =  json_decode($alchemyObj->TextGetRankedKeywords($text, 'json'));
		$concepts_json = json_decode($alchemyObj->TextGetRankedConcepts($text, 'json'));
		$category = json_decode($alchemyObj->TextGetCategory($text, 'json'));
		$this->feed_model->alchemy_meter(3);
		
		// Parse the result retrieved from AlchemyAPI into an associated array.
		
		$tags = array();
		foreach($concepts_json->concepts as $concept){
			$characters = array("'");
			$replacements = array("");
			$output = str_replace($characters, $replacements, $concept->text);
			$tag['keyword'] = $output;
			$tag['confidence'] = $concept->relevance;
			$tag['is_concept'] = TRUE;
			array_push($tags, $tag);
		}	
		foreach($tags_json->keywords as $keyword){
			$characters = array("'");
			$replacements = array("");
			$output = str_replace($characters, $replacements, $keyword->text);
			$tag['keyword'] = $output;
			$tag['confidence'] = $keyword->relevance;
			$tag['is_concept'] = FALSE;
			array_push($tags, $tag);
		}
		
		// Return the result.
		
		$result['tags'] = $tags;
		$result['category'] = $category->category;
		return $result;
	}
}



//End Feed.php
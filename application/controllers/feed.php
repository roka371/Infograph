<?php

// Feed.php contains functions that deal with fetching rss feeds and determining keywords of articles fetched.

class Feed extends CI_controller{
	
	// Sync_Feed loads latest articles from rss feed providers in the database (~60).
	// Sync_Feed uses SimplePie RSS feed parser to fetch the rss feeds and parse them.
	
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
					
				$article_id = $this->feed_model->add_article($permalink, 1, $title, $source, $date, $content);
				} 
				
			}
		}
		return "Sync in progress...";
	}
}



//End Feed.php
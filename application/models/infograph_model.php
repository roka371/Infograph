<?php
class Infograph_model extends CI_Model {

	// Constructor
	public function __construct(){
			$this->load->database();
	}

	// Returns key-value pairs where keys are article PK of related articles and values are the corresponding confidence score of the relation between the articles.
	function recommend_articles($article_PK){
		// Pull the tag with the highest confidence for this article
		$this->db->select('tag');
		$this->db->where('foreign_key',$article_PK);
		$this->db->where('policy', '1');
		$this->db->order_by('confidence','desc');
		
		$query = $this->db->get('tags');
		
		$related_articles = array();
		foreach($query->result() as $row){
			$main_tag = $row->tag;
			
			// Now get all the articles that contain this tag
			$this->db->select('foreign_key, confidence');
			$this->db->where('tag',$main_tag);
			$this->db->order_by('confidence','desc');
			$query = $this->db->get('tags');
			
			foreach($query->result() as $related_article_row)
				$related_articles[$related_article_row->foreign_key] = $related_article_row->confidence;
			
			if(sizeof($related_articles) > 1)
				break;
		}
		// Remove this article from the matched articles
		unset($related_articles[$article_PK]);

 		return $related_articles;
	}
	
	// Returns key-value pairs where keys are related keywords and values are the corresponding confidence scores.
	// Confidence scores aren't on any interval, so they can range from 0 to Inf. 
	function recommend_keywords($keyword, $limit = 15){
		// Get all the articles for which this is a tag
		$this->db->select('foreign_key, confidence');
		$this->db->like('tag',$keyword);
		$this->db->where('policy','1');
		$this->db->order_by('confidence','desc');
		
		$query = $this->db->get('tags',100,0);
		
		if($query->num_rows() == 0)
			return array();
		
		// Create an associated articles array from previous query.
		$associated_articles = array();
		foreach($query->result() as $row)
			$associated_articles[$row->foreign_key] = $row->confidence;
		
		// Start the where string to get the related tags
		$where_string = "policy = '1' AND ";
		
		// Build the where array using the article foreign keys in associated_articles
		foreach(array_keys($associated_articles) as $article)
			$where_string = $where_string."foreign_key='".$article."' OR ";
		
		// Remove the last OR
		$where_string = substr($where_string, 0 ,strlen($where_string) - 4);
		
		// Execute query
		$this->db->select('tag, confidence');
		$this->db->where($where_string);
		$this->db->order_by('confidence');
		
		$query = $this->db->get('tags');
		
		// Create suggested keywords array
		$suggested_keywords = array();
		foreach($query->result() as $row){
			$suggested_keyword = $row->tag;
			$tag_confidence = $row->confidence;
			
			// If the keyword is already in the array, take the highest associated confidence
			if(array_key_exists($suggested_keyword, $suggested_keywords))
				$suggested_keywords[$suggested_keyword] = ($tag_confidence + $suggested_keywords[$suggested_keyword]);
			else
				$suggested_keywords[$suggested_keyword] = $tag_confidence;
		}
		
		arsort($suggested_keywords);
		
		$suggested_keywords = array_slice($suggested_keywords, 0, $limit);
		
		// Start the where string to get the related tags
		$where_string = "policy = '1' AND ";
		
		// Build the where array using the article foreign keys in associated_articles
		foreach(array_keys($suggested_keywords) as $suggested_keyword)
			$where_string = $where_string."tag='".$suggested_keyword."' OR ";
		
		// Remove the last OR
		$where_string = substr($where_string, 0 ,strlen($where_string) - 4);
		
		// Execute query
		$this->db->select('foreign_key, tag');
		$this->db->where($where_string);
		$this->db->order_by('foreign_key');
		
		$query = $this->db->get('tags',5*$limit,0);
		
		// Create suggested keywords array
		$suggested_articles = array();
		foreach($query->result() as $row){
			$tag = strtolower($row->tag);
			$article = $row->foreign_key;
			
			// If the keyword is already in the array, take the highest associated confidence
			if(array_key_exists($tag, $suggested_articles))
				$suggested_articles[$tag] = $suggested_articles[$tag].';'.$article;
			else
				$suggested_articles[$tag] = $article;
			
		}
		//print_r($suggested_articles);
		return $suggested_articles;
	}
	
	// Returns key-value pairs where keys are related keywords and values are the corresponding confidence scores.
	// Confidence scores aren't on any interval, so they can range from 0 to Inf. 
	function recommend_keywords11($search){
		// Separate search input into individual words
		$keywords = explode("_", $search);
		$this->db->select('id');
		$this->db->like('content', $keywords[0]);
		for($i = 1; $i < sizeof($keywords); $i++)
			$this->db->or_like('content', $keywords[$i]);
		$this->db->order_by('thumbnail_width','desc');
		
		$query = $this->db->get('articles',60,0);
		
		// Create an associated articles array from previous query.
		$associated_articles = array();
		foreach($query->result() as $row)
			$associated_articles[] = $row->id;
		
		// Start the where string to get the related tags
		$where_string = "policy = '1' AND ";
		
		// Build the where array using the article foreign keys in associated_articles
		foreach($associated_articles as $article)
			$where_string = $where_string."foreign_key='".$article."' OR ";
		
		// Remove the last OR
		$where_string = substr($where_string, 0 ,strlen($where_string) - 4);
		
		//echo $where_string;
		
		// Execute query
		$this->db->select('tag, confidence');
		$this->db->where($where_string);
		$this->db->order_by('confidence');
		
		$query = $this->db->get('tags');
		
		// Create suggested keywords array
		$suggested_keywords = array();
		foreach($query->result() as $row){
			$suggested_keyword = $row->tag;
			$tag_confidence = $row->confidence;
			
			// If the keyword is already in the array, take the highest associated confidence
			if(array_key_exists($suggested_keyword, $suggested_keywords))
				$suggested_keywords[$suggested_keyword] = ($tag_confidence + $suggested_keywords[$suggested_keyword]);
			else
				$suggested_keywords[$suggested_keyword] = $tag_confidence;
		}
		
		arsort($suggested_keywords);
		
		return $suggested_keywords;
	}
	
	function recommend_keywords1($keyword, $limit = 10){
		// Get all the articles for which this is a tag
		$this->db->select('foreign_key, confidence');
		$this->db->like('tag',$keyword);
		$this->db->where('policy','1');
		$this->db->order_by('confidence','desc');
		
		$query = $this->db->get('tags',70,0);
		
		// Create an associated articles array from previous query.
		$associated_articles = array();
		foreach($query->result() as $row)
			$associated_articles[$row->foreign_key] = $row->confidence;
		
		// Start the where string to get the related tags
		$where_string = "status = '1' AND ";
		
		// Build the where array using the article foreign keys in associated_articles
		foreach(array_keys($associated_articles) as $article)
			$where_string = $where_string."id='".$article."' OR ";
		
		// Remove the last OR
		$where_string = substr($where_string, 0 ,strlen($where_string) - 4);
		
		// Execute query
		$this->db->select('content');
		$this->db->where($where_string);
		
		$query = $this->db->get('articles');
		
		// Create suggested keywords array
		$suggested_keywords = array();
		foreach($query->result() as $row){
			$article_content = $row->content;
			$article_content = strip_tags($article_content);
			//echo $article_content.'<br><br><br>';
			$suggested_keywords = array_merge($suggested_keywords,explode(' ',$article_content));
		}
		$keyword_before = '';
		foreach($suggested_keywords as $suggested_keyword){
			// If the keyword is already in the array, take the highest associated confidence
			if(!$this->isPropper($suggested_keyword, $keyword_before)){
				$keyword_before = $suggested_keyword;
				continue;
			}
			$suggested_keyword = preg_replace('/[^a-z0-9]+/i', '', $suggested_keyword);
			if(array_key_exists($suggested_keyword, $suggested_keywords))
				$suggested_keywords[$suggested_keyword] = (1.2*$suggested_keywords[$suggested_keyword]);
			else
				$suggested_keywords[$suggested_keyword] = 1.2;
				
			$keyword_before = $suggested_keyword;
		}
		
		arsort($suggested_keywords);
		
		return $suggested_keywords;
	}
	
	private function isPropper($current, $before){
		// Check if before contains a period
		if (strpos($before,'.') !== false || strpos($before,'!') !== false || strpos($before,'?') !== false)
			return false;
		if(strlen($current) < 4)
			return false;
		return !(strtolower($current) == $current);
	}
	
	function get_articles($article_PK_string){
		$article_PKs = explode(';', $article_PK_string);
		if (sizeof($article_PKs) == 0){
			return 'null';
		}
		$this->db->where('id', $article_PKs[0]);
		for($i = 1; $i < count($article_PKs); $i++)
			$this->db->or_where('id', $article_PKs[$i]);
		
		return $this->db->get('articles')->result();
	}
}

/* End file infograph_model.php*/
/* Location /models/infograph_model.php*/
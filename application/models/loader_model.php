<?php

	class Loader_Model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		// Load_articles_keyword returns articles associated with a keyword.
		function load_articles_keyword($tag, $order, $init){
			//Retrieve the id of all articles related to the tag given.
			$entries = array();
			$results = $this->db->query("SELECT * FROM tags WHERE confidence > 0.4 AND tag = '".$tag."' OR policy = 1 AND tag LIKE '%".$tag."%'")->result();
			
			if (empty($results)){
				return NULL;
			}
			//Create a query statement for finding articles with corresponding id.
			$query = "SELECT * FROM articles WHERE id = '";
			foreach($results as $tag){
				$query = $query.$tag->foreign_key."' OR id = '";
			}
			$query = substr($query, 0, -10);
			
			if ($order == 'popularity'){
				$query = $query." ORDER BY popularity DESC, datetime DESC LIMIT ".$init.", 10";
			} else {
				$query = $query." ORDER BY datetime DESC, popularity DESC LIMIT ".$init.", 10";
			}
		
			//Execute the query.
			return $this->db->query($query)->result();
		}
		
		// Decode_relative_date determines how much time has elapsed since the article was published.
		function decode_relative_date($datetime){
			$second = time() - strtotime($datetime);
			$minute=intval(abs($second/60));
			$hour=intval(abs($minute/60));
			$day=intval(abs($hour/24));
			$week = intval(abs($day/7));
			$month=intval(abs($day/30));
			$year=intval(abs($month/12));
			
			if ($year > 0){
				if ($year == 1){
					return '1 year ago';
				} else {
					return $year.' years ago';
				}
			} else if ($month > 0){
				if ($month == 1){
					return '1 month ago';
				} else {
					return $month.' months ago';
				}
			} else if ($week > 0){
				if ($week == 1){
					return '1 week ago';
				} else {
					return $week.' weeks ago';
				}
			} else if ($day > 0){
				if ($day == 1){
					return '1 day ago';
				} else {
					return $day.' days ago';
				}
			} else if ($hour > 0){
				if ($hour == 1){
					return '1 hour ago';
				} else {
					return $hour.' hours ago';
				}
			} else if ($minute > 0){
				if ($minute == 1){
					return '1 minute ago';
				} else {
					return $minute.' minutes ago';
				}
			} else {
				if ($second < 10){
					return 'Just Now';
				} else {
					return $second. ' seconds ago';
				}
				
			}
		}
		
		// Load_article returns a single article from the database.
		function load_article($id){
			return $this->db->get_where('articles', array('id' => $id))->row();
		}
		
		
	}
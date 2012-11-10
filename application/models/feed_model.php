<?php

// Feed_model.php contains functions that deal with database operations for caching articles.

class Feed_Model extends CI_Model {
		public function __construct(){
			$this->load->database();
		}
		
		// Load all sources from the database
		
		function load_sources_all(){
			return $this->db->get('sources')->result();
		}
		
		// Adds an article to the database.
		// Returns the id of the article in database.
		
		function add_article($permalink, $status, $title, $source, $date, $content){
			
			// Encode the date into MySQL Datetime format.
			
			$date = $this->encode_date($date);
			
			// Extract the thumbnail from loaded content.
			
			preg_match('/<img[^>]+>/i',$content, $result); 
			if ($result == NULL){
				$thumbnail = NULL;
				$thumbnail_width = NULL;
				$thumbnail_height = NULL;
			}else{
			preg_match('/(src)=("[^"]*")/i',$result[0], $output);
				$thumbnail = str_replace("src=", "", $output[0]);
				$thumbnail_dimension = getimagesize(substr($thumbnail, 1, -1));
				$thumbnail_width = $thumbnail_dimension[0];
				$thumbnail_height = $thumbnail_dimension[1];
			}
			
			// Add the article into database.
			
			$this->db->insert('articles', array(
				'aid' => $permalink, 'status' => $status, 'title' => $title, 'source' => $source, 'thumbnail' => $thumbnail, 'thumbnail_width' => $thumbnail_width, 'thumbnail_height' => $thumbnail_height, 'datetime' => $date, 'content' => $content
			));
			return $this->db->get_where('articles', array('aid' => $permalink))->row()->id;
		}

		// Encodes a string into a MySQL Datetime format.
		
		function encode_date($date){
			$result = explode(' ', $date);
			$result_time = explode(':', $result[3]);
			$day = $result[0];
			$month = $result[1];
			$year = substr($result[2], 0, -1);
			$hour = $result_time[0];
			$minute = $result_time[1];
			$type = $result[4];
			
			switch($month){
				case 'January':
					$month = '01';
					break;
				case 'February':
					$month = '02';
					break;
				case 'March':
					$month = '03';
					break;
				case 'April':
					$month = '04';
					break;
				case 'May':
					$month = '05';
					break;
				case 'June':
					$month = '06';
					break;
				case 'July':
					$month = '07';
					break;
				case 'August':
					$month = '08';
					break;
				case 'September':
					$month = '09';
					break;
				case 'October':
					$month = '10';
					break;
				case 'November':
					$month = '11';
					break;
				case 'December':
					$month = '12';
					break;										
			}
			
			if ($type == 'pm' AND $hour != '12'){
				$hour = strval((intval($hour)+12));
			} else if ($type =='am' AND $hour == '12'){
				$hour = strval((intval($hour)-12));
			}
			
			$date = $year.'-'.$month.'-'.$day.' '.$hour.':'.$minute.':00';
			return $date;
		}
			
		// Check whether an article is in the database already.
		
		function check_aid($permalink){
			if ($this->db->get_where('articles', array('aid' => $permalink))->num_rows() == 0){
				return false;
			} else{
				return true;
			}
		}
}

//End of Feed_model
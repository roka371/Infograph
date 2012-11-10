<?php

// Infograph.php contains functions for loading the main Infograph View, associated keywords, and articles.

class Infograph extends CI_Controller {
	function __construct()	//Constructor
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	// Loads Infograph
	function index(){
		$this->load->view('infograph');
	}
	
	// Get_keyword_recommendation returns keywords associated with a keyword.
	function get_keyword_recommendation($type){
		$keyword = $this->input->post('keyword');
		$memory = $this->input->post('memory');
		
		$appeared_keywords = explode(';', $memory);
		
		$data['memory_words'] = $appeared_keywords;
		$this->load->model('infograph_model');
		$recommended_keywords = $this->infograph_model->recommend_keywords($keyword);	
		
		$i = 0;
		if ($type == 'init'){
			$keywords = '';
			$articles = '';
			foreach($recommended_keywords as $recommended_keyword => $article_PK_string){
				if($i == 6) break;
					$articles = $articles.$article_PK_string.'/';
					$keywords = $keywords.$recommended_keyword.';';
				$i++;
			}
			$keywords = substr($keywords, 0, -1);
			$articles = substr($articles, 0, -1);
			echo $keywords.'|'.$articles;
		} else {
			$data['memory'] = '';
			$data['keywords'] = array();
			$data['articles'] = array();
			
			if(count($recommended_keywords) < 5){
				return;
			}
			foreach($recommended_keywords as $recommended_keyword => $article_PK_string){
				if($i == 6) break;
				
				foreach($appeared_keywords as $redundant_keyword){
					if ((strpos(strtolower($redundant_keyword), strtolower($recommended_keyword)) !== false)){
						continue 2;
					}
				}
				array_push($data['articles'], $article_PK_string);
				array_push($data['keywords'], $recommended_keyword);
				$data['memory'] = $data['memory'].$recommended_keyword.';';
				$i++;
			}
			$data['type'] = $type;
			if(count($data['keywords']) < 5)
				return;
			//print_r($data);
			return $this->load->view('infograph_view', $data);
		}
	}
	
	function load_articles(){
		$articles = $this->input->post('articles');
		$this->load->model('infograph_model');
		$data['articles'] = $this->infograph_model->get_articles($articles);
		return $this->load->view('infograph_popover', $data);
	}
	
	function isSame($str1, $str2){
		if (strpos($str1, $str2) !== false){
			return false;
		}
		return true;
	}
	
	// Load_articles_keyword returns articles associated with a keyword.
	function load_articles_keyword($keyword){
		
		// Implementation Here
		
	}
	
	// Load_article returns a single article from the database.
	/*
	function load_article($id, $timezone){
		$this->load->model('loader_model');
		$this->load->model('feed_model');
		$this->load->model('social_model');
		$item = $this->loader_model->load_article_by_id($id);
		$data['permalink'] = $item->aid;
		$data['source'] = $item->source;
		$data['title'] = $item->title;
		$data['date'] = $this->feed_model->decode_date($item->datetime, $timezone);
		$data['content'] = $item->content;
		$data['item'] = $item;
		$data['username'] = $this->session->userdata('username');
		$data['whole_name'] = $this->loader_model->get_wholename($data['username']);
		$data['profile_ext'] = $this->loader_model->get_profileExt($data['username']);
		$data['comments'] = $this->social_model->get_comments($id);
		
		// Fullscreen Article View for Infograph here.
	}
	*/
	
}
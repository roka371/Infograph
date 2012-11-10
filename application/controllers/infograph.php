<?php

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
	
	// Load_articles_keyword returns articles associated with a keyword.
	function load_articles_keyword($keyword){
		
		// Implementation Here
		
	}
	
	// Load_article returns a single article from the database.
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
	
}
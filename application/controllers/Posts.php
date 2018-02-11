<?php

class Posts extends CI_Controller{

	public function index () {     
		// create title variable inside $data array to hold page name
		$data['title'] = 'Latest Posts';
		$data['posts'] = $this->post_model->get_posts();
		// check if data is being returned
		print_r($data['posts']);

		// load views, posts/index, and any data we added to $data array
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
		
	}
}
<?php

class Posts extends CI_Controller{

	public function index () {     
		// create title variable inside $data array to hold page name
		$data['title'] = 'Latest Posts';
		$data['posts'] = $this->post_model->get_posts();

		// load views, posts/index, and any data we added to $data array
		$this->load->view('templates/header');
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
		
	}
	
	public function view($slug = NULL) {
		// create $data array to hold post info
		$data['post'] = $this->post_model->get_posts($slug);
		
		if (empty($data['post'])) {
			show_404();
		}
		
		// load views, post/view, and any data we added to $data array for the post itself
		$data['title'] = $data['post']['title'];
		$this->load->view('templates/header');
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}
	
	public function create() {
		
		$data['title'] = 'Create Post';
		$this->load->view('templates/header');
		$this->load->view('posts/create', $data);
		$this->load->view('templates/footer');
	}
}
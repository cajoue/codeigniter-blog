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
		
//		create rules for form validation
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');
		
//		check if validation has ran - if form has been successfully submitted
//		if yes, call a model function to INSERT and redirect to list of posts
//		if no just load the template views
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header');
			$this->load->view('posts/create', $data);
			$this->load->view('templates/footer');
		} else {
			$this->post_model->create_post();
			redirect('posts');
		}
	}
	
	public function delete($id) {
//		check $id is passed from view
//		echo $id;	
//		call the post model to delete the post
//		then redirect to list view
		$this->post_model->delete_post($id);
		redirect('posts');
	}		
	
	public function edit($slug) {
//		use same set up as view single post
		$data['post'] = $this->post_model->get_posts($slug);
		
		if (empty($data['post'])) {
			show_404();
		}
		
		// load views, post/view, and any data we added to $data array for the post itself
		$data['title'] = 'Edit Post';
		$this->load->view('templates/header');
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
		
	}
}
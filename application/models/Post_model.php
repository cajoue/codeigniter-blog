<?php
	class Post_model extends CI_Model {
		
		public function __construct(){
//		parent::__construct();	TODO: find out if this is necessary
			$this->load->database();
		}
		
		public function get_posts($slug = FALSE) {
			// if slug not passed
			if ($slug === FALSE) {
				// using Active Model in codeigniter
				$this->db->order_by('id','DESC');
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			// if a slug is passed
			$query = $this->db->get_where('posts', array('slug' => $slug));
			return $query->row_array();
		}
		
		public function create_post() {
//			get data from form
//			will need a slug for post url
			$slug = url_title($this->input->post('title'));
			
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
			);
			
//			pass data array to db, INSERT into table posts
			return $this->db->insert('posts', $data); 
			
		}
		
		public function delete_post($id) {
//			where db field mataches param
			$this->db->where('id', $id);
//			delte from this table
			$this->db->delete('posts');
//			do not know why this has been set as true but it has
			return TRUE;
		}
		
		public function update_post() {
//			get new data from form
			$slug = url_title($this->input->post('title'));
//			note can't edit slug directly, but can change title and edit slug based on that if needed
			
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body')
			);
			
//			where record id matches input id, pass data array to db, UPDATE in table posts
			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data); 
		}		
	}
	
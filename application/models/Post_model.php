<?php
	class Post_model extends CI_Model {

		public function __construct() {
			$this->load->database();
		}
		
		public function get_posts($slug = FALSE) {
			// if slug not passed
			if ($slug === FALSE) {
				// using Active Model in codeigniter
				$query = $this->db->get('posts');
				return $query->result_array();
			}
			// if a slug is passed
			$query = $this->db->get_where('posts', array('slug'=>$slug));
			return $query->row_array();
		}
	}
	
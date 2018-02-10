<?php

class Pages extends CI_Controller{
    
    // APPPATH gives path to application folder
    // if requested page view doesn't exist show error
    public function view ($page = 'home') {
        if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }
        
        // create title variable inside $data array to hold page name
        // $data is data that want to pass into the view
        $data['title'] = ucfirst($page);
        
        // load views, page name, and any data we added to $data array
        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
        
    }
}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookmarks extends CI_Controller {
    public function index() {
        $this->load->view('bookmarks/index.php');
    }

    public function process() {
        $data = array(
            'name' => $this->input->post('name'),
            'url' => $this->input->post('url'),
            'folder' => $this->input->post('folder'),
        );

        // $this->load->view('bookmarks/index.php', $data);
    }
}  
?>
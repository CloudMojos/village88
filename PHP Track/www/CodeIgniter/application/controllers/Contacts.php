<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
    public function index() {
        // $this->load->model("Bookmark");

        // $data["all_bookmarks"] = $this->Bookmark->get_all_bookmarks();
        // $this->load->view('bookmarks/index.php', $data);
    }

    // public function process() {
    //     $this->load->model("Bookmark");

    //     $data = array(
    //         'name' => $this->input->post('name'),
    //         'url' => $this->input->post('url'),
    //         'folder' => $this->input->post('folder'),
    //     );
        
    //     $result = $this->Bookmark->add_bookmark($data);
    //     redirect('/');
    // }

    // public function delete($id) {
    //     $this->load->model("Bookmark");

    //     $result = $this->Bookmark->delete_bookmark($id);
    //     redirect('/');
    // }
}  
?>
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {
    public function index() {
        $this->load->model("Contact");

        $data["all_contacts"] = $this->Contact->get_all_contacts();
        $this->load->view('contacts/index.php', $data);
    }

    public function new() {
        $this->load->view('contacts/new.php');
    }

    public function create() {
        $this->load->model("Contact");

        $data = array(
            'name' => $this->input->post('name'),
            'contact_number' => $this->input->post('contact-number')
        );

        $result = $this->Contact->add_contact($data);
        redirect('/');
    }

    public function show($id) {
        $this->load->model("Contact");
        $result = $this->Contact->get_contact_by_id($id);

        $data["contact"] = $result;
        $this->load->view('contacts/show.php', $data);
    }

    public function edit($id) {
        $data["contact_id"] = $id;

        $this->load->view('contacts/edit.php', $data);
    }

    public function update($id) {
        $this->load->model("Contact");
        $new_data = Array(
            'name' => $this->input->post('name'),
            'contact_number' => $this->input->post('contact-number')
        );
        $result = $this->Contact->edit_contact_by_id($id, $new_data);
        redirect('/');
    }

    public function destroy($id) {
        $this->load->model("Contact");
        $result = $this->Contact->delete_contact($id);
        redirect('/');
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
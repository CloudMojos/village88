<?php 

class FeedbackForm extends CI_Controller {
    public function index() {
        $this->load->view('feedbackform/index.php');
    }

    public function result() {
        $data = array(
            'name' => $this->input->post('name'),
            'course' => $this->input->post('course'),
            'score' => $this->input->post('score'),
            'reason' => $this->input->post('reason'),
        );

        $this->load->view('feedbackform/result.php', $data);
    }
}

?>
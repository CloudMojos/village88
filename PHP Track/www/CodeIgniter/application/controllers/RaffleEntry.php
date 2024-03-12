<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RaffleEntry extends CI_Controller {
    public function index() {
        $this->load->helper('string'); 

        if (!$this->session->has_userdata('winner_count')) {
            $this->session->set_userdata('winner_count', 0);
        }

        $random_number = random_string('basic', 7);

        $data = array(
            'random_number' => $random_number,
            'winner_count' => $this->session->userdata('winner_count')
        );
        $this->load->view('raffle_entry/index.php', $data);
    }

    public function update_winner_count() {
        $this->session->set_userdata('winner_count', $this->session->userdata('winner_count') + 1);

        redirect('/');
    }
}
?>

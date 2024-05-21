<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class MoneyButton extends CI_Controller {
    public function index() {
        if (!$this->session->has_userdata('money')) {
            $this->session->set_userdata('money', 500);
        }

        $data = array(
            'money' => $this->session->userdata('money')
        );
        $this->load->view('moneybutton/index', $data);
    }

    public function process() {
        $button_value = $this->input->post('button');
        switch ($button_value) {
            case 'lowRisk':
                $earnings = rand(25, 100);
                break;
            case 'moderateRisk':
                $earnings = rand(-100, 100);
                break;
            case 'highRisk':
                $earnings = rand(-500, 2500);
                break;
            case 'severeRisk':
                $earnings = rand(-3000, 5000);
                break;
            default:
                header('Location: index.php');
                exit();
        }

        $this->session->set_userdata('money', $this->session->set_userdata('money') + $earnings);

        redirect('/');
    }
}

?>
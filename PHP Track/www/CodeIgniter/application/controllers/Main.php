<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	public function index() 
	{
		echo "You're Heisenberg";
	}

	public function world() 
	{
		$this->load->view('main/world');
	}

	public function ninja($number)
	{
		$data = array(
			'number' => $number
		);
		$this->load->view('main/ninja', $data);
	}

	public function users()
	{
		$this->load->view('users/index');
	}

	public function new()
	{
		$this->load->view('users/new');
	}

	public function create()
	{
		$data["data"] = $this->input->post(NULL, TRUE);
		if ($data["data"] != NULL) {
			$this->load->view('users/create', $data);
		}
		else {
			$this->load->view('users/index');
		}
	}

	public function count()
	{
		if ($this->session->userdata('count') == NULL) {
			echo "yes";
			$count = 1;
		} else {
			$count = $this->session->userdata('count');
			$count++;
		}

		echo $count;
		$this->session->set_userdata('count', $count);
	}

	public function reset()
	{
		$this->session->set_userdata('count', 0);
	}

	public function hello()
	{
		echo "Hello World!";
	}

	public function say()
	{
		echo "hi";
	}

	public function say_anything($string) 
	{
		echo strtoupper($string);
	}

	// public function danger() 
	// {
	// 	$this->index();
	// }
}

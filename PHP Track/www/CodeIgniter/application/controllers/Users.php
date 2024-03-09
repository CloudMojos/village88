<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function index() {
        echo "Haiii";
    }

	public function say($string, $number) {
        for ($i = 0; $i < $number; $i++) {
            echo $string;
            echo "<br>";
        }
    }

    public function mprep()
     {
          $view_data = array(
               'name' => "Michael Choi",
               'age'  => 40,
               'location' => "Seattle, WA",
               'hobbies' => array( "Basketball", "Soccer", "Coding", "Teaching", "Kdramas")
           );
           $this->load->view('users/mprep', $view_data);
     }

}

?>
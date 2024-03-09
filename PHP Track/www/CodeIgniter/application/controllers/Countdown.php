<?php
class Countdown extends CI_Controller {
    public function main() {
        $current_date = date("Y-m-d H:i:s");
        $target_date = date("Y-m-d 00:00:00", strtotime("+1 day"));
        $remaining_seconds = strtotime($target_date) - strtotime($current_date);

        $data['current_date'] = $current_date;
        $data['remaining_seconds'] = $remaining_seconds;

        // Load view
        $this->load->view('countdown/index.php', $data);
    }
}
?>
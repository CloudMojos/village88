<?php 
    class HTML_Generator {
        public function __construct() {

        }

        public function render_input($info_array) {
            foreach ($info_array as $key => $value) {
                echo "<label>" . $key . "</label>";
                echo "<br>";
                echo "<input type=\"text\" value=\"" . $value . "\"";
                echo "<br><br><br>";
            }
            return $this;
        }
        public function render_list($list_array) {
            echo "<ol>";
            foreach ($list_array as $key => $value) {
                echo "<li>" . $value . "</li>";
            }
            echo "</ol>";
        }
    }

    $input = new HTML_Generator();
    $input->render_input([
        "name" => "Bag", 
        "price" => "250",
        "stocks" => "10"]);
    $input->render_list(["Apple", "Banana", "Cherry"]);
?>

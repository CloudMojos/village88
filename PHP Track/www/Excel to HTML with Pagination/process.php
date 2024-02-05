<?php 
    require('new-connection.php');
    session_start();

    // Hidden input 'to. Hindi 'to yung attribute ng form.
    if (isset($_POST['action']) && $_POST['action'] == 'upload') {
        _upload_file();
    }

    if (isset($_POST['open'])) {
        _display_file();
    }

    function _upload_file() {
        $errors = array();
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["csv"]["name"]);
        $flag = 1;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a CSV
        if(isset($_POST["submit"])) {
            if ($file_type !== "csv") {
            echo "File is not a CSV.";
            $flag = 0;
            } else {
            echo "File is a CSV.";
            $flag = 1;
            }
        }

        $file_name = isset($_POST['file-name']) && !empty($_POST['file-name']) ? $_POST['file-name'] . '.csv' : basename($_FILES["csv"]["name"]);
        $target_file = $target_dir . $file_name;
        // echo "<br>";
        // echo "$file_name";
        // echo "<br>";
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, {$target_file} already exists.";
            $flag = 0;
        }

        // Check file size
        if ($_FILES["csv"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $flag = 0;
        }
        // echo "<br><br>"
        // echo $_FILES["csv"]["name"];
        // echo "<br>";
        // echo $_FILES["csv"]["tmp_name"];
        // die();

        // Check if $flag is set to 0 by an error
        if ($flag == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file = $_FILES["csv"]["tmp_name"], $target_file)) {
                _insert_file_to_db($target_file);
                echo "The file ". htmlspecialchars($file_name). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }
        die();
        header('Location: index.php');
    }

    function _insert_file_to_db($file) {
        ini_set('auto_detect_line_endings', true);
        $handle = fopen($file, "r");
        $fields = fgetcsv($handle, 1000, ",");
        $tablename = pathinfo($file, PATHINFO_FILENAME);
        echo "<br>";
        echo "$tablename";
        echo "<br>";
        var_dump($fields);
        // WE CREATE THE TABLE USING THE FIELDS AND FILENAME
        echo "<br>";
        echo implode(" VARCHAR(255) NOT NULL,", $fields);
        $query = "CREATE TABLE {$tablename}";

        // foreach()
        die();
        // while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

        // }
    }
?>
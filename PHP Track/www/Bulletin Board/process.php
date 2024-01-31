<?php 
    // Hidden input 'to. Hindi 'to yung attribute ng form.
    if (isset($_POST['action'] && $_POST['action'] == 'entry')) {
        $errors = array();

        if (empty($_POST['subject'])) {
            $errors[] = "Subject must not be empty";
        }

        if (empty($_POST['details'])) {
            $errors[] = "Details must not be empty";
        }
    }

?>
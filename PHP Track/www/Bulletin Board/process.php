<?php 
    require('new-connection.php');

    $val = array(
        'subject' => $_POST['subject'],
        'details' => $_POST['details'],
    );

    // Hidden input 'to. Hindi 'to yung attribute ng form.
    if (isset($_POST['action']) && $_POST['action'] == 'entry') {
        $errors = array();

        if (empty($_POST['subject'])) {
            $errors[] = "Subject must not be empty";
        }

        if (empty($_POST['details'])) {
            $errors[] = "Details must not be empty";
        }
    }

    // Check for errors, redirect to index
    if (!empty($errors)) {
        session_start();
        $_SESSION['error_messages'] = $errors;
        header('Location: index.php');
    } 
    // Else, add it to the db, redirect to main view
    else {
        $query = "INSERT INTO {$table}(subject, details, date_created) VALUES('{$val['subject']}', '{$val['details']}', NOW())";
        if(run_mysql_query($query)) {
            echo "New lesson has been added!";
        }
        else {
            echo "Failed to add new lesson "; 
        }
        header('Location: main.php');
    }

    // "INSERT INTO {$table}(name, phone_number, date_created) VALUES('{$name}', '{$phone}', NOW())";

?>
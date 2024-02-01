<?php 
    require('new-connection.php');
    session_start();
    $errors = array();

    // Hidden input 'to. Hindi 'to yung attribute ng form.
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        _register_user($_POST);
    }

    if (isset($_POST['action']) && $_POST['action'] == 'login') {
       _login_user($_POST);
    }

    

    // if (empty($_POST['subject'])) {
    //     $errors[] = "Subject must not be empty";
    // }

    // if (empty($_POST['details'])) {
    //     $errors[] = "Details must not be empty";
    // }

    // Else, add it to the db, redirect to main view
    // else {
    //     $query = "INSERT INTO {$table}(subject, details, date_created) VALUES('{$val['subject']}', '{$val['details']}', NOW())";
    //     if(run_mysql_query($query)) {
    //         echo "New lesson has been added!";
    //     }
    //     else {
    //         echo "Failed to add new lesson "; 
    //     }
        
    // }

    function _register_user($post) {
        // First name validation
        global $errors;
        if (empty($_POST['first-name'])) {
            $errors[] = "First name must not be empty";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['first-name']))) {
            $errors[] = "First name could not contain numbers";
        }

        // Last name validation
        if (empty($_POST['last-name'])) {
            $errors[] = "Last name must not be empty";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['last-name']))) {
            $errors[] = "Last name could not contain numbers";
        }

        // Email validation
        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please provide a valid email";
        } 

        // Password validation
        if (empty($_POST['password'])) {
            $errors[] = "Please provide a password";
        }

        // Repeat password validation
        if (strcmp($_POST['repeat-password'], $_POST['password']) != 0) {
            $errors[] = "Password must match";
        }

        if (!empty($errors)) {
            session_start();
            $_SESSION['error_messages'] = $errors;
        } else {
            $salt = bin2hex(openssl_random_pseudo_bytes(10));
            $encrypted_password = md5($_POST['password'] . '' . $salt);
            $query = "INSERT INTO authentication_1(first_name, last_name, email, salt, password, created_at) 
                            VALUES('{$_POST['first-name']}', '{$_POST['last-name']}', '{$_POST['email']}', '$salt', '$encrypted_password', NOW());";
            echo $query;
            echo run_mysql_query($query);
        }
        // header('Location: register.php');
    }
    
    function _login_user($post) {

    }

    // "INSERT INTO {$table}(name, phone_number, date_created) VALUES('{$name}', '{$phone}', NOW())";

?>
<?php 
    require('new-connection.php');
    session_start();

    $table_replies = 'replies';
    $table_reviews = 'reviews';
    $table_users = 'users';

    // Hidden input 'to. Hindi 'to yung attribute ng form.
    if (isset($_POST['action']) && $_POST['action'] == 'register') {
        _register_user($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
       _login_user($_POST);
    }
    if (isset($_POST['action']) && $_POST['action'] == 'forgot-password') {
        _reset_password($_POST);
    }

    function _reset_password($post) {
        $errors = array();
        $user;

        // Email validation
        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email.";
        } else if (!($user = in_db($_POST['email'], "email"))) {
            $errors[] = "Email not found!";
        }

        // Phone validation
        if (!preg_match('/^09\d{9}$/', $_POST['phone'])) {
            $errors[] = "Please provide valid phone number";
        }

        // Check if user phone equals post phone

        if (strcmp($_POST['phone'], $user['phone']) != 0) {
            $errors[] = "Error: You must provide the correct email and contact no.";
        }

        if (!empty($errors)) {  
            $_SESSION['error_messages'] = $errors;
            header('Location: i-forgor.php');
        } else {
            $_SESSION['user'] = $user;
            $encrypted_password = md5('village88'. '' . $user['salt']);
            $query = "UPDATE authentication_1 SET password = '{$encrypted_password}' WHERE email = '{$user['email']}' AND phone = '{$user['phone']}';";
            header('Location: main.php');
        }
    }

    function _login_user($post) {
        $errors = array();
        $user;

        // Email validation
        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email.";
        } else if (!($user = in_db($_POST['email'], "email"))) {
            $errors[] = "Email not found!";
        }

        // Password validation 
        if (empty($_POST['password'])) {
            $errors[] = "Please provide a password.";
        } 
        else if (!check_password($_POST['password'], $user['salt'], $user['password'])) {
            $errors[] = "Password is incorrect";
        }
        
        echo check_password($_POST['password'], $user['salt'], $user['password']);

        if (!empty($errors)) {  
            $_SESSION['error_messages'] = $errors;
            header('Location: index.php');
        } else {
            $_SESSION['user'] = $user;
            header('Location: main.php');
        }
    }

    // return false if not match;
    function check_password($pass, $salt, $actual) {
        $expected = md5($pass . '' . $salt);
        echo $expected;
        echo "<br>";
        echo $actual;
        echo "<br>";
        return strcmp($expected, $actual) == 0;
    }

    function in_db($string, $field) { 
        $query = "SELECT * FROM authentication_1 WHERE $field = '{$string}' ";
        return fetch_record($query);
    }

    function _register_user($post) {
        // First name validation
        $errors = array();
        global $table_users;
        if (empty($_POST['first-name'])) {
            $errors[] = "First name must not be empty";
        } else if (strlen($_POST['first-name']) < 2) {
            $errors[] = "First name must be longer than 2 characters";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['first-name']))) {
            $errors[] = "First name could not contain numbers";
        }

        // Last name validation
        if (empty($_POST['last-name'])) {
            $errors[] = "Last name must not be empty";
        } else if (strlen($_POST['last-name']) < 2) {
            $errors[] = "Last name must be longer than 2 characters";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['last-name']))) {
            $errors[] = "Last name could not contain numbers";
        }

        // Email validation
        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please provide a valid email";
        } else if (in_db($_POST['email'], "email")) {
            $errors[] = "Email already exists"; 
        }

        // Phone validation
        if (!preg_match('/^09\d{9}$/', $_POST['phone'])) {
            $errors[] = "Please provide valid phone number";
        }

        // Password validation
        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please provide a valid email";
        } 

        // Password validation
        if (empty($_POST['password'])) {
            $errors[] = "Please provide a password";
        } else if (strlen($_POST['password']) < 8) {
            $errors[] = "Password must be longer than 8 characters";
        } 

        // Repeat password validation
        if (strcmp($_POST['repeat-password'], $_POST['password']) != 0) {
            $errors[] = "Password must match";
        }

        var_dump($errors);

        if (!empty($errors)) {
            $_SESSION['error_messages'] = $errors;
        } else {
            $salt = bin2hex(openssl_random_pseudo_bytes(10));
            $encrypted_password = md5($_POST['password'] . '' . $salt);
            $query = "INSERT INTO {$table_users}(first_name, last_name, email, phone, salt, password, created_at, updated_at) 
                            VALUES('{$_POST['first-name']}', '{$_POST['last-name']}', '{$_POST['email']}', '{$_POST['phone']}', '$salt', '$encrypted_password', NOW(), NOW());";
            // echo $query;
            run_mysql_query($query);
        }
        header('Location: register.php');
    }
?>
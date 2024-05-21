<?php 
    $_SESSION['form_submitted'] = true;
    if (isset($_POST['action']) && $_POST['action'] == 'login') {
        session_start();
        $errors = array();

        if (empty($_POST['first-name'])) {
            $errors[] = "First name should not be empty";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['first-name']))) {
            $errors[] = "First name should not contain any numbers.";
        } 
        
        if (empty($_POST['last-name'])) {
            $errors[] = "Last name should not be empty";
        } else if (!ctype_alpha(str_replace(' ', '', $_POST['last-name']))) {
            $errors[] = "Last name should not contain any numbers.";
        }    

        if (empty($_POST['email'])) {
            $errors[] = "Please provide an email";
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please provide a valid email";
        } 

        if (strlen($_POST['title']) > 50) {
            $errors[] = "Issue title should not be more than 50 characters.";
        }

        if (strlen($_POST['details']) > 250) {
            $errors[] = "Issue details should not be more than 250 characters.";
        }

        // Pass the errors as session
        if (!empty($errors)) { $_SESSION['error_messages'] = $errors; }
        
        header('Location: signing.php');
    }
?>

<!-- <input type="date" name="date-today" id="date-today">
        <input type="text" name="first-name" id="first-name">
        <input type="text" name="last-name" id="last-name">
        <input type="email" name="email" id="email">
        <input type="text" name="title" id="title">
        <input type="text" name="details" id="details">
        <input type="file" src="" alt="">
        <input type="submit" value="submit"> -->
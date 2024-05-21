<!-- Objectives:
To apply proper form validation
To display proper error messages
To explore built-in functions in PHP
Create a simple form page allowing a user to file bugs found in a certain website. Fields that are marked with an asterisk are required.
date_today*
first_name *
last_name *
email *
issue_title*
issue_details *
screenshot (optional)

When the form is submitted, make sure the user submits the appropriate information.

The date today should be in a valid date format.
The first name and the last name should not have any numbers.
Email should be in correct pattern.
The issue title should not be more than 50 characters.
Issue details should not be more than 250 characters.
If the user did not submit appropriate information, display the error(s) above the form that asks the user to correct the information.
(Optional) Make sure you check to see if they have uploaded a screenshot and save it to a folder called upload. For uploading a file, you will have to use the superglobal $_FILES. Hint: You will have to include enctype="multipart/form-data" in your form tag.
If the form is submitted with data that passes all validations, simply print a message saying "Thank you for your patience! Please wait for a response from our IT team.”

We are always reminding you to avoid any advanced techniques we haven't discussed yet (ex. regular expression). For #1, find ways to do it using explode and checkdate.

 -->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Ticket</title>
    <style>
        body {
            padding-top: 20px;
        }
        form {
            padding: 20px;
            margin: 10px auto;
            width: max-content;
            border: 1px solid black;
            border-radius: 15px;
        }
        input {
            width: max-content;
            margin: 10px auto;
            display: block;
        }
    </style>

</head>
<body>
<?php 
    // var_dump($_SESSION['error_messages']);
    if (count($_SESSION['error_messages']) > 0) {
        echo "<ul>";
        foreach ($_SESSION['error_messages'] as $message) {
            echo "<li>$message</li>";
        }
        echo "</ul>";
    } else if (isset($_SESSION['form_submitted'])) {
        echo "<h3>Thank you for your patience! Please wait for a response from our IT team.</h3>";
    }

    $_SESSION['error_messages'] = [];
?>
    <form action="validation.php" method="POST">
        <input type='hidden' name='action' value='login'>

        <input type="date" name="date-today" id="date-today" value="<?= date("Y-m-d")?>">
        <input type="text" name="first-name" id="first-name" placeholder="John">
        <input type="text" name="last-name" id="last-name " placeholder="Smith">
        <input type="email" name="email" id="email" placeholder="john.smith@outlook.com">
        <input type="text" name="title" id="title" placeholder="Typographical Error">
        <input type="text" name="details" id="details" placeholder="There is a typo in one of your pages...">
        <input type="file" src="" alt="">
        <input type="submit" value="submit">
    </form>
</body>
</html>
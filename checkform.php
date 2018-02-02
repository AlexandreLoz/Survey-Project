<?php
session_start();

// Get the last character of the string of question 1
$lastcaract = substr ($_POST['question1'],-1);

$errors = array(); // Initialization of the array Error

// We check if question 1 contains a " ? "
if (!($lastcaract == '?')) {
    $errors ['question1'] = "Question 1 must contains a ? at the end";
}

// We check if question 1 is set
if(!array_key_exists('question1', $_POST) || $_POST['question1'] == '') {
    $errors ['question1'] = "question 1 is required";
} 

// We get form's values in the session variable
$_SESSION['inputs'] = $_POST;

if(!empty($errors)){ // if array contains errors, user is redirected to welcome.php
    $_SESSION['errors'] = $errors; // errors are set in the variable session
    header('Location: welcome.php');
}
else{
    $_SESSION['success'] = 1; // If there are no errors, user is redirected to answer.php
    header('Location: answer.php');
}
?>
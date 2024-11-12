<?php
if (isset($_POST["submit"])) {
    $student_name = $_POST["student_name"];
    $student_email = $_POST["student_email"];
    $student_id = $_POST["student_id"];
    $book_title = $_POST["book_title"];
    $borrow_date = $_POST["borrow_date"];
    $token = $_POST["token"];
    $return_date = $_POST["return_date"];
    $fees = $_POST["fees"];




    if (!preg_match("/^[a-zA-Z\s]+$/", $student_name)) {
        echo "Invalid Name Format</p>";
    } else {
        echo "Student Full Name: <strong>$student_name</strong><br>";
    }
    if (!preg_match("/^\d{2}-\d{5}-\d@student\.aiub\.edu$/", $student_email)) {
        echo "Invalid Email Format<br>";
    } else {
        echo "Student Email: <strong>$student_email</strong><br>";
    }
    if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $student_id)) {
        echo "Invalid ID Format <br>";
    } else {
        echo "Student ID: <strong>$student_id</strong><br>";
    }
    echo "Book Title: <strong>$book_title</strong><br>";
    echo "Borrow Date: <strong>$borrow_date</strong><br>";
    echo "Token: <strong>$token</strong><br>";
    echo "Return Date: <strong>$return_date</strong><br>";
    echo "Fees: <strong>$fees</strong><br>";
} else {
    echo "Form not submitted.";
}
?>
<?php
if (isset($_POST["submit"])) {
    $student_name = $_POST["student_name"];
    $student_id = $_POST["student_id"];
    $book_title = $_POST["book_title"];
    $borrow_date = $_POST["borrow_date"];
    $token = $_POST["token"];
    $return_date = $_POST["return_date"];
    $fees = $_POST["fees"];

    echo "Student Full Name: <strong>" . $student_name . "</strong><br>";
    echo "Student ID: <strong>" . $student_id . "</strong><br>";
    echo "Book Title: <strong>" . $book_title . "</strong><br>";
    echo "Borrow Date: <strong>" . $borrow_date . "</strong><br>";
    echo "Token: <strong>" . $token . "</strong><br>";
    echo "Return Date: <strong>" . $return_date . "</strong><br>";
    echo "Fees: <strong>" . $fees . "</strong><br>";
} else {
    echo "Form not submitted.";
}

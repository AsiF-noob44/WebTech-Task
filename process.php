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

    $valid = true;


    if (!preg_match("/^[a-zA-Z\s]+$/", $student_name)) {
        echo "<span style='color: red; font-weight: bold;'>Invalid Name Format</span><br>";
        $valid = false;
    }

    if (!preg_match("/^\d{2}-\d{5}-\d@student\.aiub\.edu$/", $student_email)) {
        echo "<span style='color: red; font-weight: bold;'>Invalid Email Format</span><br>";
        $valid = false;
    }

    if (!preg_match("/^\d{2}-\d{5}-\d{1}$/", $student_id)) {
        echo "<span style='color: red; font-weight: bold;'>Invalid ID Format</span><br>";
        $valid = false;
    }

    $borrow_date_time = strtotime($borrow_date);
    $return_date_time = strtotime($return_date);
    if ($return_date_time - $borrow_date_time < 10 * 24 * 60 * 60) {
        echo "<span style='color: red; font-weight: bold;'>Caution: The return date must be at least 10 days after the borrow date</span><br>";
        $valid = false;
    }

    // Replacing the book name with a valid cookie name because im getting error with spaces in the Book title

    $cookie_name = preg_replace('/[^a-zA-Z0-9_]/', '_', $book_title);


    if (isset($_COOKIE[$cookie_name])) {
        echo "<span style='color: red; font-weight: bold;'>The book '$book_title' has already been borrowed. Please try again later.</span><br>";
        $valid = false;
    }


    if ($valid) {
        setcookie($cookie_name, $student_name, time() + 25, "/");

        echo "<div style='border: 1px solid #ccc; padding: 20px; width: 400px; margin: 20px auto; font-family: Arial, sans-serif;'>";
        echo "<h2 style='text-align: center; color: #4CAF50;'>Library Borrow Receipt</h2>";
        echo "<hr>";
        echo '<div style="border-top: 2px dashed #000; margin: 10px 0;"></div>';
        echo "<p><strong>Student Name:</strong> $student_name</p>";
        echo "<p><strong>Student Email:</strong> $student_email</p>";
        echo "<p><strong>Student ID:</strong> $student_id</p>";
        echo "<p><strong>Book Title:</strong> $book_title</p>";
        echo "<p><strong>Borrow Date:</strong> $borrow_date</p>";
        echo "<p><strong>Return Date:</strong> $return_date</p>";
        echo "<p><strong>Token:</strong> $token</p>";
        echo "<p><strong>Fees:</strong> " . ($fees ?: "None") . "</p>";
        echo '<div style="border-top: 2px dashed #000; margin: 10px 0;"></div>';
        echo "<hr>";
        echo "<p style='text-align: center; color: blue;'>Thank you for using our library!</p>";
        echo "</div>";
    } else {
        echo "<strong>Book Title:</strong> $book_title <br>";
        echo '<br><span style="color: red; font-weight: bold;">Please Correct The Errors Above and Try Again.</span>';
    }

} else {
    echo "Form not submitted.";
}
?>
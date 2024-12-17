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


    if (!preg_match("/^([a-zA-Z]+\.)?\s?[a-zA-Z\s]+$/", $student_name)) {
        echo "<span style='color: red; font-weight: bold;'>Invalid Name Format. Ensure the name starts with an optional designation followed by a valid name.</span><br>";
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

    preg_match("/^\d{2}-(\d{5})-\d{1}$/", $student_id, $matches);
    $id_last_5_digits = $matches[1] ?? null;


    $borrow_date_time = strtotime($borrow_date);
    $return_date_time = strtotime($return_date);
    $days_borrowed = ($return_date_time - $borrow_date_time) / (60 * 60 * 24);

    if ($return_date_time < $borrow_date_time) {
        echo "<span style='color: red; font-weight: bold;'>Error: The return date cannot be earlier than the borrow date.</span><br>";
        $valid = false;
    }

    if ($days_borrowed > 10) {
        if (empty($token)) {
            echo "<span style='color: red; font-weight: bold;'>Error: Borrowing for more than 10 days requires a valid token.</span><br>";
            $valid = false;
        } elseif ($token !== $id_last_5_digits) {
            echo "<span style='color: red; font-weight: bold;'>Error: The token is invalid. It must match the last 5 digits of the student ID ($id_last_5_digits).</span><br>";
            $valid = false;
        }
    }

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
        echo "<p><strong>Token:</strong> " . ($token ?: "None") . "</p>";
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
    echo "Form not submitted!";
}


?>
<?php
if (isset($_POST['addBook'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "books");

    if ($conn) {
        // Fetch form data
        $bookName = $_POST['bookName'];
        $authorName = $_POST['authorName'];
        $quantity = intval($_POST['quantity']);
        $publicationYear = intval($_POST['publicationYear']); // Include publication year

        // SQL query to insert book data
        $sql = "INSERT INTO bookstable (book_Name, author_Name, quantity, publication_Year) 
                VALUES ('$bookName', '$authorName', '$quantity', '$publicationYear')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                document.write('Book added successfully.');
                setInterval(function() {
                    window.location.href = 'index.php';
                }, 3000);
            </script>";
        } else {
            echo "Failed to add book.";
        }
    } else {
        echo "Database connection failed.";
    }
}

if (isset($_POST['updateBook'])) {
    // Connect to the database
    $conn = mysqli_connect("localhost", "root", "", "books");

    if ($conn) {
        // Fetch form data
        $bookId = intval($_POST['bookId']);
        $bookName = $_POST['bookName'];
        $authorName = $_POST['authorName'];
        $quantity = intval($_POST['quantity']);
        $publicationYear = intval($_POST['publicationYear']); // Include publication year

        // SQL query to update book data
        $sql = "UPDATE bookstable 
                SET book_Name='$bookName', author_Name='$authorName', quantity='$quantity', publication_Year='$publicationYear' 
                WHERE id='$bookId' OR book_Name='$bookName'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>
                document.write('Book updated successfully.');
                setInterval(function() {
                    window.location.href = 'index.php';
                }, 3000);
            </script>";
        } else {
            echo "Failed to update book.";
        }
    } else {
        echo "Database connection failed.";
    }
}
?>
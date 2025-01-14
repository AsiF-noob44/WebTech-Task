<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form Validation</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="leftbox">
            <h3>Tokens</h3>
            <?php
            $json_file = 'tokens.json';
            if (file_exists($json_file)) {
                $json_content = file_get_contents($json_file);
                $tokens = json_decode($json_content, true);

                if (!empty($tokens)) {
                    echo "<ul>";
                    foreach ($tokens as $token) {
                        echo "<li>";
                        echo "<strong>Student:</strong> " . htmlspecialchars($token['student_name']) . "<br>";
                        echo "<strong>ID:</strong> " . htmlspecialchars($token['student_id']) . "<br>";
                        echo "<strong>Token:</strong> " . htmlspecialchars($token['token']) . "<br>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p>No tokens found.</p>";
                }
            } else {
                echo "<p>No tokens found.</p>";
            }
            ?>
        </div>

        <main class="middle">
            <section class="section-1">
                <div class="box-1">
                    <h2 style="text-align: center;">Available Books</h2>
                    <div class="allbooks">
                        <?php
                        include('connect.php');

                        $sql = 'SELECT * FROM bookstable';
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $allBooks = mysqli_fetch_all($result, MYSQLI_ASSOC);

                            echo '<div class="booksContainer">';
                            foreach ($allBooks as $book) {
                                echo '<div class="bookCard">
                                    <h4 class="bookName">📖 ' . $book['book_Name'] . '</h4>
                                    <p class="bookDetails">👤 Author: ' . $book['author_Name'] . '</p>
                                    <p class="bookDetails">📦 Quantity: ' . $book['quantity'] . '</p>
                                    <p class="bookDetails">📅 Published: ' . $book['publication_Year'] . '</p>
                                    </div>';
                            }
                            echo '</div>';

                        }
                        ?>
                    </div>
                </div>

                <div class="box-2">
                    <h2 style="text-align: center;">Update Books</h2>

                    <form action="" method="get" class="bookFormRow">
                        <label for="bookName">Search</label>
                        <input class="input" type="text" name="searchValue" id="bookName">
                        <input class="input" type="submit" name="searchBook" value="Search Book">
                    </form>

                    <form action="bookProcess.php" method="post">

                        <?php
                        if (isset($_GET['searchBook'])) {
                            include('connect.php');

                            $searchValue = mysqli_real_escape_string($conn, $_GET['searchValue']);

                            $sql = is_numeric($searchValue)
                                ? "SELECT * FROM bookstable WHERE id=$searchValue"
                                : "SELECT * FROM bookstable WHERE book_Name='$searchValue'";

                            $result = mysqli_query($conn, $sql);
                            $book = mysqli_fetch_assoc($result);

                            if ($book) {
                                $bookId = $book['id'];
                                $bookName = $book['book_Name'];
                                $authorName = $book['author_Name'];
                                $quantity = $book['quantity'];
                                $publicationYear = $book['publication_Year'];
                                ?>
                                <input type="hidden" name="bookId" value="<?php echo $bookId; ?>">

                                <div class="bookFormRow">
                                    <label for="bookName">Book Name:</label>
                                    <input class="input" type="text" name="bookName" id="bookName"
                                        value="<?php echo $bookName; ?>">
                                </div>
                                <div class="bookFormRow">
                                    <label for="authorName">Author Name:</label>
                                    <input class="input" type="text" name="authorName" id="authorName"
                                        value="<?php echo $authorName; ?>">
                                </div>
                                <div class="bookFormRow">
                                    <label for="quantity">Quantity:</label>
                                    <input class="input" type="text" name="quantity" id="quantity"
                                        value="<?php echo $quantity; ?>">
                                </div>
                                <div class="bookFormRow">
                                    <label for="publicationYear">Publication Year:</label>
                                    <input class="input" type="text" name="publicationYear" id="publicationYear"
                                        value="<?php echo $publicationYear; ?>">
                                </div>
                                <div class="bookFormRow">
                                    <input class="input" type="submit" name="updateBook" value="Update Book">
                                </div>
                                <?php
                            }
                        }
                        ?>

                    </form>
                </div>

                <div class="box-3">
                    <h2 style="text-align: center;">Add Books</h2>

                    <form action="bookProcess.php" method="post">
                        <div class="bookFormRow">
                            <label for="bookName">Book Name:</label>
                            <input class="input" type="text" name="bookName" id="bookName">
                        </div>
                        <div class="bookFormRow">
                            <label for="authorName">Author Name:</label>
                            <input class="input" type="text" name="authorName" id="authorName">
                        </div>
                        <div class="bookFormRow">
                            <label for="quantity">Quantity:</label>
                            <input class="input" type="text" name="quantity" id="quantity">
                        </div>
                        <div class="bookFormRow">
                            <label for="publicationYear">Publication Year:</label>
                            <input class="input" type="text" name="publicationYear" id="publicationYear">
                        </div>
                        <div class="bookFormRow">
                            <input class="input" type="submit" name="addBook" value="Add Book">
                        </div>
                    </form>
                </div>
            </section>

            <section class="section-2">
                <div class="box-4"><img src="L'Arabe du futur - 2 Seas Foreign Rights Catalog.jfif" alt=""></div>
                <div class="box-5"><img src="images.jfif" alt=""></div>
                <div class="box-6"><img src="book.jfif" alt=""></div>
            </section>

            <section class="section-3">
                <div class="box-7">
                    <h2 style="text-align: center;">Library Borrow Form</h2>

                    <form action="process.php" method="POST">
                        <label for="student_name">Student Full Name:</label>
                        <input type="text" id="student_name" name="student_name" placeholder="Full Name" required>

                        <label for="student_email">Student Email:</label>
                        <input type="email" id="student_email" name="student_email"
                            placeholder="**-*****-*@student.aiub.edu" required>

                        <label for="student_id">Student ID:</label>
                        <input type="text" id="student_id" name="student_id" placeholder="Student ID" required>

                        <label for="book_title">Book Title:</label>
                        <select id="book_title" name="book_title" required>
                            <option value="">-- Select a Book --</option>
                            <?php
                            foreach ($allBooks as $book) {
                                echo '<option value="' . $book['book_Name'] . '">' . $book['book_Name'] . '</option>';
                            }
                            ?>
                        </select>

                        <label for="borrow_date">Borrow Date:</label>
                        <input type="date" id="borrow_date" name="borrow_date" placeholder="Borrow Date" required>

                        <label for="return_date">Return Date:</label>
                        <input type="date" id="return_date" name="return_date" placeholder="Return Date" required>

                        <label for="token">Token:</label>
                        <input type="text" id="token" name="token" placeholder="Token">

                        <label for="fees">Fees (if any):</label>
                        <input type="number" id="fees" name="fees" step="0.01" placeholder="0.00">

                        <input type="submit" name="submit" value="Submit">
                    </form>
                </div>
                <div class="box-8">Box8</div>
            </section>
        </main>

        <div class="rightbox">
            ID:
            <img src="ID.jpg" alt="ID">
        </div>
    </div>
</body>

</html>
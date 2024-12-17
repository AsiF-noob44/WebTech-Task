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
            Left Box
        </div>
        <main class="middle">
            <section class="section-1">
                <div class="box-1">Box1</div>
                <div class="box-2">Box2</div>
                <div class="box-3">Box3</div>
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
                            <option value="The Arab of the Future">The Arab of the Future</option>
                            <option value="Fundamentals of Physics">Fundamentals of Physics</option>
                            <option value="Physics and Chemistry of Atmosphere">Physics and Chemistry of Atmosphere
                            </option>
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
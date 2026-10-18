<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student | Student Management System</title>
    <link rel="stylesheet" href="style.css">

    <style>
        .student-form {
            max-width: 650px;
            margin: auto;
        }

        .student-form label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        .student-form button {
            margin-top: 10px;
        }
    </style>
</head>

<body>

<header>
    <h1>🎓 Student Management System</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="add_student.php">Add Student</a>
        <a href="students.php">View Students</a>
    </nav>
</header>

<div class="container">

    <h2>Add New Student</h2>

    <p>Enter the student's details in the form below.</p>

    <br>

    <form class="student-form" action="save_student.php" method="POST">

        <label for="name">Student Name</label>
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Enter student name"
            required
        >

        <label for="enrollment_no">Enrollment Number</label>
        <input
            type="text"
            id="enrollment_no"
            name="enrollment_no"
            placeholder="Enter enrollment number"
            required
        >

        <label for="email">Email Address</label>
        <input
            type="email"
            id="email"
            name="email"
            placeholder="Enter email address"
        >

        <label for="mobile">Mobile Number</label>
        <input
            type="tel"
            id="mobile"
            name="mobile"
            placeholder="Enter mobile number"
        >

        <label for="course">Course</label>
        <select id="course" name="course" required>
            <option value="BCA" selected>BCA</option>
            <option value="BBA">BBA</option>
            <option value="BCom">B.Com</option>
            <option value="MCA">MCA</option>
        </select>

        <label for="semester">Semester</label>
        <select id="semester" name="semester" required>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5" selected>Semester 5</option>
            <option value="6">Semester 6</option>
        </select>

        <button type="submit" class="btn">Save Student</button>

        <a href="index.php" class="btn">Back to Home</a>

    </form>

</div>

<footer>
    BCA Project | Student Management System
</footer>

</body>
</html>
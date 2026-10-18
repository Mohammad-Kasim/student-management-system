<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $enrollment_no = $_POST['enrollment_no'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO students
    (name, enrollment_no, email, mobile, course, semester)
    VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssss",
        $name,
        $enrollment_no,
        $email,
        $mobile,
        $course,
        $semester
    );

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        header("Location: students.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Database connection failed.");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

$id = (int)($_POST['id'] ?? 0);
$name = trim($_POST['name'] ?? '');
$enrollment_no = trim($_POST['enrollment_no'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$course = trim($_POST['course'] ?? '');
$semester = trim($_POST['semester'] ?? '');

if ($id <= 0 || $name === '' || $enrollment_no === '') {
    exit("Please enter valid student details.");
}

$stmt = $conn->prepare(
    "UPDATE students
     SET name=?, enrollment_no=?, email=?, mobile=?, course=?, semester=?
     WHERE id=?"
);

$stmt->bind_param(
    "ssssssi",
    $name,
    $enrollment_no,
    $email,
    $mobile,
    $course,
    $semester,
    $id
);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();

    header("Location: students.php");
    exit;
}

echo "Error updating student.";

$stmt->close();
$conn->close();
?>
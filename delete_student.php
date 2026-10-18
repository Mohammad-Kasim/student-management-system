<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Database connection failed.");
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Invalid request.");
}

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {
    exit("Invalid student ID.");
}

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: students.php");
exit;
?>
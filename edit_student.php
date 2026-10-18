
<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$id = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    die("Invalid student ID.");
}

$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$student = $result->fetch_assoc();

$stmt->close();

if (!$student) {
    $conn->close();
    die("Student not found.");
}

function safe($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; background: #f1f5f9; }
        .edit-box { max-width: 600px; margin: 35px auto; padding: 25px; background: white; border-radius: 12px; box-shadow: 0 4px 15px #0001; }
        label { display: block; margin-top: 14px; font-weight: bold; }
        input { width: 100%; box-sizing: border-box; padding: 11px; margin-top: 6px; border: 1px solid #cbd5e1; border-radius: 6px; }
        button { margin-top: 20px; padding: 12px 20px; background: #2563eb; color: white; border: 0; border-radius: 6px; cursor: pointer; }
        .back { margin-left: 12px; }
    </style>
</head>
<body>

<div class="edit-box">
    <h1>Edit Student</h1>

    <form action="update_student.php" method="POST">
        <input type="hidden" name="id" value="<?= (int)$student['id'] ?>">

        <label>Name</label>
        <input type="text" name="name" value="<?= safe($student['name']) ?>" required>

        <label>Enrollment Number</label>
        <input type="text" name="enrollment_no" value="<?= safe($student['enrollment_no']) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= safe($student['email']) ?>">

        <label>Mobile</label>
        <input type="text" name="mobile" value="<?= safe($student['mobile']) ?>">

        <label>Course</label>
        <input type="text" name="course" value="<?= safe($student['course']) ?>">

        <label>Semester</label>
        <input type="text" name="semester" value="<?= safe($student['semester']) ?>">

        <button type="submit">Update Student</button>
        <a class="back" href="students.php">Cancel</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>

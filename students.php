
<?php
$conn = new mysqli("localhost", "root", "", "student_management");

if ($conn->connect_error) {
    die("Database connection failed.");
}

$result = $conn->query("SELECT * FROM students ORDER BY id ASC");

if (!$result) {
    die("Unable to fetch student records.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - All Students</title>

    <link rel="stylesheet" href="style.css">

    <style>
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background: #172554;
            color: white;
        }

        .action {
            display: inline-block;
            padding: 7px 12px;
            margin: 2px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .edit {
            background: #2563eb;
        }

        .delete {
            background: #dc2626;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Student Management System</h1>
    <h2>All Students</h2>

    <p>View, edit and manage student information.</p>

    <a class="action edit" href="add_student.php">
        + Add New Student
    </a>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Enrollment No.</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $serial = 1;

            while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td><?= $serial++ ?></td>

                    <td>
                        <?= htmlspecialchars($row['name'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['enrollment_no'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['email'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['mobile'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['course'] ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($row['semester'] ?? '') ?>
                    </td>

                    <td>
                        <a class="action edit"
                           href="edit_student.php?id=<?= (int)$row['id'] ?>">
                            Edit
                        </a>

                        <a class="action delete"
                           href="delete_student.php?id=<?= (int)$row['id'] ?>"
                           onclick="return confirm('Are you sure you want to delete this student?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>

            <?php if ($result->num_rows === 0) { ?>
                <tr>
                    <td colspan="8">No student records found.</td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <p>
        <a href="index.php">Back to Home</a>
    </p>

</div>

</body>
</html>

<?php
$result->free();
$conn->close();
?>

<?php include "db.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Task 2 - User Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add User</h2>
<form method="POST" action="process.php">
    Name: <input type="text" name="name" required>
    Age: <input type="number" name="age" required>
    <button type="submit">Submit</button>
</form>

<h2>User Table</h2>
<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Age</th><th>Status</th><th>Action</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['age']}</td>
            <td>{$row['status']}</td>
            <td>
                <form method='POST' action='toggle.php'>
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit'>Toggle</button>
                </form>
            </td>
        </tr>";
    }
    ?>
</table>

</body>
</html>
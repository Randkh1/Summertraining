<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $result = $conn->query("SELECT status FROM users WHERE id = $id");
    $row = $result->fetch_assoc();
    $new_status = $row['status'] == 0 ? 1 : 0;

    $conn->query("UPDATE users SET status = $new_status WHERE id = $id");
}

header("Location: index.php");
exit();

<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = intval($_POST['id'] ?? 0);
    $status = $_POST['status'] ?? '';

    $allowed = ['Pending', 'In Progress', 'Resolved'];

    if ($id > 0 && in_array($status, $allowed, true)) {
        $stmt = $conn->prepare("UPDATE complaints SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        $stmt->close();
    }
}

header("Location: admin.php");
exit();
?>
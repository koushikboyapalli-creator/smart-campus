<?php
require_once 'db.php';
$complaints = $conn->query("SELECT * FROM complaints ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <nav>
        <a href="index.php">Student Portal</a>
        <a href="admin.php">Admin Panel</a>
    </nav>

    <h2>Maintenance Redressal Dashboard</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Location</th>
                <th>Category</th>
                <th>Description</th>
                <th>Update Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $complaints->fetch_assoc()): ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['block_room']); ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>
                        <form method="POST" action="update_status.php" style="display: flex; gap: 6px;">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <select name="status">
                                <option value="Pending" <?php if ($row['status'] === 'Pending') echo 'selected'; ?>>Pending</option>
                                <option value="In Progress" <?php if ($row['status'] === 'In Progress') echo 'selected'; ?>>In Progress</option>
                                <option value="Resolved" <?php if ($row['status'] === 'Resolved') echo 'selected'; ?>>Resolved</option>
                            </select>
                            <button type="submit" style="padding: 4px 8px; font-size: 12px;">Save</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
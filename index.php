<?php
require_once 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $student_name = trim($_POST['student_name'] ?? '');
    $block_room   = trim($_POST['block_room'] ?? '');
    $category     = trim($_POST['category'] ?? '');
    $description  = trim($_POST['description'] ?? '');

    if ($student_name && $block_room && $category && strlen($description) >= 10) {
        $stmt = $conn->prepare("INSERT INTO complaints (student_name, block_room, category, description) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $student_name, $block_room, $category, $description);
        if ($stmt->execute()) {
            $message = "Complaint registered successfully!";
        } else {
            $message = "Error lodging complaint.";
        }
        $stmt->close();
    }
}

$complaints = $conn->query("SELECT * FROM complaints ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Campus Portal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <nav>
        <a href="index.php">Student Portal</a>
        <a href="admin.php">Admin Panel</a>
    </nav>

    <h2>Lodge a Campus Complaint</h2>
    <?php if ($message): ?>
        <p style="color: green; margin-bottom: 12px; font-weight: bold;"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <div id="formError" class="error-msg"></div>

    <form id="complaintForm" method="POST" action="index.php">
        <div class="form-group">
            <label for="student_name">Full Name</label>
            <input type="text" id="student_name" name="student_name" placeholder="e.g. B. Koushik">
        </div>
        <div class="form-group">
            <label for="block_room">Hostel / Room / Block</label>
            <input type="text" id="block_room" name="block_room" placeholder="e.g. Block-B, Room 304">
        </div>
        <div class="form-group">
            <label for="category">Defect Category</label>
            <select id="category" name="category">
                <option value="Electrical">Electrical</option>
                <option value="Plumbing">Plumbing</option>
                <option value="Wi-Fi / Internet">Wi-Fi / Internet</option>
                <option value="Furniture">Furniture</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Issue Description</label>
            <textarea id="description" name="description" rows="3" placeholder="Provide details of the problem..."></textarea>
        </div>
        <button type="submit">Submit Complaint</button>
    </form>

    <h2 style="margin-top: 30px;">Track Live Complaints</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $complaints->fetch_assoc()): ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                    <td><?php echo htmlspecialchars($row['block_room']); ?></td>
                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                    <td>
                        <?php 
                            $class = 'badge-pending';
                            if ($row['status'] === 'In Progress') $class = 'badge-in-progress';
                            if ($row['status'] === 'Resolved') $class = 'badge-resolved';
                        ?>
                        <span class="badge <?php echo $class; ?>"><?php echo $row['status']; ?></span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script src="script.js"></script>
</body>
</html>
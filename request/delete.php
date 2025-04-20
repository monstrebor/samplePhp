<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    include "../config.php";

    $id = intval($_POST['id']);
    $sql = "DELETE FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: /samplePhp/members_index.php?success=Member deleted successfully");
        exit();
    } else {
        header("Location: /samplePhp/members_index.php?error=Member not found or could not be deleted");
        exit();
    }
} else {
    header("Location: /samplePhp/members_index.php?error=Invalid request");
    exit();
}

<?php

if (
    isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['email']) &&
    isset($_POST['id'])
) {
    include "../config.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (empty($first_name) || empty($last_name) || empty($email) || empty($id)) {
        $error_message = "Failed to update!!";
        header("Location: /samplePhp/update.php?id=$id&error=$error_message");
        exit();
    } else {
        $sql = "UPDATE members SET first_name=?, last_name=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $first_name, $last_name, $email, $id); 
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $success_message = "Successfully updated!!";
        } else {
            $success_message = "No changes made.";
        }

        header("Location: /samplePhp/update.php?id=$id&success=$success_message");
    }
}


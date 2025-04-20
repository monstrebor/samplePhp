<?php

if (isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['email'])
){
    include "../config.php";
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    if (empty($first_name) || empty($last_name) || empty($email)){

        $error_message = "Please fill out all fields";
        header("Location: ../create.php?error=$error_message");
        exit();
    } else {
        $sql = "INSERT INTO members(first_name, last_name, email) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$first_name, $last_name, $email]);

        $success_message = "Successfully created!!";
        header("Location: ../create.php?success=$success_message");
    }
}


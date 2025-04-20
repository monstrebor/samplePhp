<?php

function read($conn){
    $sql = "SELECT * FROM members";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        $members = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $members = [];
    }
    return $members;
}

function readById($conn, $id){
    $sql = "SELECT * FROM members WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id); 
    $stmt->execute();
    $result = $stmt->get_result(); 

    if ($result->num_rows > 0) {
        $member = $result->fetch_assoc(); 
    } else {
        $member = []; 
    }

    return $member;
}


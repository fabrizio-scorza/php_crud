<?php
// connessione al server
require_once './setup/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // query per inserire nel db con controllo per sql injection

    $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $email);

    if ($stmt-execute()) {
        echo "New user has been created successfully!";
    }else {
        echo "ERROR: " .$sql . " " . $conn->error; 
    }

    $stmt->close();
    $conn->close();
}
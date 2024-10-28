<?php
// connessione al server
require_once '../setup/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);

    //validazione dei dati
    $errors = [];

    if(empty($username)) {
        $errors[] = "Username is required.";
    }

    if(empty($email)) {
        $errors[] = "Email is required.";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email format.";
    }


    // query per inserire nel db con controllo per sql injection
    if(empty($errors)) {
        $sql = "INSERT INTO users (username, email) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);

        if ($stmt->execute()) {
            header("Location: ../index.php");
        }else {
            echo "ERROR: " .$sql . " " . $conn->error; 
        }

        $stmt->close();
    }else {
        foreach($errors as $error) {
            echo "$error";
        }
    }

    $conn->close();
}
?>
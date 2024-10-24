<?php

//query per creare la tabella user
$sql = " CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

//esecuzione e controllo della query
if($conn->query($sql) === TRUE) {
    echo "'users' table has been created successfully!";
} else {
    echo "ERROR 'users' table was not created! ERROR: " .$conn->error; 
}

?>
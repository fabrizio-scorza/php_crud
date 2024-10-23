<?php
// definizione delle costanti del db
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_php_crud");


//connesiione al server
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

//controllo sulla connesione

if ($conn && $conn->connect_error){
    echo("connection failed: " . $conn->connect_error);
}

?>
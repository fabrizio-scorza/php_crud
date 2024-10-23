<?php
//apertura della connessione msqli tramite inclusione del file connection
require_once "setup/connection.php";
require_once "setup/create_tables.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>
</head>
<body>
    <!-- tabella degli utenti -->
     <h2>Users List</h2>
     <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th></th>
        </tr>

        <?php 
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <button>update</button>
                        <button>delete</button>
                    </td>
                </tr>
            <?php
            }

        } else {
            ?>
            <tr>
                <td colspan ="4"> No users found</td>
            </tr>
        <?php 
        }
        ?>
     </table>
</body>
</html>

<?php
//chiusura della connessione
$conn->close();
?>
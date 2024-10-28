<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//apertura della connessione msqli tramite inclusione del file connection
require_once "setup/connection.php";
require_once "setup/create_tables.php";

// query per mostrare tutte le righe della tabella user
$sql = "SELECT id, username, email FROM users";
$result = $conn->query($sql);

if (!$result) {
    die("Errore nella query: " . $conn->error);
}


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
     <button><a href="./pages/createPage.php"> New User</a></button>
     <table>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th></th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <button><a href="./pages/updatePage.php"></a>update</button>
                        <button>delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan ="4"> No users found</td>
            </tr>
        <?php endif; ?>
     </table>
</body>
</html>

<?php
//chiusura della connessione
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table style="width:25%">
        <tr>
            <td>Username</td>
            <td>Role</td>
            <td>Manage</td>
        </tr>
            <?php
                session_start();
                include "connect.php";               
                $statement = $conn->prepare("SELECT id, username, role_id FROM user");
                $statement -> execute();
                $user = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($user as $row){
                    echo '<tr>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["role_id"].'</td>
                            <td><a href="deleteuser.php?id='.$row["id"].'">Delete</a></td>
                          </tr>';
                }
            ?>
    </table>
</body>
</html>
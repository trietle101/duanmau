
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
            <td>Image</td>
            <td>Id</td>
            <td>Name</td>
            <td>Price</td>
            <td>Discount</td>
            <td>Manage</td>
        </tr>
            <?php
                session_start();
                include "connect.php";
                if(isset($_GET["id"]) && !empty($_GET["id"])){  
                    $id = $_GET["id"];
                    $statement = $conn->prepare("DELETE FROM product WHERE id = ?");
                    $statement -> execute(array($id));
                }
                $statement = $conn->prepare("SELECT * FROM product");
                $statement -> execute();
                $products = $statement->fetchAll(PDO::FETCH_ASSOC);
                foreach ($products as $row){
                    echo '<tr>
                            <td><img style="width: 50px;" src="assets/img/'.$row["image"].'"/></td>
                            <td>'.$row["id"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["price"].'</td>
                            <td>'.$row["discount"].'</td>
                            <td><a href="?id='.$row["id"].'">Delete</a></td>
                          </tr>';
                }
            ?>
    </table>
</body>
</html>
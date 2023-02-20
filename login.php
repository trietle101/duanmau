<?php
    if(isset($_POST["login"])){
        if(empty($_POST["username"]) || empty($_POST["password"])){
            echo '<label>All field is required</lable>';
        }
        else{
            $statement = $conn->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
            $statement -> execute(
                array(
                'username' => $_POST["username"],
                'password' => md5($_POST["password"])
                )
            );
            $count = $statement->rowCount();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if($count > 0){
                $_SESSION["username"] = $_POST["username"];
                if($user["role_id"] == 1){
                     header("Location:admin/index.php");
                }
                elseif ($user["role_id"] == 0){
                    header("Location:index.php");
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-popup">
        <form method="post" enctype="multipart/form-data" class="login-container">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" name="login" class="login">Login</button>
        </form>
    </div>
</body>
</html>
<?php
    session_start();
    include_once("connect.php");

    if(isset($_POST["signup"])){
        $stmt = $conn->prepare("INSERT INTO user (username, email, phone, password, role_id) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($_POST["username"], $_POST["email"], $_POST["phone"], md5($_POST["password"]), $_POST["role_id"]));
        header("Location:index.php");
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/signup.css">
</head>
<body>
    <div class="signup-popup">
        <form method="post" enctype="multipart/form-data" class="login-container">
            <input type="text" name="username" id="username" placeholder="Username" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="phone" placeholder="Phone number" required>
            <select name="role_id">
                <option value="0">User</option>
                <option value="1">Admin</option>
            </select>
            <button type="submit" name="signup" class="login">Signup</button>
        </form>
    </div>
</body>
</html>
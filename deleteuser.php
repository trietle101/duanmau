<?php
    session_start();
    include "connect.php";
    $id = $_GET["id"];
    $statement = $conn->prepare("DELETE FROM user WHERE id = ?");
    $statement -> execute(array($id));
    header("Location:user.php");
?>
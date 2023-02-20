<?php
    session_start();
    include "connect.php";

    $id = isset($_GET['id'])? $_GET['id']:"";
    $statement = $conn->prepare("SELECT * FROM product WHERE id = ?");
    $statement -> execute(array($id));
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    if(isset($_SESSION['cart'][$product['id']])) $_SESSION['cart'][$product['id']]['sl'] +=1;
    else $_SESSION['cart'][$product['id']]['sl'] = 1;
    $_SESSION['cart'][$product['id']]['product'] = $product;
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';
    header("Location:shop.php");
    //unset($_SESSION['cart']);
?>
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "duanmau";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  }  
  catch(PDOException $e){
    echo $e -> getMessage();
  }
?>

<?php
$localhost='localhost';
$db='login';
$password='';
$user='root';
try{
    $connected=new PDO("mysql:host=$localhost;dbname=$db",$user,$password);
}catch(PDOException $error){
    echo "<p>".$error->getMessage();
    die;
}
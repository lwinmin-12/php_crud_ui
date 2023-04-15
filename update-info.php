<?php 
session_start();
require_once "core/connection.php";

require_once "core/function.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = $_POST["id"];
    $name = $_POST["name"];
    $money = $_POST["money"];

    $sql = "UPDATE people SET name = '$name' ,money=$money WHERE id=$id";

    if(mysqli_query($con , $sql)){
        $_SESSION['status'] = [
            'message' => 'list updated'
        ];
        header("LOCATION:list-index.php");
    }
}
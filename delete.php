<?php 

session_start();

require_once "core/connection.php";

require_once "core/function.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST["id"];
    $sql = "DELETE FROM people WHERE id = $id";

    

    if(mysqli_query($con , $sql)){
        $_SESSION['status'] = [
            'message' => 'list deleted'
        ];
        header("LOCATION:list-index.php");
    }
    
}
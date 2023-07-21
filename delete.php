<?php 
require_once ('config.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $delete = " DELETE FROM `users` WHERE id = '$id' ";
    if(mysqli_query($conn, $delete)){
        echo "Deleted!";
        header('location: index.php');
    }else{
        echo "error";
    }
}
?>
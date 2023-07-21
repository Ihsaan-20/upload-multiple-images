<?php 

$conn = mysqli_connect("localhost", "root", "", "nftp");
if(!$conn){
    die("Connection Failed!").mysqli_connect_errno();
}

?>
<?php
$username = "root";
$password = "mysql";
$host = "localhost";
$dbname = "tictactoe";

$conn = mysqli_connect($host,$username,$password,$dbname);
if (!$conn){
    die(mysqli_error($conn));
}
?>
<?php
session_start();

$travel = $_POST["sub2"];
$user = $_SESSION["userinfo"]["id_user"];
$_SESSION["travel"] = $travel;

$mysql=mysqli_connect('localhost','root','','horizon');
$sqlInsert="INSERT INTO `orders` (`id_travel`, `id_user`) VALUES ('$travel', '$user')";
$result=mysqli_query($mysql,$sqlInsert);
header("Location: ../card.php");
?>

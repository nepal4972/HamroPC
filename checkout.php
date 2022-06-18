<?php
session_start();
include 'connect.php';

$sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($result)){
    $sql = 'insert into ordertable (userID, productID, productQuantity) values ("'.$_SESSION['userID'].'", "'.$row['productID'].'", 
    "'.$row['productQuantity'].'")';
    $resultInsert = mysqli_query($link, $sql);
}

$sql = 'delete from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);


header('Location: my_profile.php');
?>
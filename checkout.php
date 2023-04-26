<?php
session_start();
include 'connect.php';

$sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);

$date = date("Y-m-d"); 
$_POST['date'] = $date;

while($row = mysqli_fetch_assoc($result)){
    $sql = 'insert into ordertable (userID, productID, productQuantity, orderdate, order_progress) values ("'.$_SESSION['userID'].'", "'.$row['productID'].'", 
    "'.$row['productQuantity'].'", "'.$date.'", "Pending")';
    $resultInsert = mysqli_query($link, $sql);
}

$sql = 'delete from cart where userID="'.$_SESSION['userID'].'"';
$result = mysqli_query($link, $sql);


header('Location: myorder');
?>
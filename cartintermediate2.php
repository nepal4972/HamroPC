<?php
session_start();
include 'connect.php';

if(!isset($_SESSION['quantity']))
    $_SESSION['quantity'] = 1;



if($_GET['target']=='add'){
    $sql = 'select productQuantity from cart where userID="'.$_SESSION["userID"].'" and productID="'.$_GET['id'].'"';
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if($count==0){
        $sql = 'insert into cart(productID, productQuantity, userID) values ("'.$_GET['id'].'", "'.$_SESSION['quantity'].'", "'.$_SESSION["userID"].'")';
        $resultInsert = mysqli_query($link, $sql);
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $row['productQuantity'] = $row['productQuantity']+$_SESSION['quantity'];
        $sql = 'update cart set productQuantity="'.$row['productQuantity'].'" where userID="'.$_SESSION['userID'].'" and productID="'.$_GET['id'].'"';
        $resultInsert = mysqli_query($link, $sql);
    }
}
else if($_GET['target']=='minus'){
    $sql = 'select productQuantity from cart where userID="'.$_SESSION["userID"].'" and productID="'.$_GET['id'].'"';
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['productQuantity']>1) {
        $row['productQuantity'] = $row['productQuantity'] - $_SESSION['quantity'];
        $sql = 'update cart set productQuantity="' . $row['productQuantity'] . '" where userID="' . $_SESSION['userID'] . '" and productID="' . $_GET['id'] . '"';
        $resultInsert = mysqli_query($link, $sql);
    } else{
        $sql = 'delete from cart where userID="'.$_SESSION['userID'].'" and productID="'.$_GET['id'].'"';
        $resultInsert = mysqli_query($link, $sql);
    }

}
else if($_GET['target']=='remove'){
    $sql = 'update product set stock="' .  $_SESSION['quantprod'] . '" where userID="' . $_SESSION['userID'] . '" and productID="' . $_GET['id'] . '"';
    $resultInsert = mysqli_query($link, $sql);
}



if($_GET['target']=='add'){
    $sql = 'select stock from product where productID="'.$_GET['id'].'"';
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);

    if($count==0){
        $sql = 'insert into product (stock) values ("'.$row['stock'].'")';
        $resultInsert = mysqli_query($link, $sql);
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $row['stock'] = $row['stock'] - $_SESSION['quantity'];
        $sql = 'update product set stock="'.$row['stock'].'" where productID="'.$_GET['id'].'"';
        $resultInsert = mysqli_query($link, $sql);
    }
}
else if($_GET['target']=='minus'){
        $sql = 'select stock from product where productID="'.$_GET['id'].'"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
    
        if($count==0){
            $sql = 'insert into product (stock) values ("'.$row['stock'].'")';
            $resultInsert = mysqli_query($link, $sql);
        }
        else{
            $row = mysqli_fetch_assoc($result);
            $row['stock'] = $row['stock'] + $_SESSION['quantity'];
            $sql = 'update product set stock="'.$row['stock'].'" where productID="'.$_GET['id'].'"';
            $resultInsert = mysqli_query($link, $sql);
        }
    }


header('Location: cart');

?>
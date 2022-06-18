<?php
include '../connect.php';


if(isset($_GET['orderdeleteid'])){
    $orderid=$_GET['orderdeleteid'];
        $sql = 'delete from ordertable where orderID= '. $orderid .'';
        $result= mysqli_query($link, $sql);
        if($result){
            header('location: ordertable.php');
            echo '<script>alert("Order Deleted")</script>';
        }
        else{
            die(mysqli_error($link));
        }
}

?>
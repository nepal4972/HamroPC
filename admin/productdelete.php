<?php
include '../connect.php';


if(isset($_GET['deleteprodid'])){
    $prodid=$_GET['deleteprodid'];
        $sql = 'delete from product where productID= '. $prodid .'';
        $result= mysqli_query($link, $sql);
        if($result){
            header('location: producttable.php');
            echo '<script>alert("Product Deleted")</script>';
        }
        else{
            die(mysqli_error($link));
        }
}

?>
<?php
include '../connect.php';


if(isset($_GET['deletecatid'])){
    $catdelid=$_GET['deletecatid'];
        $sql = 'delete from category where cat_id= '. $catdelid .'';
        $result= mysqli_query($link, $sql);
        if($result){
            header('location: category.php');
            echo '<script>alert("category Deleted")</script>';
        }
        else{
            die(mysqli_error($link));
        }
}

?>
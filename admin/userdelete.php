<?php
include '../connect.php';


if(isset($_GET['deleteuserid'])){
    $userid=$_GET['deleteuserid'];
        $sql = 'delete from user where userID= '. $userid .'';
        $result= mysqli_query($link, $sql);
        if($result){
            header('location: usertable');
            echo '<script>alert("User Deleted")</script>';
        }
    else{
        die(mysqli_error($link));
    }
}

?>
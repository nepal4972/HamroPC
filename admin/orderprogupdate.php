
<?php
include '../connect.php';

if(isset($_GET['orderid']) && ($_GET['prodprogress'])){
    $orderid = $_GET['orderid'];
    $prodprogress = $_GET['prodprogress'];
    $sql = "UPDATE ordertable SET order_progress = order_progress, order_progress= '$prodprogress' WHERE InvoiceNo = $orderid ";
    $result= mysqli_query($link, $sql);
  if($result){
    header('location: ordertable');
  }else{
    die(mysqli_error($link));
  }
}
?>
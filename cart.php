<?php
session_start();
include 'connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamro PC | Cart</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
include 'nav.php'
?>

<div class="cart-area">
    <?php if(isset($_SESSION['userID'])){ ?>
        <div class="container">
            <div class="section-title">
                <h2>Shopping Cart</h2> </div>
        </div>
        <?php

        $sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            ?>
            <div class="table-bx">
            <table class="table table-striped-columns">
                    <tr>
                        <th>P.No</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php
                    $start = 1;
                    $sql = 'select * from cart where userID='.$_SESSION['userID'].'';
                    $result = mysqli_query($link, $sql);
                    $total=0;

                    while($row = mysqli_fetch_assoc($result)){
                        $sql = 'select * from product where productID='.$row['productID'].'';
                        $run = mysqli_query($link, $sql);
                        $row2 = mysqli_fetch_assoc($run);
                        echo "<tr><td>$start</td>";
                        echo "<td>".$row2['name']."</td>";
                        echo "<td>".$row2['price']."</td>";
                        echo "<td>".$row['productQuantity']."</td>";
                        $total = $total + ($row['productQuantity'] * $row2['price']); ?>
                        <td>
                            <div class="plus-minus">
                                <button><a href="cartintermediate.php?id=<?php echo $row['productID']?>?&target=minus">-</a></button>
                                <button><a href="cartintermediate.php?id=<?php echo $row['productID']?>&target=add">+</a></button>
                            </div>
                        </td>   
                        <?php $_SESSION['cartprodid']=$row['productID']; ?>
                        <?php
                        echo"</tr>";
                        ?>
                        <?php
                        $start = $start + 1;
                    }
                    ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total</b></td>
                        <td>
                            <?php echo $total?>
                        </td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="chk-btn">
                <button><a href="checkout" onclick="return confirm('Do You Sure You Want To Order?');">Check Out</a></button>
            </div>
        <?php }
        else{ ?>
            <div class="container">
                <h3>You haven't add any product</h3></div>
        <?php }?>
    <?php }else{ ?>
        <div class="fault">
            <div class="container">
                <h2>Please Login As Admin</h2></div>
        </div>
    <?php } ?>
</div>
<?php include "footer.php";?>
</body>
</html>
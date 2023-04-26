<?php
session_start();
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamro PC</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css"> </head>

<body>

<?php
include 'nav.php'
?>
        <?php if(isset($_SESSION['userID'])){ ?>
    <div class="my-profile-area">
        <div class="container">
            <div class="section-title">
                <h2>My Orders</h2> </div>
            </div>
        </div>
        <?php
        $sql = 'select * from ordertable where userID="'.$_SESSION['userID'].'"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            ?>
            <div class="table-box">
            <table class="table table-striped-columns">
            <tr>
                        <th>No.</th>
                        <th>Invoice No.</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sl=1;
                    $sql = 'select * from ordertable where userID="'.$_SESSION['userID'].'"';
                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql1 = 'select * from product where productID="'.$row['productID'].'"';
                        $result1 = mysqli_query($link, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        echo '<tr><td>'.$sl.'</td>';
                        echo '<td>'. $row['userID'] . $row['productID'] . $row['InvoiceNo']. $row['productQuantity']. '</td>';

                        $sql2 = 'select * from product where productID="'.$row['productID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row["productQuantity"].'</td>';

                        $ordertotal = $row['productQuantity'] * $row2['price'];
                        echo '<td>NPR. '.$ordertotal.'</td>';
                        echo '<td> '.$row["order_progress"].' </td>';?>
                        <td>
                           <?php if($row["order_progress"] == 'Completed'){?>
                        <button class="btn btn-danger">
                            <a href="orderdel.php?orderdeleteid=<?php echo $row['InvoiceNo'];?>" class="text-light" onclick="return confirm('Want To Delete This Order?');">Delete</a>
                            </button></td></tr>
                       <?php $sl = $sl + 1;}else{
                        echo 'Not Completed';
                       }
                    }
                    ?>
            </table>
            </div>
        <?php } else {?>
            <div class="container"><h2>You haven't Ordered AnyThing Yet <br> or <br> You have Deleted Your Order History</h2></div>
        <?php } ?>
    </div>
    <?php } else {?>
        <div class="fault">
            <h2>Please login first</h2> </div>
    <?php } ?>
</div>

</body>

</html>
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css"> </head>

<body>

<?php
include 'nav.php'
?>
<div class="Profile-area">
    <div class="container">
        <?php if(isset($_SESSION['userID'])){ ?>
        <div class="section-title">
            <h2>My Profile</h2> 
        </div>
    </div>
    <div class="my-profile-area">
        <div class="container">
            <div class="my-profile">
                <?php
                $sql = 'select * from user where email="'.$_SESSION['email'].'"';
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_array($result)
                ?>
                <p><b>Name: </b>
                    <?php echo $row['name']?>
                </p>
                <p><b>Email: </b>
                    <?php echo $row['email']?>
                </p>
                <p><b>Phone: </b>
                    <?php echo $row['phone']?>
                </p>
                <p><b>Address: </b>
                    <?php echo $row['address']?>
                </p>

            </div>
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
                        <th>P.No</th>
                        <th>Order ID</th>
                        <th>Product Name</th>
                        <th>Product Quantity</th>
                        <th>Product Price</th>
                    </tr>
                    <?php
                    $sl=1;
                    $sql = 'select * from ordertable where userID="'.$_SESSION['userID'].'"';
                    $result = mysqli_query($link, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr><td>'.$sl.'</td>';
                        echo '<td>'.$row["orderID"].'</td>';

                        $sql2 = 'select * from product where productID="'.$row['productID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row["productQuantity"].'</td>';

                        $ordertotal = $row['productQuantity'] * $row2['price'];
                        echo '<td>NPR. '.$ordertotal.'</td></tr>';
                        $sl = $sl + 1;
                    }
                    ?>
            </table>
            </div>
        <?php } else {?>
            <div class="container"><h2>You haven't Ordered AnyThing Yet</h2></div>
        <?php } ?>
    </div>
    <?php } else {?>
        <div class="fault">
            <h2>Please login first</h2> </div>
    <?php } ?>
</div>

</body>

</html>
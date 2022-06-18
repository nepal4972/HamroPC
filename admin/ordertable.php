<?php
session_start();
include '../connect.php';
error_reporting (0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamro PC</title>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<?php
include 'nav.php';
?>
<section class="admin-area">
    <div class="container">
        <?php if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){ ?>
        <div class="section-title">
            <h2>You are logged in as admin</h2> </div>
            <br>
        <div class="button-group filter-button-group">
            <button><a href="producttable.php">Product Table</a></button>
            <button><a href="ordertable.php">Order Table</a></button>
            <button><a href="usertable.php">User table</a></button>
            
        </div>
        <div class="row grid">
        <div class="col-md-20 grid-item table">
                    <div class="adminComponentHeading">
                        <h3>Order Table</h3> </div>

                        <div class="more-btn">
                        <a href="../index.php">Add New Product</a>
                        </div>
                        <table class="table table-striped-columns">
                        <tr>
                            <th>Order No.</th>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>User Email</th>
                            <th>Address</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                    $sql = 'select * from ordertable';
                    $result = mysqli_query($link, $sql);
                    $start = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
        
                        echo '<tr><td>'. $start .'</td>';

                        echo '<td>'.$row['orderID'].'</td>';

                        $sql2 = 'select * from product where productID="'.$row['productID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row["productQuantity"].'</td>';

                        $sql3 = 'select * from user where userID="'.$row['userID'].'"';
                        $result3 = mysqli_query($link,$sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        echo '<td>'.$row3["email"].'</td>';

                        $sql3 = 'select * from user where userID="'.$row['userID'].'"';
                        $result3 = mysqli_query($link,$sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        echo '<td>'.$row3["address"].'</td>';
                        echo '<td>
                                <button class="btn btn-danger">
                                    <a href="orderdelete.php?orderdeleteid='.$row['orderID'].'" class="text-light">Delete</a>
                                </button>
                            </td>
                              </tr>';
                        $start = $start + 1 ;

                    }
                }       
                    ?>
                    </table>
            </div>
</section>

</body>
</html>



<?php
session_start();
include '../connect.php';

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
            <button><a href="./ordertable.php">Order Table</a></button>
            <button><a href="./usertable.php">User table</a></button>
            
        </div>
        <div class="row grid">
            <div class="col-md-12 grid-item">
                    <div class="adminComponentHeading">
                        <h3>Product Table</h3> </div>

                        <div class="more-btn">
                        <a href="addproduct.php">Add New Product</a>
                        </div>

                        <table class="table table-striped-columns">
                        <tr>
                            <th>P.No</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
                            <th>Update/Delete</th>
                        </tr>
                        <?php
                        $sql = 'select * from product';
                        $result = mysqli_query($link, $sql);
                        $start = 1;

                        while($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>'.$start.'</td>';
                            echo '<td>'.$row['productID'].'</td>';
                            echo '<td>'.$row['name'].'</td>';
                            echo '<td>'.$row['category'].'</td>';
                            echo '<td>'.$row['price'].'</td>';
                            echo '<td>
                                    <button class="btn btn-primary">
                                    <a href="productupdate.php?updateprodid='.$row['productID'].'" class="text-light">Update</a>
                                    </button>
                                    <button class="btn btn-danger">
                                    <a href="productdelete.php?deleteprodid='.$row['productID'].'" class="text-light">Delete</a>
                                    </button>
                                  </td>
                                  </tr>';
                            $start = $start + 1;
                        }
                    }
                        ?>
                        </table>
                    </div>
</section>
</body>
</html>



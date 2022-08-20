<?php
session_start();
include 'connect.php';
$id = $_GET['id'];
$quantity = 1;
$_SESSION['quantity'] = $quantity;


$sql = 'select * from product where productID="'.$id.'"';
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);



if(isset($_POST["addCart"])){
    if(isset($_SESSION["userID"])){
        if($_POST["quantityfinal"]>=1){
            $quantity = $_POST["quantityfinal"];
            $_SESSION['quantity'] = $quantity;

            header('Location: cartintermediate?id='.$id.'&target=add');
        }else{
            echo "<script type='text/javascript'>alert('Product quantity should not be less than one!')</script>";
        }
        
    }else{
        echo "<script type='text/javascript'>alert('Login First!')</script>";
        header('Location: ');
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HAMRO PC</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/animate.min.css"> </head>

<body>


<?php
include 'nav.php'
?>
<div class="our-products">
    <?php if($count>0){ ?>
        <div class="container">
            <div class="section-title">
                <h2>Product Details</h2> </div>
            <div class="row no-gutters">
                <div class="col-md-5">
                    <div class="product-image">
                        <img src="<?php echo $row['image'];?>" class="img-fluid" alt="pic">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="product-details">
                        <h2>Product Name: <?php echo $row['name'];?></h2>
                        <p>Product ID: <?php echo $row['productID'];?></p>
                        <h3>NPR. <?php echo $row['price'];?></h3>

                        <form method="post">
                            <label for="Q"><b>Quantity:</b></label>
                            <input type="number" name="quantityfinal" value="<?php echo $quantity?>">
                            <?php
                            if($row['stock'] >= 5 ){?>
                                <input type="submit" name="addCart" value="Add to cart">
                        <?php   } else{?>
                            <h1>&nbsp&nbsp&nbspOut of Stock</h1>
                       <?php }
                            ?>
                        </form>
                        <div class="product-desc">
                            <p><?php echo $row['description']; ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php } else{ ?>
        <h3>No product found</h3>
    <?php }?>

</div>




<?php
include 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>

</html>
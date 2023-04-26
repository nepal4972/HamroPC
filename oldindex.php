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
    <title>Hamro PC</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'nav.php'?>
<div class="header-bottom">
    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                $sql = "SELECT img_dir FROM slider";
                $result = mysqli_query($link, $sql);
                $count = mysqli_num_rows($result);
                if($count>0)
                    echo "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"0\" class=\"active\"></li>";

                for($i=1; $i<$count; $i = $i+1) {
                    echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"></li>';
                }
                ?>
            </ol>
            <div class="carousel-inner">
                <?php

                $row = mysqli_fetch_assoc($result);
                echo '<div class="carousel-item active"> <img src="' . ($row['img_dir']) . '" class="d-block w-100"> </div>';

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="carousel-item"> <img src="' . ($row['img_dir']) . '" class="d-block w-100"> </div>';
                }
                ?> </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
    </div>
</div>

<div class="hot-product">
    <div class="container">
        <div class="section-title">
            <h2>Feature Product</h2> </div>
        <div class="row">
            <?php
            $sql = 'select * from featureproduct';
            $result = mysqli_query($link, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $sql = 'select * from product where productID="'.$row['productID'].'"';
                $result2 = mysqli_query($link, $sql);
                $row2 = mysqli_fetch_assoc($result2);
                ?>

                <div class="col-md-4">
                    <div class="hot-item-top">
                        <?php if($row['image'] = !null){?>
                            <img src="<?php echo $row2['image']; ?>" class="img-fluid" alt="pic">
                        <div class="hot-overlay">
                            <?php if(isset($_SESSION['userID'])){?>
                                  <?php
                                    if($row2['stock'] >= 5 ){?>
                                        <button type="button" name="addcart" title="Add to Cart"><a href="cartintermediate.php?id=<?php echo $row2['productID']; ?>&target=add"><i class="fas fa-shopping-cart"></i></a></button>
                                <?php }else{?>
                                    <?php }
                                    ?>
                            <?php }else{?>
                                <button type="button" name="addcart" title="Add to Cart" onclick="alert('Login to continue')"><i class="fas fa-shopping-cart"></i></button>
                            <?php }?>
                            <button type="button" title="Details"><a href="product.php?id=<?php echo $row2['productID']; ?>"><i class="fas fa-eye"></i></a></button>
                        </div>
                        <?php
                       }?>
                    </div>
                    <div class="hot-item-bottom">
                        <h5><?php echo $row2['name']; ?></h5>
                        <h6> NPR. <?php echo $row2['price']; ?></h6> </div>
                </div>
            <?php } ?>

        </div>
        <div class="more-btn">
            <a href="shop.php">Go To Shop</a>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
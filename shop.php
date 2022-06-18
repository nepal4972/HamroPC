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
    <link rel="stylesheet" href="css/animate.min.css">
</head>

<body>
<?php include 'nav.php'?>
<section class="product-area">
    <div class="container">
        <h2>Products</h2>
        <div class="button-group filter-button-group">

            <button><a href="./shop.php">All</a></button>
            <button><a href="./shop.php?category=gpu">Graphic Card</a></button>
            <button><a href="./shop.php?category=processor">Processor</a></button>
            <button><a href="./shop.php?category=motherboard">Motherboard</a></button>
            <button><a href="./shop.php?category=ramstorage">RAM/Storage</a></button>
            <button><a href="./shop.php?category=cases">cases</a></button>
        </div>
    </div>

    <div class="row grid no-gutters">
        <?php
        $sql = '';
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $sql = "select * from product where category = '{$category}'";
        }else{
            $sql = "select * from product";}

        $run = mysqli_query($link, $sql);
        $count = mysqli_num_rows($run);
        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($run)) {
                ?>
                <div class="col-md-3 grid-item <?php echo $row['category']; ?> animation wow zoomIn">
                    <div class="works-img">
                        <img src="<?php echo $row['image'] ?>" class="img-fluid" alt="pic">
                        <div class="product-overlay">
                            <h5><?php echo $row['name'] ?></h5>
                            <h6>Price: <?php echo $row['price']; ?></h6>
                            <div class="add">
                                <?php if(isset($_SESSION['userID'])){?>
                                    <?php
                                    if($row['stock'] >= 5 ){?>
                                        <button><a href="cartintermediate.php?id=<?php echo $row['productID']; ?>&target=add">Add to cart</a></button>
                                <?php   } else{?>
                                    <button>Out of Stock</button>
                               <?php }
                                    ?>
                                <?php }else{?>
                                    <button type="button" name="addcart" title="Add to Cart" onclick="alert('Login to continue')">Add to cart</button>
                                <?php }?>
                            </div>
                            <div class="details">
                                <button><a href="product.php?id=<?php echo $row['productID']; ?>">Details</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else{ ?>
            <div class="container"><div class="indexerror"><h3>There is no product to show</h3></div></div>
        <?php } ?>

    </div>
</section>


<?php
include 'footer.php';
?>

</body>

</html>
<?php
session_start();
include '../connect.php';

$name = '';
$price = '';
$category = '';
$image = '';
$description = '';

if(isset($_POST['addproduct'])){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description'])) {

        $sql = 'insert into product (name, price, description, category, image, stock) values ("' . $_POST['name'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '", "' . $_POST['category'] . '", "' . $_POST['image'] . '", "' . $_POST['stock'] . '")';
        mysqli_query($link, $sql);
        header('Location: producttable.php');
    }
    else echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
}

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
        
        <div class="col-md-12 grid-item productform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Add Product</h3> </div>
                    <form method="post">
                        <input class="form-control" type="text" name="name" placeholder="Product Name">
                        <input class="form-control" type="number" name="price" placeholder="Price">
                        <select name="category">
                            <option value="" disabled selected>Select category</option>
                            <option value="gpu">Graphic Card</option>
                            <option value="processor">Processor</option>
                            <option value="motherboard">Motherboard</option>
                            <option value="ramstorage">RAM/Storage</option>
                            <option value="cases">Cases</option>
                        </select>
                        <input class="form-control" type="text" name="image" placeholder="Image Path">
                        <textarea class="form-control" name="description" id="" cols="10" rows="5" placeholder="Desceiption"></textarea>
                        <input class="form-control" type="text" name="stock" placeholder="No of Stock">
                        <input class="mb-0" type="submit" name="addproduct" value="Add Item"> </form>
                </div>
            </div>

            <?php
        }
            ?>

        </div>
</section>
</body>
</html>



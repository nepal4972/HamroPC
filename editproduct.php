<?php
session_start();
include 'connect.php';

$name = '';
$price = '';
$category = '';
$image = '';
$description = '';


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
</head>

<body>

<?php
include 'nav.php'
?>
<br>
<section class="admin-area">
    <div class="container">
        <?php if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){ ?>
        <div class="section-title">
            <h2>You are logged in as admin</h2> </div>
        <div class="row grid">
            <div class="col-md-12 grid-item addform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Edit Product</h3> </div>
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
                        <input class="mb-0" type="submit" name="add" value="Edit Item">
                    </form>
                </div>
            </div>
    <?php }?>
        
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
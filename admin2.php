<?php
session_start();
include 'connect.php';

$name = '';
$price = '';
$category = '';
$image = '';
$description = '';

if(isset($_POST['add'])){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description'])) {

        $sql = 'insert into product (name, price, description, category, image) values ("' . $_POST['name'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '", "' . $_POST['category'] . '", "' . $_POST['image'] . '")';
        mysqli_query($link, $sql);
        header('Location: admin.php');
    }
    else echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
}

if(isset($_POST['addusers'])){
    if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_password']) && isset($_POST['user_address']) && isset($_POST['user_type'])) {
        $sql = 'insert into user (name, email, phone, password, address, type) values ("' . $_POST['user_name'] . '", "' . $_POST['user_email'] . '", "' . $_POST['user_phone'] . '", "' . $_POST['user_password'] . '", "' . $_POST['user_address'] . '", "' . $_POST['user_type'] . '")';
        mysqli_query($link, $sql);
    }
    else echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
}


if(isset($_POST['update'])){
    if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description'])) {
        $sql = 'update into product (name, price, description, category, image) values ("' . $_POST['name'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '", "' . $_POST['category'] . '", "' . $_POST['image'] . '") where productID = $_SESSION["idassign"]';
        mysqli_query($link, $sql);
        header('Location: admin.php');
    }
    else echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
}


if(isset($_POST['remove'])){
    if(isset($_POST['id'])){
        $sql = 'delete from product where productID="'.$_POST['id'].'"';
        mysqli_query($link, $sql);
    }
    else echo "<script type='text/javascript'>alert('Enter the Product ID')</script>";
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
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
include 'nav.php'
?>
<section class="admin-area">
    <div class="container">
        <?php if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){ ?>
        <div class="section-title">
            <h2>You are logged in as admin</h2> </div>
            <br>
        <div class="button-group filter-button-group">
            <button data-filter=".table">Product Table</button>
            <button data-filter=".order">Order Table</button>
            <button data-filter=".user">User table</button>
            <button data-filter=".productform">Add new product</button>
            <button data-filter=".userform">Add new User</button>
            <button data-filter=".ideditform">Edit Product</button>
            <button data-filter=".removeform">Remove Products</button>
            
        </div>
        <div class="row grid">
            <div class="col-md-12 grid-item table">
                    <div class="adminComponentHeading">
                        <h3>Product Table</h3> </div>

                        <table class="table table-striped-columns">
                        <tr>
                            <th>P.No</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Category</th>
                            <th>Product Price</th>
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
                            echo '</tr>';
                            $start = $start + 1;
                        }
                        ?>
                        </table>
                    </div>

            <div class="col-md-12 grid-item table order">
                    <div class="adminComponentHeading">
                        <h3>Order Table</h3> </div>
                        <table class="table table-striped-columns">
                        <tr>
                            <th>Order No.</th>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>User Email</th>
                            <th>Address</th>
                        </tr>
                        <?php
                    $sql = 'select * from ordertable';
                    $result = mysqli_query($link, $sql);
                    $start = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
        
                        echo '<tr><td>'. $start .'</td>';

                        echo '<td>'.$row["orderID"].'</td>';

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
                        echo '<td>'.$row3["address"].'</td></tr>';

                        $start = $start + 1 ;

                    }
                    ?>
                    </table>
            </div>


            <div class="col-md-12 grid-item table user">
                    <div class="adminComponentHeading">
                        <h3>User Table</h3> </div>
                        <table class="table table-striped-columns">
                        <tr>
                            <th>User Count</th>
                            <th>User ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Password</th>
                            <th>Address</th>
                        </tr>
                        <?php
                    $sql = 'select * from user';
                    $result = mysqli_query($link, $sql);
                    $start = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
        
                        echo '<tr><td>'. $start .'</td>';

                        echo '<td>'.$row["userID"].'</td>';

                        $sql2 = 'select * from user where userID="'.$row['userID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row["email"].'</td>';

                        echo '<td>'.$row["phone"].'</td>';

                        echo '<td>'.$row["password"].'</td>';

                        echo '<td>'.$row["address"].'</td></tr>';

                        $start = $start + 1 ;

                    }
                    ?>
                    </table>
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
                        <input class="mb-0" type="submit" name="add" value="Add Item"> </form>
                </div>
            </div>



            <div class="col-md-12 grid-item userform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Add Users</h3> </div>
                    <form method="post">
                        <input class="form-control" type="text" name="user_name" placeholder="User Name">
                        <input class="form-control" type="text" name="user_email" placeholder="Email">
                        <input class="form-control" type="number" name="user_phone" placeholder="Phone No.">
                        <input class="form-control" type="text" name="user_password" placeholder="Password">
                        <input class="form-control" type="text" name="user_address" placeholder="Address">
                        <select name="user_type">
                            <option value="" disabled selected>Select category</option>
                            <option value="client">Client</option>
                            <option value="admin">Admin</option>
                        </select>
                        <br>
                        <input class="mb-0" type="submit" name="addusers" value="Add user"> </form>
                </div>
            </div>


            <div class="col-md-12 grid-item ideditform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Edit Product</h3> </div>
                    <form method="post">
                        <input class="form-control" type="number" name="id" placeholder="Product ID">
                        <input class="mb-0" type="submit" name="idedit" value="Assign ID">
                    </form>
                </div>
            </div>


           <?php if(isset($_POST['idedit'])){
                 if(isset($_POST['id'])){
                 $id = $_POST['id'];
                 $_SESSION["idassign"]="$id";
                 $sql = "SELECT * FROM product WHERE productID='$id' ";
                 $sql_1 = mysqli_query($link,$sql);
                 if($sql_1){
                     while($row = mysqli_fetch_array($sql_1)){
            ?>


            <div class="col-md-12 grid-item ideditform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Edit Product</h3>
                    </div>
                    <form method="POST">
                    <input class="form-control" type="text" name="product_id" value="<?php echo $row['productID'] ?>" >
                        <input class="form-control" type="text" name="name" value="<?php echo $row['name'] ?>" >
                        <input class="form-control" type="number" name="price" value="<?php echo $row['price'] ?>">
                        <select name="category">
                            <option value="value<?php echo $row['category'] ?>" disabled selected>Select category</option>
                            <option value="gpu">Graphic Card</option>
                            <option value="processor">Processor</option>
                            <option value="motherboard">Motherboard</option>
                            <option value="ramstorage">RAM/Storage</option>
                            <option value="cases">Cases</option>
                        </select>
                        <input class="form-control" type="text" name="image" value="<?php echo $row['image'] ?>">
                        <textarea class="form-control" name="description" cols="10" rows="5"><?php echo $row['description'] ?></textarea>
                        <input class="mb-0" type="submit" name="update" value="Update Item"> </form>
                </div>
            </div>
            <?php
        }
        }
    }
} }
?>
            <?php echo isset($fetchrow['name']); ?>

            <div class="col-md-12 grid-item removeform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <h3>Remove Product</h3> </div>
                    <form method="post">
                        <input class="form-control" type="number" name="id" placeholder="Product ID">
                        <input class="mb-0" type="submit" name="remove" value="Remove Item"> </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>



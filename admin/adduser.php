<?php
session_start();
include '../connect.php';

$name = '';
$price = '';
$category = '';
$image = '';
$description = '';

if(isset($_POST['addusers'])){
    if(isset($_POST['user_name']) && isset($_POST['user_email']) && isset($_POST['user_phone']) && isset($_POST['user_password']) && isset($_POST['user_address']) && isset($_POST['user_type'])) {
        $sql = 'insert into user (name, email, phone, password, address, type) values ("' . $_POST['user_name'] . '", "' . $_POST['user_email'] . '", "' . $_POST['user_phone'] . '", "' . $_POST['user_password'] . '", "' . $_POST['user_address'] . '", "' . $_POST['user_type'] . '")';
        mysqli_query($link, $sql);
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

            <?php
        }
            ?>

        </div>
</section>
</body>
</html>



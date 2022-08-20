<?php
session_start();
include 'connect.php';




if(isset($_POST['addproduct'])){
  if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category']) && isset($_POST['image']) && isset($_POST['description']) && isset($_POST['prodtype'])) {
      $imgimp = $imgdata . $_POST['category'] . '/';
      $imgfinal = $imgimp . $_POST['image'];
      $sql = 'insert into product (name, price, description, category, image, stock, prodtype) values ("' . $_POST['name'] . '", "' . $_POST['price'] . '", "' . $_POST['description'] . '", "' . $_POST['category'] . '", "'. $imgfinal .'", "' . $_POST['stock'] . '", "' . $_POST['prodtype'] . '")';
      mysqli_query($link, $sql);
      header('Location: producttable');
  }
  else echo "<script type='text/javascript'>alert('Fill all the fields')</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <title>Hamro PC | Checkout</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="./style.css" rel="stylesheet">
</head>
<body>
  <?php include 'nav.php' ?>
<?php if(isset($_SESSION['userID'])){ 
  ?>
<div class="container">
  <div class="py-5 text-left">
  <div class="container">
            <div class="section-title">
                <h2>Order Form</h2> </div>
        </div>
    </div>
    <?php
        $sql = 'select * from cart where userID="'.$_SESSION['userID'].'"';
        $result = mysqli_query($link, $sql);
        $count = mysqli_num_rows($result);
        if($count>0){
            ?>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
      </h4>
                    <?php
                    $start = 1;
                    $sql = 'select * from cart where userID='.$_SESSION['userID'].'';
                    $result = mysqli_query($link, $sql);
                    $total=0;

                    while($row = mysqli_fetch_assoc($result)){
                        $sql = 'select * from product where productID='.$row['productID'].'';
                        $run = mysqli_query($link, $sql);
                        $row2 = mysqli_fetch_assoc($run);
                        $total = $total + ($row['productQuantity'] * $row2['price']); ?>
                        <section>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?php echo $row2['name']; ?></h6>
          </div>
          <span class="text-muted"><?php echo $row['productQuantity'];?></span>
          <br><br>&nbsp&nbsp&nbsp&nbsp&nbsp
          <span class="text-muted"><?php echo $row2['price'];?></span>
          
        </li>
        <?php } ?>
        </section>  

        <li class="list-group-item d-flex justify-content-between">
          <span>Total (NPR.)</span>
          <strong><?php echo $total ?></strong>
        </li>
      </ul>
    </div>

    <style>
.chk-btn button {
    background-color: rgba(10, 8, 129, 0.8);
    border: none;
    padding: 4px 10px;
    font-family: tahoma;
}

.chk-btn button:hover {
    background-color: #E74C3C;
}

.chk-btn button a {
    text-decoration: none;
    color: white;
}
</style>
    <div class="col-md-8 order-md-1">
      <form class="needs-validation" method="post">

      <div class="mb-3">
          <label for="phone">Full Name<span class="text-muted"></span></label>
          <input type="text" class="form-control" name="name_order" id="name" placeholder="Enter Full Name">
        </div>

        <div class="mb-3">
          <label for="email">Valid Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" name="email_order" id="email" placeholder="Enter Valid Email">
        </div>

        <div class="mb-3">
          <label for="phone">Valid Phone Number<span class="text-muted">(Optional)</span></label>
          <input type="phone" class="form-control" name="phone_order" id="phoneno" placeholder="Order Receiving Number">
        </div>

        <div class="mb-3">
          <label for="address">Full Address</label>
          <input type="text" class="form-control" name="address_order" id="address" placeholder="Order Address(Country, City, StreetName)" required>
        </div>

        <div class="mb-3">
        <label for="payment">Payment Method</label>
        <br>
        <select name="prodtype" required>
        <option value="" disabled selected>Select Payment Method</option>
          <option value="cash">Cash On Delivery</option>
        </select>
        </div>
        <br>
        <div class="chk-btn">
        <button onclick="return confirm('Are You Sure You Want To Order Products?');"><a href="checkout" type="submit-order">Check Out</a></button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php }}else{ ?>
        <div class="fault">
            <div class="container">
                <h2>Please Login As Admin</h2></div>
        </div>
    <?php } ?>
<?php
include 'footer.php';
?>
</body>
</html>


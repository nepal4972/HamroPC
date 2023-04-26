<?php
session_start();
include 'connect.php';

$updateuserprofile = $_SESSION['userID'];
$select1 = "select * from `user` where userID = $updateuserprofile";
$result1 = mysqli_query($link,$select1);
$row1 = mysqli_fetch_assoc($result1);
    $userID = $row1['userID'];
    $name = $row1['name'];
    $email = $row1['email'];
    $phone = $row1['phone'];
    $password = $row1['password'];
    $address = $row1['address'];


    if(isset($_POST['profileupdate'])){
        $userID = $_POST['userID'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        if($_SESSION['userID'] = $updateuserprofile){
            $sql = "UPDATE user SET name='$name', email='$email', phone='$phone', address='$address' WHERE userID = $updateuserprofile ";
            $sql_query = mysqli_query($link, $sql);
            header('Location: my_profile');
        }
        else{
            echo 'You are not a valid user';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <title>Hamro PC | Profile</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="./style.css" rel="stylesheet">
  <link href="./style2.css" rel="stylesheet">

</head>
<body>
<?php include 'nav.php'?>
  <div class="main-content">
      <div class="container-fluid">
    <div class="header align-items-center" style="min-height: 250px; background-size: cover; background-position: center top;">
      <span class="mask bg-gradient-default opacity-8"></span>
    </div>
    <div class="container-fluid mt--7">
      <div class="row  d-flex align-items-center justify-content-center">
        <div class=" col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Update Profile</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="POST">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">  
                      <div class="form-group">
                      Full Name: <input type="text" name="name" value="<?php echo $name ?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                     Email: <input type="text" name="email" value="<?php echo $email ?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        Phone No: <input type="text" name="phone" value="<?php echo $phone ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        Address:&nbsp&nbsp&nbsp&nbsp<input type="text" name="address" value="<?php echo $address ?>">
                        <div class="col-md-12 grid-item ideditform">
                      <div class="admin-form2">
                      <div class="adminComponentHeading">
                      <input class="mb-0" type="submit" name="profileupdate" value="Update Profile" onclick="return confirm('Are You You Want To Update Your Profile?');"> 
                      </div>
                      </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <style>
    .col-md-12 {
        background-color: white;
    }
    .admin-form2 input[type="submit"] {
    margin-top: 12px;
    margin-bottom: 15px;
    margin-left: 550px;
    padding: 5px 5px;
    color: #fff;
    cursor: pointer;
    background: rgba(10, 8, 129, 0.8);
}
  </style>

</body>
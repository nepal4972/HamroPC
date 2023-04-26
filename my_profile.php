<?php
session_start();
include 'connect.php';
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
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
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
                  <h3 class="mb-0">My Profile</h3>
                </div>
                <div class="col-4 text-right">
                <a href="myorder" class="btn btn-secondary">My Orders</a>&nbsp&nbsp&nbsp&nbsp
                  <a href="profileupdate" class="btn btn-secondary">Update Profile</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                        
                      <div class="form-group">
                    <?php if(isset($_SESSION['userID'])){

                    $sql = 'select * from user where email="'.$_SESSION['email'].'"';
                    $result = mysqli_query($link, $sql);
                    $row = mysqli_fetch_array($result)
                    ?>
                        <label class="form-control-label" for="firstname">Full Name: <?php echo $row['name'];?> </label>
                        <p></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="lastname">Email: <?php echo $row['email'];?></label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="email">Phone No: <?php echo $row['phone'];?></label>
                       <p></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="gender">Address: <?php echo $row['address'];}?></label>
                       <p></p>
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
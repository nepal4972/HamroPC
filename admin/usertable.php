<?php
session_start();
include '../connect.php';

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
        <div class="row grid">
        <div class="col-md-14 grid-item table">
                    <div class="adminComponentHeading">
                        <h3>User Table</h3> </div>

                        <div class="more-btn">
                        <a href="adduser.php">Add New User</a>
                        </div>
                        <table class="table table-striped-columns">
                        <tr>
                            <th>User Count</th>
                            <th>User ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Password</th>
                            <th>Address</th>
                            <th>Delete User</th>
                        </tr>
                        <?php
                    $sql = 'select * from user';
                    $result = mysqli_query($link, $sql);
                    $start = 1;

                    while ($row = mysqli_fetch_assoc($result)) {
        
                        echo '<tr><td>'. $start .'</td>';

                        echo '<td>'.$row['userID'].'</td>';

                        $sql2 = 'select * from user where userID="'.$row['userID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row["email"].'</td>';

                        echo '<td>'.$row["phone"].'</td>';

                        echo '<td>'.$row["password"].'</td>';

                        echo '<td>'.$row["address"].'</td>';
                        echo '<td>
                                    <button class="btn btn-danger">
                                    <a href="userdelete.php?deleteuserid='.$row['userID'].'" class="text-light">Delete</a>
                                    </button>
                                  </td>
                                  </tr>';                        
                        echo '</tr>';

                        $start = $start + 1 ;

                    }
                }
                    ?>
                    </table>
            </div>
</section>

</body>
</html>



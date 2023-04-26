<?php
include '../scripts.php';
include '../connect.php';
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Hamro PC | Admin</title>
</head>

<body>
<?php if($_SESSION['type']=='admin'){ ?>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">Hamro Pc Admin</div>
            <div class="list-group list-group-flush my-3">
                <a href="./dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="./producttable.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Products</a>
                <a href="./usertable.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i 
                        class="fas fa-user me-2"></i>Users</a>
                <a href="./ordertable.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Orders</a>
                        <a href="./category.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Category</a>
                <a href="../log_out.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" onclick="return confirm('Sure Logout?');"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>

        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../my_profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="../index.php">Home Page</a></li>
                                <li><a class="dropdown-item" href="../log_out.php" onclick="return confirm('Sure Logout?');">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <?php
            $total_products = mysqli_query($link, "SELECT * FROM `product`");
            $no_prod = mysqli_num_rows($total_products);
            ?>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $no_prod;?></h3>
                                <p class="fs-5">Total Products</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <?php
            $total_users = mysqli_query($link, "SELECT * FROM `user`");
            $no_usr = mysqli_num_rows($total_users);
            ?>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $no_usr; ?></h3>
                                <p class="fs-5">Total Users</p>
                            </div>
                            <i
                                class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <?php
            $total_orders = mysqli_query($link, "SELECT * FROM `ordertable`");
            $no_ord = mysqli_num_rows($total_orders);
            ?>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $no_ord; ?></h3>
                                <p class="fs-5">Total Orders</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <?php
            $total_category = mysqli_query($link, "SELECT * FROM `category`");
            $no_category = mysqli_num_rows($total_category);
            ?>        

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $no_category; ?></h3>
                                <p class="fs-5">category</p>
                            </div>
                            <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders:</h3>
                    <div class="col">
                    <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">No.</th>
                                    <th scope="col">Invoice No.</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">User Email</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    $sql = 'SELECT * FROM ordertable';
                    $result = mysqli_query($link, $sql);
                    $start = 1;

                    $sql1 = 'select * from product where productID="'.$row['productID'].'"';
                    $result1 = mysqli_query($link, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    $row = mysqli_fetch_assoc($result1);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $sql1 = 'select * from product where productID="'.$row['productID'].'"';
                        $result1 = mysqli_query($link, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        echo '<tr><td>'. $start .'</td>';

                        echo '<td>'. $row['userID'] . $row['productID'] . $row['InvoiceNo']. $row['productQuantity']. '</td>';

                        $sql2 = 'select * from product where productID="'.$row['productID'].'"';
                        $result2 = mysqli_query($link, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '<td>'.$row2["name"].'</td>';

                        echo '<td>'.$row2["category"].'</td>';

                        echo '<td>'.$row["productQuantity"].'</td>';

                        $sql3 = 'select * from user where userID="'.$row['userID'].'"';
                        $result3 = mysqli_query($link,$sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        echo '<td>'.$row3["email"].'</td>';

                        $sql3 = 'select * from user where userID='.$row['userID'].'';
                        $result3 = mysqli_query($link,$sql3);
                        $row3 = mysqli_fetch_assoc($result3);
                        echo '<td>'.$row3["address"].'</td>'?>
                              </tr><?php
                        $start = $start + 1 ;
                        
                    }     
                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } else{
    header("Location: index.php");
}?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>
</html>
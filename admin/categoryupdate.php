<?php
include '../connect.php';
session_start();

$catupdateid = $_GET['updatecatid'];
$select1 = "select * from `category` where cat_id = $catupdateid";
$result1 = mysqli_query($link,$select1);
$row1 = mysqli_fetch_assoc($result1);
    $category_name = $row1['category_name'];
    $cathash_name = $row1['cathash_name'];

if(isset($_POST['catupdate'])){
    $category_name = $_POST['category_name'];
    $cathash_name = $_POST['cathash_name'];

    $sql = "UPDATE category SET cat_id = $catupdateid, category_name='$category_name', cathash_name='$cathash_name' WHERE cat_id = $catupdateid ";
    $sql_query = mysqli_query($link, $sql);
    header('Location: category.php');
}
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
<?php if(isset($_SESSION['type']) && $_SESSION['type']=='admin'){ ?>
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
                    <h2 class="fs-2 m-0">Update Category</h2>
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
            <style>
            input[type="submit"] {
            border: none;
            outline: none;
            height: 40px;
            background: #E74C3C;
            color: #fff;
            font-size: 18px;
            border-radius: 20px;
            }

            input[type="submit"]:hover {
            cursor: pointer;
            background: blue;
            color: #000;
            }
            </style>

            <div class="row grid">
            <div class="col-md-12 grid-item table">

            <div class="col-md-12 grid-item ideditform">
                <div class="admin-form2">
                    <div class="adminComponentHeading">
                        <br>
                    <form method="POST">
                        Category Name:
                       <input class="form-control" placeholder ="Category Name" type="text" name="category_name" value="<?php echo $category_name ?>" >
                        Category Hash Code:
                        <input class="form-control" placeholder ="Category Hash Code" type="text" name="cathash_name" value="<?php echo $cathash_name ?>">
                        <br>
                        <input class="mb-0" type="submit" name="catupdate" value="Update Category" onclick="return confirm('Are You Sure?');"> </form>
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
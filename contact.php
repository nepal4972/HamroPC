<?php
session_start();
include 'connect.php';

$name = '';
$email = '';
$subject = '';
$message = '';

if(isset($_SESSION['userID'])){
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
}

if(isset($_POST["sendMessage"])){

    if(isset($_POST["message"])){
        $message = $_POST["message"];
    }$name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];

    if($name=='' || $email=='' || $subject=='' || $message==''){

    }else{
        $sql = "INSERT INTO message (name, email, subject, description) VALUES ('".$name."', '".$email."', '".$subject."', '".$message."')";
        $resultInsert = mysqli_query($link, $sql);
        $lastInsertID = mysqli_insert_id($link);

        header('Location: index.php');
    }
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
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/animate.min.css"> </head>

<body>

<?php include 'nav.php'?>
<br>
<section class="contact" id="contact">
    <div class="container">
        <div class="section-title">
            <h2>Contact us in following</h2> </div>
        <div class="section-style"></div>
        <div class="info-content">
            <div class="col-40 col-100 wow slideInLeft">
                <div class="contact-info">
                    <h5>Email Us at:</h5>
                    <p>sandnnepal4972@gmail.com <br>nepal4972@gmail.com</p>
                    <h5>Call Us at:</h5>
                    <p>+977 9862517280 <br>
                    +977 9862517280</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>
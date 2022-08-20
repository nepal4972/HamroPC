<?php

session_start();
include 'connect.php';

$email='';
$password='';
$errorEmail=''; $errorPassword = ''; $errorUser='';

function clean_text($string)
{
    $string = trim($string);
    $string = stripslashes($string);
    $string = htmlspecialchars($string);
    return $string;
}

if(isset($_POST["login"])){

    if(empty($_POST["email"])){
        $errorEmail .= '<h2><label class="text-danger">Email is required</label></h2>';
    }
    else{
        $email = clean_text($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errorEmail .= '<h2><label class="text-danger">Invalid email address</label></h2>';
        }
    }

    if(empty($_POST["password"])){
        $errorPassword .= '<h2><label class="text-danger">Password is required</label></h2>';
    }
    else{
        $password = clean_text($_POST["password"]);
    }

    if($errorEmail == '' && $errorPassword=='') {
        $sql = 'select * from user where email="'.$email.'" and password="'.$password.'"';
        
        $result = mysqli_query($link, $sql);
        $noOfData = mysqli_num_rows($result);

        if($noOfData>0){
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $row =  mysqli_fetch_array($result);
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['type'] = $row['type'];

            header('Location: index');
        }else
            $errorUser = '<h2><label class="text-danger">Email or Password Not Valid</label></h2>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hamro PC</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="login-area">
    <div class="loginbox">
        <h1>LOGIN</h1>
        <form method="post">
            <input type="text" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
            <?php echo $errorEmail; ?>

            <input type="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>">
            <?php echo $errorPassword; ?>

            <input type="submit" name="login" value="Login">
            <?php echo $errorUser; ?>
            <p>Don't have an account?</p>
            <a href="sign_up">Signup</a> 
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>

</html>
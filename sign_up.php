<?php
session_start();

include 'connect.php';

$name = '';
$email = '';
$phone = '';
$password = '';
$address = '';
$error = '';
$date = '';

if(isset($_POST["signup"])){
    $name = $_POST["name"];
    $email =$_POST["email"];
    $phone = $_POST["phone"];
    $password =$_POST["password"];
    $address = $_POST["address"];

    $select = mysqli_query($link, "SELECT * FROM `user` WHERE email ='$email'") or die('query failed');

    $date = date("Y-m-d");
	
    if($name=='' & $email=='' & $phone==''& $password=='' & $address=='' & $date==''){
        echo '<div class="alert-message">Fill All The Fields</div>';
    }
    else {
        if(mysqli_num_rows($select) > 0){
            echo '<div class="alert-message">user already registered</div>';
          }
          if(filter_var($email,FILTER_VALIDATE_EMAIL)==true){
            if(strlen($password)>=8 ){
                $sql = 'INSERT INTO user (name, email, phone, password, address, type, regdate) VALUES("'.$name.'", "'.$email.'", "'.$phone.'", "'.$password.'", "'.$address.'", "client", "'.$date.'")';
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION['phone'] = $phone;
                $_SESSION['address'] = $address;
                $resultInsert = mysqli_query($link, $sql);
        
                $sql = 'select userID from user where email="'.$email.'"';
                $result = mysqli_query($link, $sql);
                $row = mysqli_fetch_assoc($result);
                $_SESSION['userID'] = $row['userID'];
                header('Location: index.php');
          }
                else{
                    echo '<div class="alert-message">Password Must be of 8 Character</div>';
                }
        }
        else{
            echo '<div class="alert-message">Email Address is Not Valid</div>';
        }
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
<div class="signup-area">
    <div class="signupbox">
        <h1>SIGNUP</h1>
        <form method="post">
            <input type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>">
            <br><br>
            <input type="text" name="email" placeholder="Enter Email" value="<?php echo $email; ?>">
            <br><br>
            <input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo $phone; ?>">
            <br><br>
            <input type="password" name="password" placeholder="Enter Password" value="<?php echo $password; ?>">
            <br><br>
            <input type="text" name="address" placeholder="Enter Full Address" value="<?php echo $address; ?>">
            <br><br>
            <input type="submit" name="signup" value="Sign Up">
            <?php echo $error;?>
            <p>Already have an account?</p>
            <a href="log_in">Login</a>
        </form>
    </div>
</div>
</body>

</html>
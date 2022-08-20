<?php

session_start();
$_SESSION['Cart']=null;
unset($_SESSION);
session_destroy();

header('Location: index');

?>
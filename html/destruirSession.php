<?php
session_start();

session_destroy();
// TODO: Destroy cookie 


header("location:home.php");exit;
?>

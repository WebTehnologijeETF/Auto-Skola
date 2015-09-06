<?php
session_start();
    
      if(!isset($_SESSION['username'])){
          header("Location: admin.php");
      }

     session_unset($GLOBALS['username']);
     header("Location:index.php");
?>


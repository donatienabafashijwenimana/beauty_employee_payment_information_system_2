<?php
session_start();
 include 'connect.php';
 if(!isset($_SESSION['uname']))header("location:login.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        beauty employee payment information system
    </div>
    <footer>
        <h1>beauty warehouse:copyright&copy2024</h1>
        
        <h4>email:beautywarehouse@gmail.com</h4>
        <h4>tel:0792458446</h4>
    </footer>
    <div class="navbar">
        <a href="employees.php">employees</a>
        <a href="slary.php">slary</a>
        <a href="payment.php">payment</a>
        <a href="report.php">report</a>
        <div style="color:black;margin-top:0.5pc"><a href="logout.php">logout</a><?=$_SESSION['uname']?></div>
    </div>
    

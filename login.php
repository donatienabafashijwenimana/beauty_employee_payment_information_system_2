<?php
session_start();
include 'connect.php';

if(isset($_POST['login'])){
    $uname= $_POST['username'];
    $password =$_POST['password'];
    $select = $conn->query("select*from user where username= '$uname' and password='$password'");
    if(mysqli_num_rows($select)>0){
        $_SESSION['uname']=$uname;
        ?><script>
            alert('login successfully')
            window.location.href='employees.php'
        </script>
        <?php
    }else {
        ?><script>
            alert('login failed')
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <form action="#" method="post">
        <h1>login form</h1>
        <label for="">username</label>
        <input type="text" name="username" id="">
        <label for="">password</label>
        <input type="password" name="password" id="">
        <input type="submit" value="login" name='login'>
        <a href="register.php">create account</a>
    </form>
</body>
</html>

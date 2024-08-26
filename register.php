<?php
session_start();
include 'connect.php';

if(isset($_POST['register'])){
    $uname= $_POST['username'];
    $password =$_POST['password'];
    $select = $conn->query("select*from user where username= '$uname'");
    if(mysqli_num_rows($select)<=0){
        $insert = $conn->query("insert into user values(null,'$uname','$password')");
        if($insert){
            ?><script>
            alert('your account has beeen created')
            window.location.href='login.php'
        </script>
        <?php
        }
    }else {
        ?><script>
            alert('username exist')
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
        <h1>registration form</h1>
        <label for="">username</label>
        <input type="text" name="username" id="" required pattern="[a-zA-Z]{3,}" title="invalid username">
        <label for="">password</label>
        <input type="password" name="password" id="" required pattern=".{8,}">
        <input type="submit" value="login" name='register'>
        <a href="login.php">login</a>
    </form>
</body>
</html>

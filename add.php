<?php
include 'connect.php';
// var_dump($_POST);
if(isset($_POST['addemployee'])){
     $fname=$_POST['fname'];
     $lname = $_POST['lname'];
     $position = $_POST['position'];
     $phone=$_POST['phone'];
     $gender= $_POST['gender'];
     $hdate = $_POST['hdate'];
     $insert = $conn->query("insert into employee values(null,'$fname','$lname','$position','$phone','$gender','$hdate')");
     if ($insert) {
        ?>
        <script>
            alert("emnpployee added")
            window.location.href='employees.php'
        </script>
        <?php
     }
    

}
if(isset($_POST['upemployee'])){
    $id = $_POST['id'];
    $fname=$_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $phone=$_POST['phone'];
    $gender= $_POST['gender'];
    $hdate = $_POST['hdate'];
    $insert = $conn->query("update employee set firstname='$fname',lastname='$lname',position='$position',
    telephone='$phone',gender='$gender',hirreddate='$hdate' where emp_id='$id'");
    if ($insert) {
       ?>
       <script>
           alert("emnpployee upadated")
           window.location.href='employees.php'
       </script>
       <?php
    }
   

}
if (isset($_POST['addslary'])) {
    $emp = $_POST['emp'];
    $amount = $_POST['amount'];
    $month = $_POST['month'];
    $select = $conn->query("select*from slary where empid='$emp' AND month='$month'");
    if(mysqli_num_rows($select)<=0){
        $insert = $conn->query("insert into slary values (null,'$emp','$amount','$month')");
        if ($insert) {
            ?>
            <script>
                alert('slary recorded')
                window.location.href='slary.php'
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert('slary exist')
        </script>
        <?php
    }
}
if (isset($_POST['upslary'])) {
    $id =$_POST['id'];
    $emp = $_POST['emp'];
    $amount = $_POST['amount'];
    $month = $_POST['month'];
    $select = $conn->query("select*from slary where empid='$emp' AND month='$month' and sid<>'$id'");
    if(mysqli_num_rows($select)<=0){
        $insert = $conn->query("update slary set empid='$emp',amount='$amount',month='$month' where sid='$id'");
        if ($insert) {
            ?>
            <script>
                alert('slary upadeted')
                window.location.href='slary.php'
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert('slary exist')
        </script>
        <?php
    }
}
    if (isset($_POST['addpayment'])) {
        $emp = $_POST['emp'];
        $slary = $_POST['slary'];
        $date = $_POST['pdate'];
        // $select = $conn->query("select* from payment where empid ='$emp'")
        $insert = $conn->query("insert into payment values(null,'$emp','$slary','$date')");
        if ($insert) {
            ?>
            <script>
                alert('payment added')
                window.location.href='payment.php'
            </script>
            <?php
        }
}

if (isset($_POST['uppayment'])) {
    $id = $_POST['id'];
    $emp = $_POST['emp'];
    $slary = $_POST['slary'];
    $date = $_POST['pdate'];
    // $select = $conn->query("select* from payment where empid ='$emp'")
    $insert = $conn->query("update  payment set empid='$emp',slary='$slary',pydate='$date' where pyid='$id'");
    if ($insert) {
        ?>
        <script>
            alert('payment updated')
            window.location.href='payment.php'
        </script>
        <?php
    }
}
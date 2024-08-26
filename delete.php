<?php
include 'connect.php';
if(isset($_GET['delemp'])){
    $id = $_GET['delemp'];
    $delete = $conn->query("delete from employee where emp_id='$id'");
    if ($delete) {
        ?><script>
            alert('employee deleted')
            window.location.href='employees.php'
        </script>
        <?php
    }
}
if(isset($_GET['dels'])){
    $id = $_GET['dels'];
    $delete = $conn->query("delete from slary where sid='$id'");
    if ($delete) {
        ?><script>
            alert('salary record deleted')
            window.location.href='slary.php'
        </script>
        <?php
    }
}
if(isset($_GET['delp'])){
    $id = $_GET['delp'];
    $delete = $conn->query("delete from payment where pyid='$id'");
    if ($delete) {
        ?><script>
            alert('pyment record  deleted')
            window.location.href='payment.php'
        </script>
        <?php
    }
}

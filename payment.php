<?php 
include 'connect.php';
include 'dash.php';
$selectemp =$conn->query("select* from employee");
$selectsal = $conn->query("select* from slary,employee where emp_id=empid");
$select=$conn->query("select*from employee,slary,payment where employee.emp_id=payment.empid and 
employee.emp_id= slary.empid group by emp_id,pydate");

?>
<div class="right">
    <div class="table">
        <table border="1">
            <tr>
                <th>employee</th>
                <th>salary</th>
                <th>payment date</th>
                <th colspan="2">action</th>
            </tr>
            <?php
            foreach($select as $row){?>
            <tr>
                <td><?=$row['firstname'].' '.$row['lastname'];?></td>
                <td><?=$row['amount']?></td>
                <td><?=$row['pydate']?></td>
                <td><a href="?idu=<?=$row['pyid']?>"><button class='up'>update</button></a></td>
                <td><a href="delete.php?delp=<?=$row['pyid']?>"><button class='del'>delete</button></a></td>

            </tr>
            <?php } ?>
        </table>
    </div>
<?php
if (isset($_GET['idu'])) {?>
    <div class="form">
        <h2>update payment</h2>
    <form action="add.php" method="post">
            <label for="">emmployee</label>
            <input type="hidden" name="id" id="" value="<?=$row['pyid']?>">

            <select name="emp" id="">
            <option value="<?=$row['emp_id']?>"><?=$row['firstname'].' '.$row['lastname'];?></option>
             <?php
             foreach($selectemp as $data){?>
             <option value="<?=$data['emp_id']?>"><?=$data['firstname'].' '.$data['lastname'];?></option>
             <?php }?>
            </select>
            <label for="">slary</label>
            <select name="slary" id="">
             <option value="<?=$row['sid']?>"><?=$row['firstname'].' '.$row['lastname'];?>-<?=$row['amount']?>frw</option>

            <?php
             foreach($selectsal as $data){?>
             <option value="<?=$data['sid']?>"><?=$data['firstname'].' '.$data['lastname'];?>-<?=$data['amount']?>frw</option>
             <?php }?>
            </select>
            <label for="">payment date</label>
            <input type="date" name="pdate" id="" value="<?=$row['pydate']?>">
            <input type="submit" value="update payment" name="uppayment">
        </form>
    </div>
    <?php }else{?>
    <div class="form">
        <h2>add payment</h2>
        <form action="add.php" method="post">
            <label for="">emmployee</label>
            <select name="emp" id="">
             <?php
             foreach($selectemp as $data){?>
             <option value="<?=$data['emp_id']?>"><?=$data['firstname'].' '.$data['lastname'];?></option>
             <?php }?>
            </select>
            <label for="">slary</label>
            <select name="slary" id="">
            <?php
             foreach($selectsal as $data){?>
             <option value="<?=$data['sid']?>"><?=$data['firstname'].' '.$data['lastname'];?>-<?=$data['amount']?>frw</option>
             <?php }?>
            </select>
            <label for="">payment date</label>
            <input type="date" name="pdate" id="" min="2024-06-24">
            <input type="submit" value="add payment" name="addpayment">
        </form>
    </div>
    <?php } ?>
</div>
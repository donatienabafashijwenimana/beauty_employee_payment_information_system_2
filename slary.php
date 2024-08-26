<?php
include 'connect.php';
include 'dash.php';
$selectemp = $conn->query("select* from employee");
$select = $conn->query("select* from slary,employee where emp_id=empid");
?>
<div class="right">
<div class="table">
    <table border='1'>
        <tr>
            <th>slaryN<sup>o</sup></th>
            <th>employee</th>
            <th>amount</th>
            <th>month</th>
            <th colspan="2">action</th>
        </tr>
        <?php $x=1; foreach($select as $row){?>
            <tr>
                <td><?=$x++?></td>
                <td><?=$row['firstname'].' '.$row['lastname'];?></td>
                <td><?=$row['amount']?></td>
                <td><?=$row['month']?></td>
                <td><a href="?idu=<?=$row['sid']?>"><button class='up'>update</button></a></td>
                <td><a href="delete.php?dels=<?=$row['sid']?>"><button class='del'>delete</button></a></td>

            </tr>
            <?php }?>
    </table>
</div>

<?php
if (isset($_GET['idu'])) {
    $id = $_GET['idu'];

    $select = $conn->query("select* from slary,employee where emp_id=empid and sid='$id'");
    $row = mysqli_fetch_array($select);
    
    ?>
    <div class="form">
        <h2>update slary</h2>
        <form action="add.php" method="post">
            <label for="">empid</label>
            <input type="hidden" name="id" value='<?=$id?>'>
            <select name="emp" id="">
            <option value="<?=$row['emp_id']?>"><?=$row['firstname'].' '.$row['lastname'];?></option>

             <?php foreach($selectemp as $data){?>
                <option value="<?=$data['emp_id']?>"><?=$data['firstname'].' '.$data['lastname'];?></option>
            <?php }?>
            </select>
            <label for="">amount </label>
            <input type="number" name="amount" id="" value="<?=$row['amount']?>" min="0">
            <label for="">month</label>
            <input type="month" name="month" id=""value="<?=$row['month']?>" max="2024-07">
            <input type="submit" value="update salary" name='upslary'>
        </form>
    </div>
<?php }else{?>
    <div class="form">
        <h2>add slary</h2>
        <form action="add.php" method="post">
            <label for="">empid</label>
            <select name="emp" id="">
             <?php foreach($selectemp as $data){?>
                <option value="<?=$data['emp_id']?>"><?=$data['firstname'].' '.$data['lastname'];?></option><?php }?>
            </select>
            <label for="">amount </label>
            <input type="number" name="amount" id="" min="0" required>
            <label for="">month</label>
            <input type="month" name="month" id="" max="2024-07">
            <input type="submit" value="add salary" name='addslary'>
        </form>
    </div>
    <?php }?>
    
</div>
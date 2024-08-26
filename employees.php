<?php 
include 'dash.php';
$select = $conn->query("select * from employee");
?>
<div class="right">
        <div class="table">
            <table border="1">
                <tr>
                    <th>emmployee name</th>
                    <th>position</th>
                    <th>phone number</th>
                    <th>gender</th>
                    <th>hired date</th>
                    <th colspan="2">action</th>
                </tr>
                <?php
                foreach($select as $row){?>
                 <tr>
                    <td><?=$row['firstname'].' '.$row['lastname'];?></td>
                    <td><?=$row['position'];?></td>
                    <td><?=$row['telephone'];?></td>
                    <td><?=$row['gender'];?></td>
                    <td><?=$row['hirreddate']?></td>
                    <td><a href="?idu=<?=$row['emp_id']?>"><button class="up">update</button></a></td>
                    <td><a href="delete.php?delemp=<?=$row['emp_id']?>" ><button class="del">delete</button></a></td>


                 </tr>
                <?php }?>
            </table>
        </div>
        
        <?php if(isset($_GET['idu'])){
            $id = $_GET['idu'];
            $select = $conn->query("select* from employee where emp_id='$id'");
            $row = mysqli_fetch_array($select);?>
            <div class="form">
                <h3>update employee</h3>
            <form action="add.php" method="post">
                <input type="hidden" name="id" value="<?=$row['emp_id']?>">
                <label for="">first name</label>
                <input type="text" name="fname" id="" value="<?=$row['firstname']?>" pattern="[a-zA-Z ]{3,}" title="first name must be alphabetics and 3 character longer.">
                <label for="">last name</label>
                <input type="text" name="lname" id="" value="<?=$row['lastname']?>" pattern="[a-zA-Z ]{3,}" title="last name must be alphabetics and 3 character longer.">
                <label for="">position</label>
                <input type="text" name="position" id=""value="<?=$row['position']?>" pattern="[a-zA-Z ]{3,}" title="position must be alphabetics and 3 character longer.">
                <label for="">phone number</label>
                <input type="number" name="phone" id="" value="<?=$row['telephone']?>" pattern="07[8923]\d{7}" title="invalid phonenumber">
                <label for="">gender</label>
                <div class="radio">
                    <input type="radio" name="gender" id="" value='male' <?=$row['gender']=='male'?'checked':0;?>>male
                    <input type="radio" name="gender" id="" value='female' <?=$row['gender']=='female'?'checked':0;?>>female
                </div>
                <label for="">hirred date</label>
                <input type="date" name="hdate" id="" value="<?=$row['hirreddate']?>" max="2006-06-24">
                <input type="submit" value="update emmployee" name='upemployee' >
            </form>
        </div>
            <?php }else{ ?>
        <div class="form">
            <h3>add employee</h3>
            <form action="add.php" method="post">
                <label for="">first name</label>
                <input type="text" name="fname" id="" pattern="[a-zA-Z ]{3,}" title="first name must be alphabetics and 3 character longer.">
                <label for="">last name</label>
                <input type="text" name="lname" id="" pattern="[a-zA-Z ]{3,}" title="last name must be alphabetics and 3 character longer.">
                <label for="">position</label>
                <input type="text" name="position" id="" pattern="[a-zA-Z ]{3,}" title="position must be alphabetics and 3 character longer.">
                <label for="">phone number</label>
                <input type="number" name="phone" id="" pattern="07[8923]\d{7}" title="invalid phonenumber format">
                <label for="">gender</label>
                <div class="radio">
                    <input type="radio" name="gender" id="" value='male' checked>male
                    <input type="radio" name="gender" id="" value='female'>female
                </div>
                <label for="">hirred date</label>
                <input type="date" name="hdate" id="" max="2006-06-24">
                <input type="submit" value="add emmployee" name='addemployee'>
            </form>
        </div>    
            <?php }?>
</div>
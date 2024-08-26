<?php
include 'connect.php';
include 'dash.php';
?>
<div class="right">

    <div class="table">
    <?php
if (isset($_POST['generate'])) {
$date = $_POST['date'];

$select1=$conn->query("select*from employee,slary,payment where employee.emp_id=payment.empid and 
employee.emp_id= slary.empid and pydate='$date' group by emp_id,pydate ");
if (mysqli_num_rows($select1)>0) {

?>
        <table border="1">
            <tr>
                <th>employee</th>
                <th>salary</th>
                <th>payment date</th>
            </tr>
            <?php
            foreach($select1 as $row){?>
            <tr>
                <td><?=$row['firstname'].' '.$row['lastname'];?></td>
                <td><?=$row['amount']?></td>
                <td><?=$row['pydate']?></td>
            </tr>
            <?php } ?>
        </table>
<?php }else{?><h1>!! no result found</h1> <?php }
 }else{?><h1>!select date to generate report</h1><?php }?>
       
    </div>
    
    <div class="form">
        <h4>payment date</h4>
            <form action="#" method="post">
                <input type="date" name="date" id="">
                <input type="submit" value="generate" name="generate">
            </form>
            <button onclick="pdf()" style="height: 1.5pc;background-color: green;color: white;border:none">download pdf</button>
        </div>
</div>
<script src="html2.js"></script>
<script>
    function pdf(){
    let table = document.querySelector('table')
    html2pdf(table).save('report')
    }
</script>
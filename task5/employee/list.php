<?php 
include '../shared/header.php';
include '../shared/nav.php';
include '../general/env.php';
include '../general/functions.php';

$listall="SELECT * from employees JOIN department ON employees.depid=department.deid ORDER BY employees.empid";
$getlist=mysqli_query($connection,$listall);
if(isset($_GET['delete'])){
    $ID=$_GET['delete'];
    $delete="DELETE FROM employees WHERE empid='$ID'";
    $deletedata=mysqli_query($connection,$delete);
    header("location:./list.php");
}
?>
 <table class="table ">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Department</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php foreach ($getlist as $d) {?>
        <tbody>
            <td> <?php echo $d['empid'];  ?> </td>
            <td> <?php echo $d['empname'];?> </td>
            <td> <?php echo $d['email'];?> </td>
            <td> <?php echo $d['salary'] ;?> </td>
            <td> <?php echo $d['dename'];?> </td>
            <form>
                <td> <a href="/5-session/task5/employee/update.php?edit=<?php echo "$d[empid]" ?>" class="btn btn-primary btn-sm">Edit</a>
                    <a href="/5-session/task5/employee/list.php?delete=<?php echo "$d[empid]" ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </form>
            <?php }?>
        </tbody>
    </table>
<?php
include '../shared/footer.php';
?>
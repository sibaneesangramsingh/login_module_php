<a href="logout.php">Logout</a>
<?php
include('config.php');
session_start();
$userid=$_SESSION['userid'];
if(@$userid){
    $query=mysqli_query($con,"select * from usermaster where userid='$userid'");
    $data=mysqli_fetch_assoc($query);
    ?>
    <table border="1 solid black" width="100%">
        <tr>
            <th>ID</th>
            <th>name</th>
            <th>email</th>
            <th>mobile</th>
            <th>role</th>
        </tr>
        <tr>
            <td><?php echo $data['userid'] ?></td>
            <td><?php echo $data['name'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['mobile'] ?></td>
            <td><?php echo $data['role'] ?></td>
</tr>
    </table>
    <?php
}else{
    header('location:login.php');

}  ?>
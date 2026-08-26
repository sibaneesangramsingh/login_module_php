<?php
include('config.php');
session_start();
?>
<h2>Welcome Admin, <?php echo $_SESSION['name']; ?></h2>
<table border="1 solid black" width="100%">
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>mobile</th>
        <th>role</th>
        <th>Action</th>
</tr>
<?php
$query=mysqli_query($con,"select * from usermaster where role!='admin'");
while($data=mysqli_fetch_assoc($query)){
?>
<tr>
<td><?php echo $data['userid'] ?></td>
<td><?php echo $data['name'] ?></td>
<td><?php echo $data['email'] ?></td>
<td><?php echo $data['mobile'] ?></td>
<td><?php echo $data['role'] ?></td>
<td><a href="delete.php?userid=<?php echo $data['userid'] ?>">Delete</a>
<a href="edit.php?userid=<?php echo $data['userid'] ?>">Edit</a>
</td>
<?php
}
?>
</table>

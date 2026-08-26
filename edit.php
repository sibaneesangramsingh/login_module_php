<?php
include('config.php');
session_start();
if(@$_SESSION['userid'] && $_SESSION['role'] == 'admin'){
    $userid=$_REQUEST['userid'];
    $query=mysqli_query($con,"select * from usermaster where userid='$userid'");
    $data=mysqli_fetch_assoc($query);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name=$_REQUEST['name'];
        $email=$_REQUEST['email'];
        $mobile=$_REQUEST['mobile'];
        $role=$_REQUEST['role'];
        $query=mysqli_query($con,"update usermaster set name='$name',email='$email',mobile='$mobile',role='$role' where userid='$userid'");
        header('location:adminlanding.php');
    }
    ?>
    <form method ="post">
        <input type="text" name="name" id="name" value="<?php echo $data['name'] ?>" placeholder="Enter Name"><br><br>
        <input type="email" name="email" id="Email" value="<?php echo $data['email'] ?>" placeholder="Enter Email"><br><br>
        <input type="text" name="mobile" id="Mobile" value="<?php echo $data['mobile'] ?>" placeholder="Enter Mobile"><br><br>
        <select name="role" id="Role">
            <option value="">Select Role</option>
            <option value="admin" <?php if($data['role']=='admin'){echo 'selected';} ?>>Admin</option>
            <option value="user" <?php if($data['role']=='user'){echo 'selected';} ?>>User</option>
        </select><br><br>
        <input type="submit" name="btn" id="btn" value="Update">
    </form>
    <?php
}else{
    header('location:login.php');
}    ?>

 <?php
@session_start();
@include('config.php');
if(@$_REQUEST['msg']){
    echo $_REQUEST['msg'];
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email=$_REQUEST['email'];
    $password=md5($_REQUEST['password']);

    $query=mysqli_query($con,"select * from usermaster where email='$email' and password='$password'");
    if(mysqli_affected_rows($con)>0){
        $data=mysqli_fetch_assoc($query);
        $_SESSION['userid']=$data['userid'];
        $_SESSION['name']=$data['name'];
        $_SESSION['role']=$data['role'];
        if($data['role']=='admin'){
            header("location:adminlanding.php");
        }else{
            header("location:userlanding.php");
        }
    }else{
        header("location:login.php?msg=Invalid credentials");
    }
}
?>
<form method="post">
    <input type="email" name="email" id="email" placeholder="Enter Your Email">
    <br>
    <input type="password" name="password" id="password" placeholder="Enter Your password">
    <br>
    <input type="submit" name="btn" id="btn" value="login">
</form>
<a href="register.php">REGISTER</a>

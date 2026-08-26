 <?php
 include('Config.php');
 if(@$_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $password=md5($_REQUEST['password']);
    $mobile=$_REQUEST['mobile'];
    $role=$_REQUEST['role'];

    $insert=mysqli_query($con,"INSERT INTO usermaster(name, email, password, mobile, role) VALUES ('$name','$email','$password','$mobile','$role')");
     $row=mysqli_affected_rows($con);
     if($row>0){
        echo "User registered successfully";
    }else{
        echo"something went wrong";
    }
 }
?>
<form method="POST" >
    <input type="text" name="name" id="name" placeholder="Enter your name"><br>
    <input type="email" name="email" id="email" placeholder="Enter your email"><br>
    <input type="password" name="password" id="password" placeholder="Enter your password"><br>
    <input type="tel" name="mobile" id="mobile" placeholder="Enter your mobile number"><br>
    <select name="role" id="role">
        <option hidden>choose your role</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <input type="submit" name="btn" id="btn" value="Register">
</form>
<a href ="login.php">Login</a>

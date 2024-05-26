<?php
session_start();
$con=mysqli_connect("localhost","root","","Task_Management");
    $username = $_POST["username"];
    $password = $_POST["password"];
$sql="select * from reg_info where email='$username' and pass='$password'";
$res=mysqli_query($con,$sql);

$row_count = mysqli_num_rows($res);

    if ($row_count == 1) {
        session_start();
        $_SESSION["username"] = $username;
        $row = mysqli_fetch_assoc($res);
        $name = $row["email"];
        mysqli_close($con);
        header("Location: home.html"); 
    } else {
    
        echo "Invalid username or password. Please try again.";
    }
?>
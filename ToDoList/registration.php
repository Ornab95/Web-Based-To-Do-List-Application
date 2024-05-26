<?php
$con=mysqli_connect("localhost","root","","Task_Management");
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$email=$_POST['email'];
$pass=$_POST['password'];
   
$sql="insert into reg_info(fname,lname,email,pass) values('$fname','$lname','$email','$pass')";
mysqli_query($con,$sql);

?>

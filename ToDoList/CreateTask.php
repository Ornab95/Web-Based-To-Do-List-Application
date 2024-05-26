<?php
$con = mysqli_connect("localhost", "root", "", "task_management");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


$date=$_POST['dates'];
$tname=$_POST['tname'];
$time=$_POST['time'];

$sql="insert into tasks(date,task_name,time)values('$date','$tname','$time')";
if (mysqli_query($con, $sql)) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}


?>

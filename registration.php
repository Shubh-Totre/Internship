<?php
include('connection.php');
$sname= $_POST['name'];
$semail= $_POST['email'];
$password= $_POST['password'];
$sphno=$_POST['phno'];
$course=$_POST['course'];
$saddress=$_POST['address'];
$span_no=$_POST['pan'];
$skills=$_POST['skills'];

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="insert into student(sname, semail, sphno, course, saddress, span_no, skills, password) values('$sname','$semail','$sphno','$course','$saddress','$span_no','$skills','$password')";

$run=mysqli_query($conn,$query);

if($run)
	echo "data added successfully !!!";
else
	echo "data entering failed !!!";

mysqli_close($conn);

?>
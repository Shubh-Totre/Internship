<?php
include('connection.php');
$name= $_POST['name'];
$phn=$_POST['phno'];

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="delete from student where sname='$name' and sphno='$phn'";

$run=mysqli_query($conn,$query);

if($run)
	echo "data deleted successfully !!!";
else
	echo "data entering failed !!!";

mysqli_close($conn);

?>
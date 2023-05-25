<?php
include('connection.php');
$name= $_POST['name'];
$cid=$_POST['id'];

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="delete from company where cname='$name' and cid='$cid'";

$run=mysqli_query($conn,$query);

if($run)
	echo "data deleted successfully !!!";
else
	echo "data entering failed !!!";

mysqli_close($conn);

?>
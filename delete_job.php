<?php
include('connection.php');
$cid=$_POST['cid'];
$jid=$_POST['jid'];

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="delete from jobs where jid='$jid' and cid='$cid'";

$run=mysqli_query($conn,$query);

if($run)
	echo "data deleted successfully !!!";
else
	echo "data entering failed !!!";

mysqli_close($conn);

?>
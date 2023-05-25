<?php

session_start();

$email=$_SESSION['email'];

$jid=$_SESSION['jid'];
$_FILES['file']=$_POST['file'];
$file=$_FILES['file'];

include('connection.php');

                        if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                            }


						$query1="select sid from student where semail='$email'";
                            $run=mysqli_query($conn,$query1);
						if ($run->num_rows > 0):
                            while($array=mysqli_fetch_row($run)): 

                            	$id=$array[0];

						endwhile;
                        endif;

                            $query="insert into applied_jobs(document,sid,jid) values('$file','$id','$jid');";
                    
                            $run=mysqli_query($conn,$query);
                            if($run)


	echo "data added successfully !!!";
else
	echo "data entering failed !!!";

mysqli_close($conn);


?>
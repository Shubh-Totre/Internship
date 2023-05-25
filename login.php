<?php

session_start();
$_SESSION['pass']=$_POST['pass'];
$_SESSION['ltype']=$_POST['ltype'];
$_SESSION['email']=$_POST['email'];


$email= $_POST['email'];
$pass= $_POST['pass'];
$ltype=$_POST['ltype'];



include('connection.php');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if($ltype=='admin')
{
  if($email=='admin@123' && $pass=='admin')
  {
  	header('location:admin-panel.php');
  }
}
elseif ($ltype=='student')
{ 

$sql="select sid from student where semail='$email' and password='$pass'";

$run=mysqli_query($conn,$sql);

        if(mysqli_num_rows($run)==1)  
        {
          //echo 'welcome-' $array[1];
          
             $_SESSION['email']=$_POST['email'];
            
             header('location:student-login.php');
        }
        else 
        {
          echo 'login failed';
          
        }

}
else
  { 

$sql="select cid from company where cemail='$email' and PASSWORD='$pass'";

$run=mysqli_query($conn,$sql);

        if(mysqli_num_rows($run)==1)  
        {
          //echo 'welcome-' $array[1];
          
             $_SESSION['email']=$_POST['email'];
            
             header('location:company-login.php');
        }
        else 
        {
          echo 'login failed';
          
           
        }

}




mysqli_close($conn);
?>
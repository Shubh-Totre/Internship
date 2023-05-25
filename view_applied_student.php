<?php

session_start();

$email= $_SESSION['email'];

include('connection.php');

                        if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                            }


            $query1="select cid from company where cemail='$email'";
                            $run=mysqli_query($conn,$query1);
            if ($run->num_rows > 0):
                            while($array=mysqli_fetch_row($run)): 

                              $cid=$array[0];

            endwhile;
                        endif;

?>
<!DOCTYPE html>
<html>
<head>

 <style type="text/css">

html,
title {
  font-family: sans-serif;
  font-weight: 100;
  color: #fff;

}
body {
  height: 100%;
}

body {
  margin: 0;
  background: linear-gradient(45deg, #49a09d, #5f2c82);
  font-family: sans-serif;
  font-weight: 100;
}

.container {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

table {
  width: 900px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: left;
  color: #000000;
}

thead {
  th {
    background-color: #55608f;
  }
}

tbody {
  tr {
    &:hover {
      background-color: rgba(255,255,255,0.3);
    }
  }
  td {
    position: relative;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: rgba(255,255,255,0.2);
        z-index: -1;
      }
    }
  }
}


 </style>

</head>
<body>
	<?php
include('connection.php');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$query="select sname, semail, sphno, course, saddress, skills from student s, applied_jobs a,jobs j,company c where s.sid=a.sid and a.jid=j.jid and j.cid=c.cid and c.cid=$cid";

$run=mysqli_query($conn,$query);

?>

<div class="tab-header text-center"><br><br><br>
       <center><h2> View Student Data </h2></center> 
        
          </div>

            <div class="container">
              <table class="table">
                
              <tr>
                

                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>Address</th>
                <th>Skills</th>
                
              </tr>

<?php if ($run->num_rows > 0):
           while($array=mysqli_fetch_row($run)): ?>
           <div>
             <tr>
               <td><?php echo $array[0]; ?></td>
               <td><?php echo $array[1]; ?></td>
               <td><?php echo $array[2]; ?></td>
               <td><?php echo $array[3]; ?></td>
               <td><?php echo $array[4]; ?></td>
               <td><?php echo $array[5]; ?></td>
              
               
             </tr>
           </div>
<?php endwhile; ?>
        <?php endif; ?>
    <?php mysqli_free_result($run); ?>
              </table>

</body>
</html>
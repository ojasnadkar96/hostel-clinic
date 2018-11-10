

<?php
session_start();
include_once 'dbconnectdbms.php';

$res=mysqli_query($con,"SELECT * FROM student WHERE Student_id=".$_SESSION['student']);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
 
  

$res1=mysqli_query($con,"SELECT * FROM prescription WHERE Student_id=".$_SESSION['student'] );


?>
<html>
<head>
	<title>Student</title>
	
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	
</head>
<style>
#header{
width:100%;
height:25%;
border:1px solid black;
}
#vlogo{
height:100%;
width:18%;
float:left;
}
#vname{
vertical-align: middle; 
text-align:center;
font-size:40px;
}
#vimg{
height:100%;
width:20%;
float:right;
}
.cube{
	padding-right:80px;
	padding-left:80px;
}
</style>

<body>

<div id="header">
<img id="vlogo" src="logo.gif">
<img id="vimg" src="vjticover.gif"><br/>
<div id="vname">Veermata Jijabai Technological Institute</div>
<br/>
<div id="vname">Hostel Clinic Management</div>
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid"><strong>
  <h4>
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">VJTI Clinic</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#"> ID: &nbsp;<?php echo $userRow["Student_id"]; ?></a></li>
      <li class="active"><a href="#"> Course: &nbsp;<?php echo $userRow["Course"]; ?></a></li>
      <li class="active"><a href="#"> DOB: &nbsp;<?php  echo $userRow["DOB"]; ?></a></li> 
      <li class="active"><a href="#"> Branch: &nbsp;<?php  echo $userRow["Branch"]; ?></a></li> 
	   <li class="active"><a href="#"> Block: &nbsp;<?php   echo $userRow["S_block"]; ?></a></li> 
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $userRow["S_name"];?>  &nbsp; </a></li>
	</ul></h4> 
   </strong>	
  </div>
</nav>

<div class="cube">
<table class="table table-bordered table-hover">
    <thead>
      <tr>
<th>Sr. No.</th>
<th>DATE</th>

<th> Prescription ID</th>
<th> MEDICINES</th>

<th>SYMPTOMS</th>
      </tr>
    </thead>
    <tbody>

<?php
$x = 1;
while ($ert=mysqli_fetch_assoc($res1)) {

	echo "<tr>";
	echo "<td>".$x. "</td>";
    echo "<td>".$ert["ddate"]. "</td>";
	
	echo "<td>".$ert["Prescription_no"]. "</td>";
	echo "<td>".$ert["Medicines"]. "</td>";
	
	echo "<td>".$ert["Symptoms"]. "</td>";

echo "</tr>";
$x++;

}

?>
    </tbody>
  </table>
  </div>
</body>
</html>
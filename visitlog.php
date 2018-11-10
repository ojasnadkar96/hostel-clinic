<?php
session_start();
include_once 'dbconnectdbms.php';
$flag=0;
date_default_timezone_set('Asia/Calcutta');
 $ddate=date("Y/m/d");

$option=$_POST['Selectby']; 



if(isset($_POST['v4']) && $option==1)
{
  $flag=1;
    $fname = mysqli_real_escape_string($con,$_POST['v1']);
    $fname = trim($fname);

    $res1 =mysqli_query($con, "SELECT * FROM prescription WHERE ddate='$fname' ORDER BY ddate DESC");
	
	 //Run through all objects set in the POST array
    foreach( $_POST as $key => $value )
    {
        //Set a variable named the same as the input elements name, and with the value
        ${$key} = $value;
    }
     
    
   
}

else if(isset($_POST['v4']) && $option==2)
{
  $flag=1;
    $fname = mysqli_real_escape_string($con,$_POST['v1']);
    $fname = trim($fname);

    $res1 =mysqli_query($con, "SELECT * FROM prescription WHERE Student_id='$fname' ORDER BY ddate DESC");
   
    //Run through all objects set in the POST array
    foreach( $_POST as $key => $value )
    {
        //Set a variable named the same as the input elements name, and with the value
        ${$key} = $value;
    }
     
    
   
}

else if(isset($_POST['v4']) && $option==3)
{
  $flag=1;
    $fname = mysqli_real_escape_string($con,$_POST['v1']);
    $fname = trim($fname);

    $res1 =mysqli_query($con,"SELECT * FROM prescription WHERE Prescription_no='$fname' ORDER BY ddate DESC");
    
    //Run through all objects set in the POST array
    foreach( $_POST as $key => $value )
    {
        //Set a variable named the same as the input elements name, and with the value
        ${$key} = $value;
    }
     
   
}
 
 else if($flag==0)
 {  $flag=1;
  $res1 =mysqli_query($con,"SELECT * FROM prescription WHERE ddate='$ddate' ORDER BY Prescription_no ASC");
 }


    $_SESSION['prescription'] = $_SESSION['printp.php'];


?>

<html>
<head>
  <title>Visit_Log</title>
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
.circle{
	padding-right:40px;
}
.cube{
  padding-right:80px;
  padding-left:80px;
}
th, td {
    padding: 45px;
    text-align: center;
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
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">VJTI Clinic</a>
    </div>
    <ul class="nav navbar-nav">
    </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; VISITLOG  !</a></li>
  </ul>  
  </div>
</nav>

 <div class="col-sm-6 col-sm-offset-6">
        <a href="doctor.php" ><button class="btn btn-success">BACK</button></a>
      </div>

<div class="circle">
<form name="vform" method="post"  class="form-horizontal" role="form">
<div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
  <label for="sel1">Select By:</label>
  <select class="form-control" name="Selectby" id="Selectby">

   <option <?php if ($_GET['Selectby'] == 'Date (YYYY-MM-DD)') { ?>selected="true" <?php }; ?> value="0" name="s8" id="s8">Select any option</option>

    <option <?php if ($_GET['Selectby'] == 'Date (YYYY-MM-DD)') { ?>selected="true" <?php }; ?> value="1" name="s1" id="s1">Date (YYYY-MM-DD)</option>
	
	
    <option <?php if ($_GET['Selectby'] == 'Registration number') { ?>selected="true" <?php }; ?> value="2" name="s2" id="s2">Registration number</option>
	

    <option <?php if ($_GET['Selectby'] == 'Prescription ID') { ?>selected="true" <?php }; ?> value="3" name="s3" id="s3">Prescription ID</option>
	
  </select>
</div>
</div>
  
     <div class="form-group">
      <label class="control-label col-sm-2" for="email"></label>
      <div class="col-sm-offset-1 col-sm-10">
	  <input  name="v1" class="form-control"   type="text"  placeholder="Enter Value"> 
	  </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-1 col-sm-10">
        <button type="submit" name="v4" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
<?php
if( $flag==1 )
{
  ?>
<div class="cube">
<center><b><h1>Visit Log</h1><b></center>
<br/>
<table class="table table-bordered table-hover">
    <thead>
      <tr>
<th>DATE</th>
<th>TIME</th>
<th>REGISTRATION ID</th>

<th> PRESCRIPTION ID</th>
<th> MEDICINES</th>

<th>SYMPTOMS</th>
      </tr>
    </thead>
    <tbody>

<?php
while ($ert=mysqli_fetch_assoc($res1)) {

  echo "<tr>";
    echo "<td>".$ert["ddate"]. "</td>";
  echo "<td>".$ert["ttime"]. "</td>";
  echo "<td>".$ert["Student_id"]. "</td>";
  echo "<td>".$ert["Prescription_no"]."</td>";
  echo "<td>".$ert["Medicines"]. "</td>";
  
  echo "<td>".$ert["Symptoms"]. "</td>";

echo "</tr>";

}
?>

    </tbody>
  </table>
  </div>
   <?php           
}
?>

<br/><br/><br/><br/>


</body>
</html>
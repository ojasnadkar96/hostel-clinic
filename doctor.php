<?php
session_start();
include_once 'dbconnectdbms.php';


if(isset($_POST['d4']))
{
    $fname = mysqli_real_escape_string($con,$_POST['d1']);
    $lname = mysqli_real_escape_string($con,$_POST['d2']);
    $coun = mysqli_real_escape_string($con,$_POST['d3']);    
   
    $fname = trim($fname);
    $lname = trim($lname);
    $coun = trim($coun);
  date_default_timezone_set('Asia/Calcutta');
 $ddate=date("Y/m/d");
 $timee=date("h:i:s");

    $query = "SELECT Student_id FROM student WHERE Student_id='$fname'";
    $result = mysqli_query($con,$query);
    
    $count = mysqli_num_rows($result); // if email not found then register

   
    
    if($count == 1){
    
  
        if(mysqli_query($con,"INSERT INTO prescription(Medicines,Symptoms,Student_id,ddate,ttime) VALUES('$coun','$lname','$fname','$ddate','$timee')") )
            {
                ?>
            <script>alert('Prescription is stored sucessfully');</script>
        <?php
                }
                            }
                        }
else if (isset($_POST['d5']))
   { 
    $flag=1;
	
	 //Run through all objects set in the POST array
    foreach( $_POST as $key => $value )
    {
        //Set a variable named the same as the input elements name, and with the value
        ${$key} = $value;
    }
                
      $fname1 = mysqli_real_escape_string($con,$_POST['d1']);
                          $res1=mysqli_query($con,"SELECT * FROM prescription WHERE Student_id='$fname1' ORDER BY ddate DESC");

                          $res2=mysqli_query($con,"SELECT * FROM student WHERE Student_id='$fname1'");				  
						  
						  }

?>

<html>
<head>
	<title>Doctor</title>
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
.rect{
	padding-right:80px;
	padding-left:80px;
}
.cube{
	
	padding-right:40px;
	
}
th, td {
    padding: 45px;
    text-align: center;
}
</style>
<body>
<?php echo $userRow['D_name'];?>

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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp; Welcome  !</a></li>
	</ul>  
  </div>
</nav>



<div class="cube">
<div class="page-header">
  <h1><p align="center">Prescription</span></h1>
</div>



<form name="sform" method="post"  class="form-horizontal" role="form">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Student Registration No.:</label>
      <div class="col-sm-10">
        <input type="text" name="d1" class="form-control"  placeholder="Enter Student Registration Number" value="<?=(isset($d1) ? $d1 : "")?>">
		
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="d5" class="btn btn-primary">Check Medical History</button>
      </div>
    </div>

<?php
if( $flag==1 )
{
  $ert1=mysql_fetch_assoc($res2);
$ert2=$ert1['S_name'];
	echo "<center><h2><b>Medical History of: $ert2 </b></h2></center>";
  ?>
<br/> 
<div class="rect">
<table class="table table-bordered table-hover">
    <thead>
      <tr>
<th>DATE</th>

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
  
  echo "<td>".$ert["Prescription_no"]. "</td>";
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
<br/>	

	
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Symptoms:</label>
      <div class="col-sm-10">          
        <input type="text" name="d2" class="form-control"  placeholder="Enter Symptoms">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Medicines:</label>
      <div class="col-sm-10">          
        <input type="text" name="d3" class="form-control"  placeholder="Enter Medicines">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="d4" class="btn btn-primary">Submit</button>
      </div>
	 </div>
  </form>
  <div class="col-sm-6 col-sm-offset-6">
        <a href="visitlog.php" ><button class="btn btn-success">VISIT LOG</button></a>
      </div>
</div>

<br/><br/>

<br/><br/>
</body>
</html>
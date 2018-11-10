<?php 
session_start();
include_once 'dbconnectdbms.php';


if(isset($_POST['ss']))
{
  $email = mysqli_real_escape_string($con,$_POST['write2']);
  
  $email = trim($email);
  
  $res=mysqli_query($con,"SELECT  Student_id FROM student WHERE Student_id='$email'");
  $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
  
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
  
  if($count == 1 )
  {
   $_SESSION['student'] = $row["Student_id"];

header("Location: student.php");
  }
  }

 else if(isset($_POST['ds']))
{
  $email = mysqli_real_escape_string($con,$_POST['write1']);
  
  $email = trim($email);
  
  $res=mysqli_query($con,"SELECT  D_id FROM doctor WHERE D_id='$email'");
  $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
  
  $count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row

if($count == 1 )
  {
	header("Location: doctor.php");
  }
  }

  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VJTI CLICNIC MANAGEMENT</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>



<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">WELCOME!</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#doctor">DOCTOR</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#student">STUDENT</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="download.jpg" alt="">
                    <div class="intro-text">
                        <span class="name">HOSTEL CLINIC</span>
                        <hr class="star-light">
                        <span class="skills">Veermata Jeejabai Technological Institute</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- About Section -->
    <section id="doctor">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>DOCTOR</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="Register1" id="regForm1" method="post" >
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Enter ID</label>
                                <input type="tel" class="form-control" name="write1" placeholder="Please enter your ID." id="reg1" required data-validation-required-message="Please enter your ID.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="ds" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section id="student">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>STUDENT</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form name="Register2" id="regForm2" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Registration Number</label>
                                <input type="tel" class="form-control" name="write2" placeholder="Please enter your registration number." id="reg2" required data-validation-required-message="Please enter your registration number.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="ss" class="btn btn-success btn-lg">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    
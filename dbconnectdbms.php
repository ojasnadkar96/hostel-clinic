<?php
error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
$con = mysqli_connect("127.0.0.1","root","");
if(!$con)
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysqli_select_db($con,"dbms"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>
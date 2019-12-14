<?php
include_once 'header.php';

if(!isset($_POST['title']) || (!isset($_POST['desc'])) || (!isset($_POST['active'])) || (!isset($_POST['home'])))
{
	   echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Go to Services page</a></p>
    </div>
</div>');

	
}else{

require_once 'prog_db.php';
require_once 'servicesAPI.php';


$image_dir      = dirname(__FILE__). "/images/";
$image_name     = $_FILES['image']["name"]; 
$image_name_dir = $image_dir. $_FILES['image']["name"];


$serv = prog_servs_get_by_title($_POST['title']);
if ($serv != NULL) 
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Service title Exist!</h1>
        <p class="info">Please enter another Service title...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addservice.php">Back to New Service page</a></p>
    </div>
</div>');
		
}else{

$result = prog_servs_add(trim($_POST['title']),trim($_POST['desc']),trim($image_name),($_POST['active']),($_POST['home']));

prog_db_close();


if($result == "empty title")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Title!</h1>
        <p class='info'>Please enter Service's title...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addservice.php'>Back to New Service page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty desc")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Dscreption!</h1>
        <p class='info'>Please enter Service's description...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addservice.php'>Back to New Service page</a></p>
    </div>
</div>";
}else{
	
/*		
if($result == "empty date")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Date!</h1>
        <p class='info'>Please enter Reports's date...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
*/	
if($result == "empty image")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Image!</h1>
        <p class='info'>Please enter Image for your Service...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addservice.php'>Back to New Service page</a></p>
    </div>
</div>";
}else{
		
if($result == "false")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addservice.php">Back to New Service page</a></p>
    </div>
</div>');
}else{

	
if($result == "true")							 
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Service has successfully...Thank you.</p>
        <p><i class='icon-dashboard'></i></p>
        <p><a href='services.php'>Back to Services page</a></p>
    </div>
</div>";}                             
	
}}}}}}

include_once 'footer.php';
?>
<?php
include_once 'header.php';

if(!isset($_POST['name']) || (!isset($_POST['job'])) || (!isset($_POST['desc'])) || (!isset($_POST['content'])) || (!isset($_POST['active'])) || (!isset($_POST['home'])))
{
	   echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Go to Testimonials page</a></p>
    </div>
</div>');

	
}else{

require_once 'prog_db.php';
require_once 'testimonialsAPI.php';
		
$result = prog_testi_add(trim($_POST['name']),trim($_POST['job']),trim($_POST['desc']),trim($_POST['content']),($_POST['active']),($_POST['home']));

prog_db_close();


if($result == "empty name")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty name!</h1>
        <p class='info'>Please enter Witness name...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addtestimonial.php'>Back to New Testimonial page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty job")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty job!</h1>
        <p class='info'>Please enter job of Witness...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addtestimonial.php'>Back to New Testimonial page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty desc")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Dscreption!</h1>
        <p class='info'>Please enter Testimonial's description...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addtestimonial.php'>Back to New Testimonial page</a></p>
    </div>
</div>";
}else{
			
if($result == "false")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addtestimonial.php">Back to New Testimonial page</a></p>
    </div>
</div>');
}else{

	
if($result == "true")							 
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Done Successfully!</h1>
        <p class='info'>Add a new testimonial has successfully...Thank you.</p>
        <p><i class='icon-user'></i></p>
        <p><a href='testimonials.php'>Back to Testimonials page</a></p>
    </div>
</div>";}                             
	
}}}}}

include_once 'footer.php';
?>
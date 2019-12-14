<?php
include_once 'header.php';
if(!isset($_POST['email']))
{
echo'<script> location.replace("newsletters.php")</script>';

}else{

require_once 'prog_db.php';
require_once 'newslettersAPI.php';


$result = prog_newsletters_add(trim($_POST['email']));

prog_db_close();


if($result == "empty email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Email!</h1>
        <p class='info'>Please enter the Email...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnewsletter.php'>Back to New Newsletter page</a></p>
    </div>
</div>";

}else{
	
if($result == "wrong_email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Incorrect Email!</h1>
        <p class='info'>Please enter the Email...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnewsletter.php'>Back to New Newsletter page</a></p>
    </div>
</div>";

}else{
	
					
if($result == "false")
{
	 echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please tray again...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addnewsletter.php">Back to New Newsletter page</a></p>
    </div>
</div>');
}else{
	
if($result == "true")							 
{
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Progress Done!</h1>
        <p class='info'>Add a new newsletter has successfully...Thank you.</p>
        <p><i class='icon-comment'></i></p>
        <p><a href='newsletters.php'>Back to Newsletters page</a></p>
    </div>
</div>";

}                             
	
}}}}

include_once 'footer.php';
?>
<?php
include_once 'header.php';
if(!isset($_POST['name']) || (!isset($_POST['city']))|| (!isset($_POST['email'])) || (!isset($_POST['message'])))
{
echo'<script> location.replace("contacts.php")</script>';

}else{

require_once 'prog_db.php';
require_once 'contactsAPI.php';


$result = prog_contacts_add(trim($_POST['name']),trim($_POST['city']),trim($_POST['email']),trim($_POST['message']));

prog_db_close();


if($result == "empty name")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Name!</h1>
        <p class='info'>Please enter Sender's name...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addcontact.php'>Back to New Contact page</a></p>
    </div>
</div>";

}else{
	
if($result == "empty city")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty City!</h1>
        <p class='info'>Please enter Sender's city...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addcontact.php'>Back to New Contact page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty Email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Email!</h1>
        <p class='info'>Please enter Sender's Email...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addcontact.php'>Back to New Contact page</a></p>
    </div>
</div>";
}else{
		
if($result == "wrong_email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Wrong Email!</h1>
        <p class='info'>Please enter Sender's Email...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addcontact.php'>Back to New Contact page</a></p>
    </div>
</div>";
}else{	
		
if($result == "empty message")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Message!</h1>
        <p class='info'>Please enter Sender's Message...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addcontact.php'>Back to New Contact page</a></p>
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
        <p><a href="addcontact.php">Back to New Contact page</a></p>
    </div>
</div>');
}else{
	
if($result == "true")							 
{
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Contact has successfully...Thank you.</p>
        <p><i class='icon-twitter'></i></p>
        <p><a href='contacts.php'>Back to Contacts page</a></p>
    </div>
</div>";}                             
	
}}}}}}}

include_once 'footer.php';
?>
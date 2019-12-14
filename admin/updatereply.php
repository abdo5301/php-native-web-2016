<?php
include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("contacts.php")</script>';


}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("contacts.php")</script>';

}else{


require_once 'prog_db.php';
require_once 'repliesAPI.php';


$r = prog_replies_get_by_id($_id);


if($r == NULL){

prog_db_close();
    echo'<script> location.replace("contacts.php")</script>';

}else{	

if(!isset($_POST['title']) || (!isset($_POST['message']))|| (!isset($_POST['email'])))
{
	prog_db_close();
echo'<script> location.replace("contacts.php")</script>';

}else{

$result = prog_replies_update($_id,$r->contact_id,$_SESSION['user_info']->adm_id,trim($_POST['title']),trim($_POST['message']),trim($_POST['email']));

prog_db_close();
		
		
if($result == "wrong_email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Wrong Email!</h1>
        <p class='info'>Please enter CONTACT Email...Thank you.</p>
        <p><i class='icon-twitter'></i></p>
        <p><a href='contacts.php'>Back to Contacts page</a></p>
    </div>
</div>";
}else{	
							
if($result == "false")
{
	 echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please tray again...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="contacts.php">Back to Contacts page</a></p>
    </div>
</div>');
}else{
	
if($result == "true")							 
{
	$msg = trim($_POST['message']);
	
	mail(trim($_POST['email']),trim($_POST['title']),$msg);
	
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Done!</h1>
        <p class='info'>Updating Reply has successfully...Thank you.</p>
        <p><i class='icon-twitter'></i></p>
        <p><a href='contacts.php'>Back to Contacts page</a></p>
    </div>
</div>"; 
                      
             echo'<script> location.replace("contactdetails.php?p='.$r->contact_id.'")</script>';         
}                                                   
	
}}}}}}

include_once 'footer.php';
?>
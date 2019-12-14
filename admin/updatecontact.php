<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("contacts.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("contacts.php")</script>';

}else{


if(!isset($_POST['name']) || (!isset($_POST['city'])) || (!isset($_POST['email'])) || (!isset($_POST['message'])))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="contacts.php">Go to Contacts page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'contactsAPI.php';

	
$result = prog_contacts_update($_id,trim($_POST['name']),trim($_POST['city']),($_POST['email']),($_POST['message']));
prog_db_close();

if($result == "true")
{
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Message informations has successfully...Thank you.</p>
        <p><i class='icon-twitter'></i></p>
        <p>Back to Contacts page from<a href='contacts.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{

	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="contacts.php">Back to Contacts page</a></p>
    </div>
    </div>');

}}}}

include_once 'footer.php'; 

?>
<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("newsletters.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("newsletters.php")</script>';

}else{


if(!isset($_POST['email']))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Go to Newsletters page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'newslettersAPI.php';

	
$result = prog_newsletters_update($_id,trim($_POST['email']));
prog_db_close();

if($result == "wrong_email")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Incorrect Email!</h1>
        <p class='info'>Please enter the Email...Thank you.</p>
        <p><i class='icon-comment'></i></p>
        <p><a href='newsletters.php'>Back to Newsletters page</a></p>
    </div>
</div>";

}else{


if($result == "true")
{
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Newsletter informations has successfully...Thank you.</p>
        <p><i class='icon-comment'></i></p>
        <p>Back to Newsletters page from<a href='newsletters.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{

	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Back to Newsletters page</a></p>
    </div>
    </div>');

}}}}}

include_once 'footer.php'; 

?>
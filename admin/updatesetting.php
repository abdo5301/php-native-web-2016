<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("settings.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("settings.php")</script>';

}else{


if(!isset($_POST['key']) || (!isset($_POST['content'])))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-briefcase"></i></p>
        <p><a href="settings.php">Go to Settings page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'settingAPI.php';

	
$result = prog_setting_update($_id,trim($_POST['key']),trim($_POST['content']));
prog_db_close();

if($result == "true")
{
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Setting informations has successfully...Thank you.</p>
        <p><i class='icon-briefcase'></i></p>
        <p>Back to Settings page from<a href='settings.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{

	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-briefcase"></i></p>
        <p><a href="settings.php">Back to Settings page</a></p>
    </div>
    </div>');

}}}}

include_once 'footer.php'; 

?>
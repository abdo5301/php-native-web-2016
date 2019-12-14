<?php
include_once 'header.php';
if(!isset($_POST['key']) || (!isset($_POST['content'])))
{
echo'<script> location.replace("settings.php")</script>';

}else{

require_once 'prog_db.php';
require_once 'settingAPI.php';


$result = prog_setting_add(trim($_POST['key']),trim($_POST['content']));

prog_db_close();


if($result == "empty key")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Key!</h1>
        <p class='info'>Please enter Setting's key...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addsetting.php'>Back to New Setting page</a></p>
    </div>
</div>";

}else{
	
if($result == "empty desc")
{
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Content!</h1>
        <p class='info'>Please enter Setting's content...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addsetting.php'>Back to New Setting page</a></p>
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
        <p><a href="addsetting.php">Back to New Setting page</a></p>
    </div>
</div>');
}else{
	
if($result == "true")							 
{
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Setting has successfully...Thank you.</p>
        <p><i class='icon-briefcase'></i></p>
        <p><a href='settings.php'>Back to Settings page</a></p>
    </div>
</div>";}                             
	
}}}}

include_once 'footer.php';
?>
<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("users.php")</script>';

}else{


if($_SESSION['user_info']->big_adm != 1)
{
if($_SESSION['user_info']->adm_id != $_GET['p']) 
{echo'<script> location.replace("users.php")</script>';

}

}

  
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("users.php")</script>';
		
}else{

if(!isset($_POST['password1']) || (!isset($_POST['password2'])) || (!isset($_POST['password3']))) 
{
echo'<script> location.replace("users.php")</script>';
	
}else{
	
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$user = prog_adm_users_get_by_id($_id);

if(($user == NULL) || ($user->adm_id != $_id))
{
	prog_db_close();
echo('<div class="row-fluid">
      <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
    </div>');
		
}else{


$pass_1 = @md5(@mysql_real_escape_string(strip_tags($_POST['password1']),$prog_handle));

if(strcmp($user->password,$pass_1)!= 0)
{
    prog_db_close();
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Wrong Password!</h1>
        <p class='info'>Please enter User's password...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";

}else{
			
	
if(trim($_POST['password1']) == trim($_POST['password2']))
{
     prog_db_close();
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Same Password!</h1>
        <p class='info'>Please enter New password...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";	
		
}else{
						
if(trim($_POST['password2']) != trim($_POST['password3']))
{
	prog_db_close();
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Wrong Confirm!</h1>
        <p class='info'>Please enter the same password in Confirm...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";
		
}else{	
	
$result = prog_adm_users_update($_id,NULL,NULL,NULL,NULL,trim($_POST['password2']));

prog_db_close();


if($result == "true")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Administrator's Password has successfully...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='logout.php'>Please resign in from here</a></p>
    </div>
 </div>";                                                
	
}else{
	
if($result == "false")	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
   </div>');


}}}}}}}}

include_once 'footer.php'; 

?>

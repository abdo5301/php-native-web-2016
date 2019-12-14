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


if(!isset($_POST['first_name']) || (!isset($_POST['last_name']))|| (!isset($_POST['email'])) || (!isset($_POST['username'])))
{
echo'<script> location.replace("users.php")</script>';
	  	
}else{
	
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';


$user = prog_adm_users_get_by_name($_POST['username']);
if (($user != NULL) && ($user->adm_id != $_id))
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Username Exist!</h1>
        <p class="info">Please enter another username...Thank you.</p>
        <p><i class="icon-user"></i></p>
         <p><a href="users.php">Back to Users page</a></p>
    </div>
</div>');
		
}else{

$user = prog_adm_users_get_by_email($_POST['email']);
if(($user != NUll) && ($user->adm_id != $_id))
{
    prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Email Exist!</h1>
        <p class="info">Please enter another Email Address...Thank you.</p>
        <p><i class="icon-user"></i></p>
         <p><a href="users.php">Back to Users page</a></p>
    </div>
</div>');

}else{
	
if($_SESSION['user_info']->big_adm == 1 )
{
	$result = prog_adm_users_update($_id,trim($_POST['first_name']),trim($_POST['last_name']),trim($_POST['email']),trim($_POST['username']),NULL,($_POST['golden']));
	
}		

if($_SESSION['user_info']->big_adm != 1 )	
{
	 $result = prog_adm_users_update($_id,trim($_POST['first_name']),trim($_POST['last_name']),trim($_POST['email']),trim($_POST['username']));
     
}

prog_db_close();

if($result == "wrong_email")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Incorrect Email Address!</h1>
        <p class='info'>Please enter Users's Email...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";

	
}else{
			
		
	if($result == "true")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Administrator's informations has successfully...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='logout.php'>Please resign in from here</a></p>
    </div>
</div>";                                                
			
}else{
	
if($result == "false")	
{echo('<div class="row-fluid">
        <div class="http-error">       
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
</div>');	

}}}}}}}}

include_once 'footer.php'; 

?>

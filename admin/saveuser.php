<?php
include_once 'header.php';
if(!isset($_POST['first_name']) || (!isset($_POST['last_name']))|| (!isset($_POST['email'])) || (!isset($_POST['username'])) || (!isset($_POST['password'])))
{
	   echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Go to Users page</a></p>
    </div>
</div>');
	
}else{

require_once 'prog_db.php';
require_once 'adm_usersAPI.php';


$user = prog_adm_users_get_by_name($_POST['username']);
if ($user != NULL) 
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Username Exist!</h1>
        <p class="info">Please enter another username...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="adduser.php">Back to sign up page</a></p>
    </div>
</div>');
		
}else{


$user = prog_adm_users_get_by_email($_POST['email']);
if($user != NUll)
{
    prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Email Exist!</h1>
        <p class="info">Please enter another Email Address...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="adduser.php">Back to sign up page</a></p>
    </div>
</div>');

}else{
	
if($_SESSION['user_info']->big_adm == 1 )
{
	
$result = prog_adm_users_add(trim($_POST['first_name']),trim($_POST['last_name']),trim($_POST['email']),trim($_POST['username']),trim($_POST['password']),($_POST['golden']));	

		
}
		
if($_SESSION['user_info']->big_adm != 1 )
{$result = prog_adm_users_add(trim($_POST['first_name']),trim($_POST['last_name']),trim($_POST['email']),trim($_POST['username']),trim($_POST['password']),0);


}

prog_db_close();

if($result == "empty first_name")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty First Name!</h1>
        <p class='info'>Please enter Users's first name...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty last_name")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Last Name!</h1>
        <p class='info'>Please enter Users's last name...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty email")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Email Address!</h1>
        <p class='info'>Please enter Users's Email...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{
		
if($result == "wrong_email")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Incorrect Email Address!</h1>
        <p class='info'>Please enter Users's Email...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{	
		
if($result == "empty username")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty First Name!</h1>
        <p class='info'>Please enter Users's nickname or username...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty password")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Password!</h1>
        <p class='info'>Please enter Users's Password ...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='adduser.php'>Back to Sign Up page</a></p>
    </div>
</div>";
}else{
		

		
if($result == "false")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please tray again...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="adduser.php">Sign up page</a></p>
    </div>
</div>');
}else{
	
if($result == "true")							 
{ echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Administrator has successfully...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='index.php'>Go to Sign in page</a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class='icon-user'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";}                             
	
}}}}}}}}}}

include_once 'footer.php';
?>
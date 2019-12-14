<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("users.php")</script>';

}else{

if($_SESSION['user_info']->big_adm != 1)
{
if($_SESSION['user_info']->adm_id != $_GET['p']) 
{      
echo'<script> location.replace("users.php")</script>';
}

}
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("users.php")</script>';
	
}else{
	
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$user = prog_adm_users_get_by_id($_id);

if($user == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select username from users menu...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
    </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deleteuser.php?p='.$user->adm_id.'& c=1">...delete '.$user->username.' </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-home"></i></p>
        <p>No..Back to<a href="users.php"> Users page</a></p>
    </div>
    </div>');
	


		
else{
	
$result = prog_adm_users_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">User has been deleted...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
   </div>');

}else{
	prog_db_close();	
echo('<div class="row-fluid"> 
        <div class="http-error">
        <h1>Oops..Wrong!</h1>
        <p class="info">Please select username from users menu...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="users.php">Back to Users page</a></p>
    </div>
   </div>');
      		



	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
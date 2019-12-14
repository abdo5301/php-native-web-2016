<?php include_once 'header2.php';

require_once 'session.php';

if(!isset($_POST['username']) || (!isset($_POST['password']))){
	header('Location:logout.php');

	
}else{
   
if(empty($_POST['username']) || (empty($_POST['password']))) 
{header('Location:logout.php');
	
}else{
	
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$user = prog_adm_users_get_by_name($_POST['username']);

if($user == NULL)
{
	prog_db_close();
header('Location:logout.php');	
		
}else{


$pass_1 = @md5(@mysql_real_escape_string(strip_tags($_POST['password']),$prog_handle));


if(strcmp($user->password,$pass_1)!= 0)
{
	prog_db_close();
	header('Location:logout.php');
 
}else{
	
$_SESSION['user_info'] = $user;

header("Location:users.php");	
	

}}}}

include_once 'footer.php'; 


?>

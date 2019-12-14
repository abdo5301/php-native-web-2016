<?php
//adm_UserAPIs

function prog_adm_users_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `adm_users` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$adm_users = array();

for($i = 0; $i<$rcount; $i++)

	$adm_users[@count($adm_users)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $adm_users;	
  		
}


	
function prog_adm_users_get_by_id($adm_id)
{
	$id = (int) $adm_id;
	if($id == 0)
	return NULL;
	
$result = prog_adm_users_get('WHERE `adm_id` = '.$id);
if($result == NULL)
return NULL;	


$adm_users = $result[0];	
	
return $adm_users;	
		
}	
	
	
	
function prog_adm_users_get_by_name($username)
{
global $prog_handle;
	
$ad_username = @mysql_real_escape_string(strip_tags($username),$prog_handle);	
	
$result = prog_adm_users_get("WHERE `username` = '$ad_username' ");
if($result == NULL)
return NULL	;

$adm_users = $result[0];

return $adm_users;
	
}	




function prog_adm_users_get_by_pass($password)
{
	global $prog_handle;
	
$ad_pass = @md5(@mysql_real_escape_string(strip_tags($password),$prog_handle));

$result = prog_adm_users_get("WHERE `password` = '$ad_pass' ");
if($result == NULL)
return NULL	;

$adm_users = $result[0];

return $adm_users;
			
}	
	
	

function prog_adm_users_get_by_email($email)
{
	global $prog_handle;
	
$ad_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);															
						
$result = prog_adm_users_get("WHERE `email` = '$ad_email' ");
if($result == NULL)
return NULL	;
					
$adm_users = $result[0];				
			
return $adm_users;		
	
}




function prog_adm_users_add($first_name,$last_name,$email,$username,$password,$big_admin)
{
	global $prog_handle;
	
if(empty($first_name))
return "empty first_name";

if(empty($last_name))
return "empty last_name";

if(empty($email))
return"empty email";/*Please enter the user's email*/

if(empty($username))
return"empty username";/*Please enter the user's username or nickname*/

if(empty($password))	
return"empty password" ;/*Please enter the user's password*/
	
		
$ad_first_name = @mysql_real_escape_string(strip_tags($first_name),$prog_handle);
	
$ad_last_name  = @mysql_real_escape_string(strip_tags($last_name),$prog_handle);
	
$ad_email      = @mysql_real_escape_string(strip_tags($email),$prog_handle);
if(!filter_var($ad_email,FILTER_VALIDATE_EMAIL))
return "wrong_email";

$ad_pass       = @md5(@mysql_real_escape_string(strip_tags($password),$prog_handle));

$ad_username   = @mysql_real_escape_string(strip_tags($username),$prog_handle);

$ad_big_adm    = (int)$big_admin;
 if (($ad_big_adm != 0) && ($ad_big_adm != 1))
 $ad_big_adm = 0 ;

$query = sprintf("INSERT INTO `adm_users`VALUE( NULL,'%s','%s','%s','%s','%s',%d)",$ad_first_name,$ad_last_name,$ad_email,$ad_username ,$ad_pass,$ad_big_adm);
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_adm_users_delete($adm_id)
{
	$id = (int) $adm_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `adm_users` WHERE `adm_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_adm_users_update($adm_id,$first_name = NULL,$last_name = NULL,$email = NULL,$username = NULL,$password = NULL,$big_admin = -1)
{
	global $prog_handle;
	
	$id = (int) $adm_id;
	if($id == 0)
	return "false";
	
	
		
$adm_users = prog_adm_users_get_by_id($id);
if(!$adm_users)
	return "false";


	
if((empty($first_name))&&(empty($last_name))&&(empty($email))&&(empty($username))&&(empty($password))&&($adm_users->big_adm == $ad_big_adm))	
	return "false";
	
	
$fields	= array();
$query ='UPDATE `adm_users` SET ';

if(!empty($first_name))
	{
		$ad_first_name = @mysql_real_escape_string(strip_tags($first_name),$prog_handle);
		
		$fields [@count($fields)] = "`first_name` = '$ad_first_name' ";	
	}	
	
if(!empty($last_name))
	{
		
		$ad_last_name  = @mysql_real_escape_string(strip_tags($last_name),$prog_handle);
		
		$fields [@count($fields)] = "`last_name` = '$ad_last_name' ";
		
	}	
	
	
if(!empty($email))
	{
		$ad_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);
                    if(!filter_var($ad_email,FILTER_VALIDATE_EMAIL))
                         return "wrong_email";
		 	
		$fields [@count($fields)] = "`email` = '$ad_email' ";
	}		
	
	
if(!empty($username))
	{
		$ad_username = @mysql_real_escape_string(strip_tags($username),$prog_handle);
		
		$fields [@count($fields)] = "`username` = '$ad_username' ";		
	}	
	
if(!empty($password))
	{
		
		$ad_pass = @md5(@mysql_real_escape_string(strip_tags($password),$prog_handle));
		
		$fields [@count($fields)] = "`password` = '$ad_pass' ";
			
	}


$ad_big_adm  = (int)$big_admin;
if($ad_big_adm == -1) 
    $ad_big_adm = $adm_users->big_adm;		

$fields [@count($fields)] = "`big_adm` = $ad_big_adm";

    
    	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `adm_id` =  '.$id;
	echo $query;
	$qresult = @mysql_query($query);
	if(!$qresult) 	
	return "false";
else		
    return "true";
	
}
	
for($i = 0; $i<$fcount; $i++)
{
	$query .= $fields[$i];
	 
	if($i != $fcount - 1)
	$query .= ' , ';		
}	

$query .= ' WHERE `adm_id` =  '.$id;
echo $query;
$qresult = @mysql_query($query);
	if(!$qresult)
	return "false";	
else
	return "true";


}		







/*

$users = prog_adm_users_get_by_id(2);

prog_db_close();
echo'<pre>';	
print_r($users);	
echo'</pre>';	
*/

/*
include 'prog_db.php';

$result = prog_adm_users_update('28',NULL,NULL,NULL,NULL,NULL,'0');
print_r($result); 
prog_db_close();

if($result == "true")
{
	echo'Done';
}else 

 echo 'failr';
*/


?>
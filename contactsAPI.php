<?php
//Contacts APIs

function prog_contacts_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `contacts` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$contacts = array();

for($i = 0; $i<$rcount; $i++)

	$contacts[@count($contacts)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $contacts;	
  		
}




	
function prog_contacts_get_by_id($contact_id)
{
	$id = (int) $contact_id;
	if($id == 0)
	return NULL;
	
$result = prog_contacts_get('WHERE `contact_id` = '.$id);
if($result == NULL)
return NULL;	


$contact = $result[0];	
	
return $contact;	
		
}	
	
	
	
function prog_contacts_get_by_name($name)
{
global $prog_handle;
	
$co_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);	
	
$result = prog_contacts_get("WHERE `name` = '$co_name' ");
if($result == NULL)
return NULL	;

return $result;
	
}	






function prog_contacts_add($name,$city,$email,$message)
{
	global $prog_handle;
	
if(empty($name))
return "empty name";

if(empty($city))
return "empty city";

if(empty($email))
return"empty email";

if(empty($message))
return"empty message";
	
		
$co_name  = @mysql_real_escape_string(strip_tags($name),$prog_handle);
	
$co_city  = @mysql_real_escape_string(strip_tags($city),$prog_handle);
	
$co_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);
if(!filter_var($co_email,FILTER_VALIDATE_EMAIL))
return "wrong_email";

$co_message   = @mysql_real_escape_string(strip_tags($message),$prog_handle);


$query = sprintf("INSERT INTO `contacts`VALUE( NULL,'%s','%s','%s','%s')",$co_name,$co_city,$co_email,$co_message);
       /*echo $query;*/
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_contacts_delete($contact_id)
{
	$id = (int) $contact_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `contacts` WHERE `contact_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_contacts_update($contact_id,$name = NULL,$city = NULL,$email = NULL,$message = NULL)
{
	global $prog_handle;
	
	$id = (int) $contact_id;
	if($id == 0)
	return "false";
	
	
		
$contact = prog_contacts_get_by_id($id);
if(!$contact)
	return "false";


	
if((empty($name))&&(empty($city))&&(empty($email))&&(empty($message)))	
	return "false";
	
	
$fields	= array();
$query ='UPDATE `contacts` SET ';

if(!empty($name))
	{
		$co_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);
		
		$fields [@count($fields)] = "`name` = '$co_name' ";	
	}	
	
if(!empty($city))
	{
		
		$co_city  = @mysql_real_escape_string(strip_tags($city),$prog_handle);
		
		$fields [@count($fields)] = "`city` = '$co_city' ";
		
	}	
	
	
if(!empty($email))
	{
		$co_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);
                    if(!filter_var($co_email,FILTER_VALIDATE_EMAIL))
                         return "wrong_email";
		 	
		$fields [@count($fields)] = "`email` = '$co_email' ";
	}		
	
	
if(!empty($message))
	{
		$co_message = @mysql_real_escape_string(strip_tags($message),$prog_handle);
		
		$fields [@count($fields)] = "`Message` = '$co_message' ";		
	}	
	
        	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `contact_id` =  '.$id;
	/*echo $query;*/
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

$query .= ' WHERE `contact_id` =  '.$id;
 /*echo $query;*/
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

$result = prog_contacts_add('pop','cairo','pop_pop5301@yahoo.com','help please ..I need more info about lol'); 
prog_db_close();

if($result == "true")
{
	echo'Done';
}else 

 echo 'failr';
*/


?>
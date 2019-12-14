<?php
//Replies APIs

function prog_replies_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `replies` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$replies = array();

for($i = 0; $i<$rcount; $i++)

	$replies[@count($replies)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $replies;	
  		
}




	
function prog_replies_get_by_id($answer_id)
{
	$id = (int) $answer_id;
	if($id == 0)
	return NULL;
	
$result = prog_replies_get('WHERE `answer_id` = '.$id);
if($result == NULL)
return NULL;	


$reply = $result[0];	
	
return $reply;	
		
}	
	


function prog_replies_get_by_cid($contact_id)
{
	$id = (int) $contact_id;
	if($id == 0)
	return NULL;
	
$result = prog_replies_get('WHERE `contact_id` = '.$id);
if($result == NULL)
return NULL;		
	
return $result;	
		
}	



	
/*	
function prog_contacts_get_by_name($name)
{
global $prog_handle;
	
$co_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);	
	
$result = prog_contacts_get("WHERE `name` = '$co_name' ");
if($result == NULL)
return NULL	;

return $result;
	
}	
*/





function prog_replies_add($contact_id,$adm_id,$title,$content,$email)
{
	global $prog_handle;

$_cid =(int)$contact_id;
$_aid =(int)$adm_id;	
		
if(($_cid == 0) || ($_aid == 0))
return "false";

if(empty($content))
return"empty content";

if(empty($email))
return"empty email";
	
		
$rp_title  = @mysql_real_escape_string(strip_tags($title),$prog_handle);
	
$rp_content  = @mysql_real_escape_string(strip_tags($content),$prog_handle);
	
$rp_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);
if(!filter_var($rp_email,FILTER_VALIDATE_EMAIL))
return "wrong_email";

$query = sprintf("INSERT INTO `replies`VALUE( NULL,%d,%d,'%s','%s','%s')",$_cid,$_aid,$rp_title,$rp_content,$rp_email);
       echo $query;
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_replies_delete($answer_id)
{
	$id = (int) $answer_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `replies` WHERE `answer_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_replies_update($answer_id,$contact_id = 0,$adm_id = 0,$title = NULL,$content = NULL,$email = NULL)
{
	global $prog_handle;
	$id  = (int) $answer_id;
    $cid = (int) $contact_id;	
	$aid = (int) $adm_id;
	
if($id <= 0)return "false";
	
$reply = prog_replies_get_by_id($id);
if($reply == NULL)
	return "false";

	
if((empty($title))&&(empty($content))&&(empty($email))&&($cid == $reply->contact_id) && ($aid == $reply->adm_id))	
	return "false";

if($cid <= 0)
	$cid = $reply->contact_id;
	
if($aid <= 0)
	$aid = $reply->adm_id;
		
	
$fields	= array();
$query ='UPDATE `replies` SET ';

if(!empty($title))
	{
		$rp_title = @mysql_real_escape_string(strip_tags($title),$prog_handle);
		
		$fields [@count($fields)] = "`title` = '$rp_title' ";	
	}	
	
if(!empty($content))
	{
		
		$rp_content  = @mysql_real_escape_string(strip_tags($content),$prog_handle);
		
		$fields [@count($fields)] = "`content` = '$rp_content' ";
		
	}	
	
	
if(!empty($email))
	{
		$rp_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);
                    if(!filter_var($rp_email,FILTER_VALIDATE_EMAIL))
                         return "wrong_email";
		 	
		$fields [@count($fields)] = "`contact_email` = '$rp_email' ";
	}		
	
	$fields [@count($fields)] = "`contact_id` = '$cid' ";
	$fields [@count($fields)] = "`adm_id` = '$aid' ";
	
	
        	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `answer_id` =  '.$id;
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

$query .= ' WHERE `answer_id` =  '.$id;
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

$result = prog_replies_add('8','33','Hello','help please ..I need more info about lol','pop_pop5301@yahoo.com'); 
prog_db_close();

if($result == "true")
{
	echo'Done';
}else 

 echo 'failr';
*/


?>
<?php

//Newsletters APIs

function prog_newsletters_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `news_letter` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$letters = array();

for($i = 0; $i<$rcount; $i++)

	$letters[@count($letters)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $letters;	
  		
}


	
function prog_newsletters_get_by_id($letter_id)
{
	$id = (int) $letter_id;
	if($id == 0)
	return NULL;
	
$result = prog_newsletters_get('WHERE `news_letter_id` = '.$id);
if($result == NULL)
return NULL;	


$letter = $result[0];	
	
return $letter;	
		
}	
	
	

function prog_newsletters_get_by_email($email)
{
global $prog_handle;
	
$nl_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);	
	
$result = prog_newsletters_get("WHERE `email` = '$nl_email' ");
if($result == NULL)
return NULL	;

$letter = $result[0];

return $letter;
	
}	




function prog_newsletters_add($email)
{
	global $prog_handle;
	
if(empty($email))
return "empty email";

		
$nl_email  = @mysql_real_escape_string(strip_tags($email),$prog_handle);
	
if(!filter_var($nl_email,FILTER_VALIDATE_EMAIL))
return "wrong_email";

    
$query = sprintf("INSERT INTO `news_letter`VALUE( NULL,'%s')",$nl_email);
  /*echo $query;*/
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_newsletters_delete($letter_id)
{
	$id = (int) $letter_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `news_letter` WHERE `news_letter_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_newsletters_update($letter_id,$email = NULL)
{
	global $prog_handle;
	
	$id = (int) $letter_id;
	if($id == 0)
	return "false";
	
		
$letter = prog_newsletters_get_by_id($id);
if(!$letter)
	return "false";


	
if((empty($email)))	
	return "false";

$nl_email = @mysql_real_escape_string(strip_tags($email),$prog_handle);	
if(!filter_var($nl_email,FILTER_VALIDATE_EMAIL))
return "wrong_email";

	
if(!empty($email))	
		$query ="UPDATE `news_letter` SET `email` = '$nl_email' WHERE `news_letter_id` = $id ";
		
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

$result = prog_newsletters_add('pop_pop5303@yahoo.com');

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
*/


?>
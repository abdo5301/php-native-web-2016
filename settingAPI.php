<?php
//Setting APIs

function prog_setting_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `setting` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$settings = array();

for($i = 0; $i<$rcount; $i++)

	$settings[@count($settings)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $settings;	
  		
}


	
function prog_setting_get_by_id($setting_id)
{
	$id = (int) $setting_id;
	if($id == 0)
	return NULL;
	
$result = prog_setting_get('WHERE `setting_id` = '.$id);
if($result == NULL)
return NULL;	


$setting = $result[0];	
	
return $setting;	
		
}	
	
	

function prog_setting_get_by_key($key)
{
global $prog_handle;
	
$st_key = @mysql_real_escape_string(strip_tags($key),$prog_handle);	
	
$result = prog_setting_get("WHERE `key` = '$st_key' ");
if($result == NULL)
return NULL	;

$setting = $result[0];

return $setting;
	
}	




function prog_setting_add($key,$desc)
{
	global $prog_handle;
	
if(empty($key))
return "empty key";

if(empty($desc))
return "empty desc";

		
$st_key  = @mysql_real_escape_string(strip_tags($key),$prog_handle);
	
$st_desc    = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
    
$query = sprintf("INSERT INTO `setting`VALUE( NULL,'%s','%s')",$st_key,$st_desc);
  /*echo $query;*/
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_setting_delete($setting_id)
{
	$id = (int) $setting_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `setting` WHERE `setting_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_setting_update($setting_id,$key = NULL,$desc = NULL)
{
	global $prog_handle;
	
	$id = (int) $setting_id;
	if($id == 0)
	return "false";
	
		
$setting = prog_setting_get_by_id($id);
if(!$setting)
	return "false";


	
if((empty($key))&&(empty($desc)))	
	return "false";

	
	
$fields	= array();
$query ='UPDATE `setting` SET ';

if(!empty($key))
	{
		$st_key = @mysql_real_escape_string(strip_tags($key),$prog_handle);
		
		$fields [@count($fields)] = "`key` = '$st_key' ";	
	}	
	
if(!empty($desc))
	{
		
		$st_desc = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
		
		$fields [@count($fields)] = "`desc` = '$st_desc' ";
		
	}	
	
		
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `setting_id` =  '.$id;
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

$query .= ' WHERE `setting_id` =  '.$id;
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

$result = prog_setting_add('microphone','alot of handfree microphones which you can get from here');

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
*/


?>
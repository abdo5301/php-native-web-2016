<?php
//Services APIs

function prog_servs_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `services` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$servs = array();

for($i = 0; $i<$rcount; $i++)

	$servs[@count($servs)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $servs;	
  		
}


	
function prog_servs_get_by_id($serv_id)
{
	$id = (int) $serv_id;
	if($id == 0)
	return NULL;
	
$result = prog_servs_get('WHERE `serv_id` = '.$id);
if($result == NULL)
return NULL;	


$servs = $result[0];	
	
return $servs;	
		
}	
	
	

function prog_servs_get_by_title($title)
{
global $prog_handle;
	
$sr_title = @mysql_real_escape_string(strip_tags($title),$prog_handle);	
	
$result = prog_servs_get("WHERE `title` = '$sr_title' ");
if($result == NULL)
return NULL	;

$serv = $result[0];

return $serv;
	
}	




function prog_servs_get_by_active()
{
	global $prog_handle;


$sr_active = 1;

$result = prog_servs_get("WHERE `active_serv` = '$sr_active' ");
if($result == NULL)
return NULL	;

return $result;
			
}	



function prog_servs_get_by_home()
{
	global $prog_handle;


$sr_home = 1;

$result = prog_servs_get("WHERE `in_home` = '$sr_home' ");
if($result == NULL)
return NULL	;

return $result;
			
}	



function prog_servs_add($title,$desc,$image,$active,$home)
{
	global $prog_handle;
	
if(empty($title))
return "empty title";

if(empty($desc))
return "empty desc";

/*if(empty($content))
return"empty content";*/

/*if(empty($date))
return"empty date";*/

/*if(empty($image))	
return"empty image" ;*/
	

		
$sr_title   = @mysql_real_escape_string(strip_tags($title),$prog_handle);
	
$sr_desc    = @mysql_real_escape_string(strip_tags($desc),$prog_handle);

$image_file = @mysql_real_escape_string(strip_tags($image),$prog_handle);

$sr_active = (int)$active;
 if (($sr_active != 0) && ($sr_active != 1))
 $sr_active = 0 ;

    
$sr_home = (int)$home;
 if (($sr_home != 0) && ($sr_home != 1))
 $sr_home = 0 ;

$query = sprintf("INSERT INTO `services`VALUE( NULL,'%s','%s','%s',%d,%d)",$sr_title,$sr_desc,$image_file,$sr_active,$sr_home);
  /*echo $query;*/
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_servs_delete($serv_id)
{
	$id = (int) $serv_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `services` WHERE `serv_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_servs_update($serv_id,$title = NULL,$desc = NULL,$image = NULL,$active = -1,$home = -1)
{
	global $prog_handle;
	
	$id = (int) $serv_id;
	if($id == 0)
	return "false";
	
		
$serv = prog_servs_get_by_id($id);
if(!$serv)
	return "false";


	
if((empty($title))&&(empty($desc))&&(empty($image)))	
	return "false";

	
	
$fields	= array();
$query ='UPDATE `services` SET ';

if(!empty($title))
	{
		$sr_title = @mysql_real_escape_string(strip_tags($title),$prog_handle);
		
		$fields [@count($fields)] = "`title` = '$sr_title' ";	
	}	
	
if(!empty($desc))
	{
		
		$sr_desc = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
		
		$fields [@count($fields)] = "`desc` = '$sr_desc' ";
		
	}	
	
	
if(!empty($content))
	{
		$sr_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);
		 	
		$fields [@count($fields)] = "`content` = '$sr_content' ";
	}		
	
		
if(!empty($image))
	{
		
		$image_file = @mysql_real_escape_string(strip_tags($image),$prog_handle);
		
		$fields [@count($fields)] = "`image` = '$image_file' ";
			
	}

$sr_active = (int)$active;	
if($sr_active == -1) 
    $sr_active = $serv->active_serv; 	
    		
	$fields [@count($fields)] = "`active_serv` = '$sr_active' ";


$sr_home = (int)$home;	
if($sr_home == -1) 
    $sr_home = $serv->in_home; 	
    		
	$fields [@count($fields)] = "`in_home` = '$sr_home' ";
	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `serv_id` =  '.$id;
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

$query .= ' WHERE `serv_id` =  '.$id;
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

$result = prog_servs_add('microphone','alot of handfree microphones which you can get from here',NULL,1,1);

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
*/


?>
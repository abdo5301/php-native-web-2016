<?php
//Products APIs

function prog_pros_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `products` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$pros = array();

for($i = 0; $i<$rcount; $i++)

	$pros[@count($pros)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $pros;	
  		
}


	
function prog_pros_get_by_id($pro_id)
{
	$id = (int) $pro_id;
	if($id == 0)
	return NULL;
	
$result = prog_pros_get('WHERE `prod_id` = '.$id);
if($result == NULL)
return NULL;	


$pros = $result[0];	
	
return $pros;	
		
}	
	
	

function prog_pros_get_by_name($pro_name)
{
global $prog_handle;
	
$pr_name = @mysql_real_escape_string(strip_tags($pro_name),$prog_handle);	
	
$result = prog_pros_get("WHERE `prod_name` = '$pr_name' ");
if($result == NULL)
return NULL	;

$pro = $result[0];

return $pro;
	
}	



function prog_pros_get_by_active()
{
	global $prog_handle;


$pr_active = 1;

$result = prog_pros_get("WHERE `active_prod` = '$pr_active' ");
if($result == NULL)
return NULL	;

return $result;
			
}	




function prog_pros_add($pro_name,$desc,$content,$image,$active,$home)
{
	global $prog_handle;
	
if(empty($pro_name))
return "empty name";

if(empty($desc))
return "empty desc";

if(empty($content))
return"empty content";

/*if(empty($date))
return"empty date";*/

/*if(empty($image))	
return"empty image" ;*/
	

		
$pr_name   = @mysql_real_escape_string(strip_tags($pro_name),$prog_handle);
	
$pr_desc    = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
	
$pr_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);

$image_file = @mysql_real_escape_string(strip_tags($image),$prog_handle);

$pr_active = (int)$active;
 if (($pr_active != 0) && ($pr_active != 1))
 $pr_active = 0 ;

    
$pr_home = (int)$home;
 if (($pr_home != 0) && ($pr_home != 1))
 $pr_home = 0 ;

$query = sprintf("INSERT INTO `products`VALUE( NULL,'%s','%s','%s','%s',%d,%d)",$pr_name,$pr_desc,$pr_content,$image_file,$pr_active,$pr_home);
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_pros_delete($pro_id)
{
	$id = (int) $pro_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `products` WHERE `prod_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_pros_update($pro_id,$pro_name = NULL,$desc = NULL,$content = NULL,$image = NULL,$active = -1,$home = -1)
{
	global $prog_handle;
	
	$id = (int) $pro_id;
	if($id == 0)
	return "false";
	
		
$pro = prog_pros_get_by_id($id);
if(!$pro)
	return "false";


	
if((empty($pro_name))&&(empty($desc))&&(empty($content))&&(empty($image)))	
	return "false";

	
	
$fields	= array();
$query ='UPDATE `products` SET ';

if(!empty($pro_name))
	{
		$pr_name = @mysql_real_escape_string(strip_tags($pro_name),$prog_handle);
		
		$fields [@count($fields)] = "`prod_name` = '$pr_name' ";	
	}	
	
if(!empty($desc))
	{
		
		$pr_desc = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
		
		$fields [@count($fields)] = "`desc` = '$pr_desc' ";
		
	}	
	
	
if(!empty($content))
	{
		$pr_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);
		 	
		$fields [@count($fields)] = "`content` = '$pr_content' ";
	}		
	
		
if(!empty($image))
	{
		
		$image_file = @mysql_real_escape_string(strip_tags($image),$prog_handle);
		
		$fields [@count($fields)] = "`image` = '$image_file' ";
			
	}

$pr_active = (int)$active;	
if($pr_active == -1) 
    $pr_active = $pro->active_prod; 	
    		
	$fields [@count($fields)] = "`active_prod` = '$pr_active' ";


$pr_home = (int)$home;	
if($pr_home == -1) 
    $pr_home = $pro->in_home; 	
    		
	$fields [@count($fields)] = "`in_home` = '$pr_home' ";
	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `prod_id` =  '.$id;
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

$query .= ' WHERE `prod_id` =  '.$id;
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

$result = prog_pros_add('microphone','handfree microphones','alot of handfree microphones which you can get from here',NULL,1,1);

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
*/


?>
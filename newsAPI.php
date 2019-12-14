<?php
//News APIs infornt end

function prog_news_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `news` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$news = array();

for($i = 0; $i<$rcount; $i++)

	$news[@count($news)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $news;	
  		
}


	
function prog_news_get_by_id($new_id)
{
	$id = (int) $new_id;
	if($id == 0)
	return NULL;
	
$result = prog_news_get('WHERE `news_id` = '.$id);
if($result == NULL)
return NULL;	


$news = $result[0];	
	
return $news;	
		
}	
	
	

function prog_news_get_by_title($title)
{
global $prog_handle;
	
$ne_title = @mysql_real_escape_string(strip_tags($title),$prog_handle);	
	
$result = prog_news_get("WHERE `title` = '$ne_title' ");
if($result == NULL)
return NULL	;

$news = $result[0];

return $news;
	
}	




function prog_news_get_by_active()
{
	global $prog_handle;


$ne_active = 1;

$result = prog_news_get("WHERE `active_news` = '$ne_active' ");
if($result == NULL)
return NULL	;

return $result;
			
}	
	
	

function prog_news_add($title,$desc,$content,$date,$image,$active)
{
	global $prog_handle;
	
if(empty($title))
return "empty title";

if(empty($desc))
return "empty desc";

if(empty($content))
return"empty content";

/*if(empty($date))
return"empty date";*/

/*if(empty($image))	
return"empty image" ;*/
	

		
$ne_title   = @mysql_real_escape_string(strip_tags($title),$prog_handle);
	
$ne_desc    = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
	
$ne_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);

$ne_date    = @mysql_real_escape_string(strip_tags($date),$prog_handle);

$image_file = @mysql_real_escape_string(strip_tags($image),$prog_handle);

    
$ne_active = (int)$active;
 if (($ne_active != 0) && ($ne_active != 1))
 $ne_active = 0 ;

$query = sprintf("INSERT INTO `news`VALUE( NULL,'%s','%s','%s','%s','%s',%d)",$ne_title,$ne_desc,$ne_content,$ne_date,$image_file,$ne_active);
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_news_delete($new_id)
{
	$id = (int) $new_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `news` WHERE `news_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_news_update($new_id,$title = NULL,$desc = NULL,$content = NULL,$date = NULL,$image = NULL,$active = -1)
{
	global $prog_handle;
	
	$id = (int) $new_id;
	if($id == 0)
	return "false";
	
		
$news = prog_news_get_by_id($id);
if(!$news)
	return "false";


	
if((empty($title))&&(empty($desc))&&(empty($content))&&(empty($date))&&(empty($image)))	
	return "false";

	
	
$fields	= array();
$query ='UPDATE `news` SET ';

if(!empty($title))
	{
		$ne_title = @mysql_real_escape_string(strip_tags($title),$prog_handle);
		
		$fields [@count($fields)] = "`title` = '$ne_title' ";	
	}	
	
if(!empty($desc))
	{
		
		$ne_desc = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
		
		$fields [@count($fields)] = "`desc` = '$ne_desc' ";
		
	}	
	
	
if(!empty($content))
	{
		$ne_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);
		 	
		$fields [@count($fields)] = "`content` = '$ne_content' ";
	}		
	
	
if(!empty($date))
	{
		$ne_date = @mysql_real_escape_string(strip_tags($date),$prog_handle);
		
		$fields [@count($fields)] = "`date` = '$ne_date' ";		
	}	
	
if(!empty($image))
	{
		
		$ne_image = @mysql_real_escape_string(strip_tags($image),$prog_handle);
		
		$fields [@count($fields)] = "`image` = '$ne_image' ";
			
	}

$ne_active = (int)$active;	
if($ne_active == -1) 
    $ne_active = $news->active_news; 	
    		
	$fields [@count($fields)] = "`active_news` = '$ne_active' ";
	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `news_id` =  '.$id;
	
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

$query .= ' WHERE `news_id` =  '.$id;
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

$result = prog_news_add('wether Report','the wether of some citeis in egy','cairo :25...aswan: 40...',NULL,NULL,1);

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
*/


?>
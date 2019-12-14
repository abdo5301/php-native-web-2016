
<?php
//Testimonials APIs

function prog_testi_get($extra = '')
{
global $prog_handle;

$query = sprintf("SELECT * FROM `testimonials` %s",$extra);

$qresult = @mysql_query($query);

if(!$qresult)
return NULL;


$rcount = @mysql_num_rows($qresult);
if($rcount == 0)
return NULL;


$testis = array();

for($i = 0; $i<$rcount; $i++)

	$testis[@count($testis)] = @mysql_fetch_object($qresult) ;

	
@mysql_free_result($qresult);

return $testis;	
  		
}



function prog_testi_get_all_by_name($name)
{
global $prog_handle;
	
$te_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);	
	
$result = prog_testi_get("WHERE `name` = '$te_name' ");
if($result == NULL)
return NULL	;

return $result;
	
}	



	
function prog_testi_get_by_id($testi_id)
{
	$id = (int) $testi_id;
	if($id == 0)
	return NULL;
	
$result = prog_testi_get('WHERE `testimo_id` = '.$id);
if($result == NULL)
return NULL;	


$testi = $result[0];	
	
return $testi;	
		
}	
	
	

function prog_testi_get_by_name($name)
{
global $prog_handle;
	
$te_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);	
	
$result = prog_testi_get("WHERE `name` = '$te_name' ");
if($result == NULL)
return NULL	;

$testi = $result[0];

return $testi;
	
}	


function prog_testi_get_by_active()
{
	global $prog_handle;


$te_active = 1;

$result = prog_testi_get("WHERE `active_testimo` = '$te_active' ");
if($result == NULL)
return NULL	;

return $result;
			
}	



function prog_testi_add($name,$job,$desc,$content,$active,$home)
{
	global $prog_handle;
	
if(empty($name))
return "empty name";

if(empty($job))
return "empty job";

if(empty($desc) && (empty($content)))
return "empty desc";

			
$te_name   = @mysql_real_escape_string(strip_tags($name),$prog_handle);

$te_job   = @mysql_real_escape_string(strip_tags($job),$prog_handle);
	
$te_desc    = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
	
$te_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);

$te_active = (int)$active;
 if (($te_active != 0) && ($te_active != 1))
 $te_active = 0 ;

    
$te_home = (int)$home;
 if (($te_home != 0) && ($te_home != 1))
 $te_home = 0 ;

$query = sprintf("INSERT INTO `testimonials`VALUE( NULL,'%s','%s','%s','%s',%d,%d)",$te_name,$te_job,$te_desc,$te_content,$te_active,$te_home);
	$qresult = @mysql_query($query);
	
	if(!$qresult)
	return "false";
		
return "true";
	
			
}




function prog_testi_delete($testi_id)
{
	$id = (int) $testi_id;
	if($id == 0)
	return false;
	
$query = sprintf("DELETE FROM `testmonials` WHERE `testimo_id`= %d",$id);
$qresult = @mysql_query($query);
if(!$qresult)
return false;
	
return true;	
	
}




function prog_testi_update($testi_id,$name = NULL,$job = NULL,$desc = NULL,$content = NULL,$active = -1,$home = -1)
{
	global $prog_handle;
	
	$id = (int) $testi_id;
	if($id == 0)
	return "false";
	
		
$testi = prog_testi_get_by_id($id);
if(!$testi)
	return "false";


	
if((empty($name))&&(empty($job))&&(empty($desc))&&(empty($content)))	
	return "false";

	
	
$fields	= array();
$query ='UPDATE `testimonials` SET ';

if(!empty($name))
	{
		$te_name = @mysql_real_escape_string(strip_tags($name),$prog_handle);
		
		$fields [@count($fields)] = "`name` = '$te_name' ";	
	}	

if(!empty($name))
	{
		$te_job = @mysql_real_escape_string(strip_tags($job),$prog_handle);
		
		$fields [@count($fields)] = "`job` = '$te_job' ";	
	}	
	
if(!empty($desc))
	{
		
		$te_desc = @mysql_real_escape_string(strip_tags($desc),$prog_handle);
		
		$fields [@count($fields)] = "`desc` = '$te_desc' ";
		
	}	
		
if(!empty($content))
	{
		$te_content = @mysql_real_escape_string(strip_tags($content),$prog_handle);
		 	
		$fields [@count($fields)] = "`content` = '$te_content' ";
	}		
	
$te_active = (int)$active;	
if($te_active == -1) 
    $te_active = $testi->active_testimo; 	
    		
	$fields [@count($fields)] = "`active_testimo` = '$te_active' ";


$te_home = (int)$home;	
if($te_home == -1) 
    $te_home = $testi->in_home; 	
    		
	$fields [@count($fields)] = "`in_home` = '$te_home' ";
	
$fcount = @count($fields);

if($fcount == 1)
{
	$query .= $fields[0].' WHERE `testimo_id` =  '.$id;
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

$query .= ' WHERE `testimo_id` =  '.$id;
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

$result = prog_testi_add('pop','techer','handfree microphones','alot of handfree microphones which you can get from here',1,1);

prog_db_close();

if($result == "true")
{
	
	echo'Done';
}else 

 echo "failer";
	
*/

?>
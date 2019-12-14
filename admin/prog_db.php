


<?php

$prog_host      = 'localhost';
$prog_dbname    = 'progress';
$prog_username  = 'root';
$prog_password  = '';


$prog_handle = @mysql_connect($prog_host,$prog_username,$prog_password);

if(!$prog_handle)
die('conection problem..');


$prog_db_result = @mysql_select_db($prog_dbname);
if(!$prog_db_result)
{
 @mysql_close($prog_handle);
  
 die('selection problem...'); 	
}

/*die('ok');*/
		
@mysql_query("SET NAMES'utf8'");



function prog_db_close()
{	
	global $prog_handle;
	@mysql_close($prog_handle);		
}

?>





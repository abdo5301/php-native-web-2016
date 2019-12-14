
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


function limit_text($text,$limit = 5) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text,2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;

}	



function mpages($table,$objects_at_page = 4,$object,$page_name)
{
	
if(!isset($_GET['page']))   
   $page = 1;

else	
	$page = (int)$_GET['page'];
	
$q = @mysql_query('SELECT * FROM '.$table.'');
$objects_count = @mysql_num_rows($q);
@mysql_free_result($q);


$pages_count = (int)ceil($objects_count / $objects_at_page);

if(($page > $pages_count) || ($page <= 0))
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..Problem!</h2>
        <p class="info">Page not found...Thank you.</p>
        
    </div>
</div>');	
	
}

$start = ($page - 1) * $objects_at_page;
$end = $objects_at_page;

if($objects_count != 0 )
{
	$q = @mysql_query('SELECT * FROM '.$table.' LIMIT $start,$end');
	while($obj = @mysql_fetch_object($q))
	{
		echo $object;
		
	}	
	
}

echo "<br /> <ul class='nav'>";



for($i = 1; $i <= $pages_count; $i++)
{
	if($page == $i)
	    echo '<li class="selected"><a href="'.$page_name.'?page=' . $i . '">' . $i . '</a></li>';
	
	else 
		 /* <a href ="'.$page_name.'?page=' . $i . '"> ' . $i . '</a> */
	
	echo '<li><a href="'.$page_name.'?page=' . $i . '">' . $i . '</a></li>';
	
}

echo "</ul>";	
}


function get_set($key)
{
global $prog_handle;
	
$st_key = @mysql_real_escape_string(strip_tags($key),$prog_handle);	
	
$result = prog_setting_get("WHERE `key` = '$st_key' ");
if($result == NULL)
return NULL	;

$setting = $result[0];

return $setting->desc;
	
}	

?>





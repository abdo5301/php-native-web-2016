<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("settings.php")</script>';

}else{
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("settings.php")</script>';
		
}else{
	
require_once 'prog_db.php';
require_once 'settingAPI.php';

$setting = prog_setting_get_by_id($_id);

if($setting == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Setting from Settings menu...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="settings.php">Back to Settings page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deletesetting.php?p='.$setting->setting_id.'& c=1">...Delete Setting of '.$setting->key.' </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-briefcase"></i></p>
        <p>No..Back to<a href="settings.php"> Settings page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_setting_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">setting has been deleted...Thank you.</p>
        <p><i class="icon-briefcase"></i></p>
        <p><a href="settings.php">Back to Settings page</a></p>
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-briefcase"></i></p>
        <p><a href="settings.php">Back to Settings page</a></p>
    </div>
    </div>');
	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
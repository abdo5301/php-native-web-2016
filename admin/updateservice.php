<?php include_once 'header.php';

if(!isset($_GET['p']))
{
	echo'<script> location.replace("services.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("services.php")</script>';

}else{


if(!isset($_POST['title']) || (!isset($_POST['desc'])) || (!isset($_POST['active'])) || (!isset($_POST['home'])))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Go to Services page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'servicesAPI.php';

$image_dir      = dirname(__FILE__). "/images/";
$image_name     = $_FILES['image']["name"]; 
$image_name_dir = $image_dir. $_FILES['image']["name"];


$serv = prog_servs_get_by_title($_POST['title']);
if (($serv != NULL) && ($serv->serv_id != $_id))
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Service title Exist!</h1>
        <p class="info">Please enter another Title...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
    </div>
</div>');		
}else{

	
$result = prog_servs_update($_id,trim($_POST['title']),trim($_POST['desc']),trim($image_name),($_POST['active']),($_POST['home']));
prog_db_close();

if($result == "true")
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Service informations has successfully...Thank you.</p>
        <p><i class='icon-dashboard'></i></p>
        <p>Back to Services page from<a href='services.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{

	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
    </div>
    </div>');

}}}}}

include_once 'footer.php'; 

?>
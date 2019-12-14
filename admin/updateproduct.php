<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("products.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("products.php")</script>';

}else{


if(!isset($_POST['name']) || (!isset($_POST['desc']))|| (!isset($_POST['content'])) || (!isset($_POST['active'])) || (!isset($_POST['home'])))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-legal"></i></p>
        <p><a href="products.php">Go to Products page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'productsAPI.php';

$image_dir      = dirname(__FILE__). "/images/";
$image_name     = $_FILES['image']["name"]; 
$image_name_dir = $image_dir. $_FILES['image']["name"];


$pro = prog_pros_get_by_name($_POST['name']);
if (($pro != NULL) && ($pro->prod_id != $_id))
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Product name Exist!</h1>
        <p class="info">Please enter another Product name...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="products.php">Back to products page</a></p>
    </div>
</div>');		
}else{

	
$result = prog_pros_update($_id,trim($_POST['name']),trim($_POST['desc']),trim($_POST['content']),trim($image_name),($_POST['active']),($_POST['home']));
prog_db_close();

if($result == "true")
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Product informations has successfully...Thank you.</p>
        <p><i class='icon-legal'></i></p>
        <p>Back to Products page from<a href='products.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{
	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-legal"></i></p>
        <p><a href="products.php">Back to Products page</a></p>
    </div>
    </div>');

}}}}}

include_once 'footer.php'; 

?>
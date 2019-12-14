<?php
include_once 'header.php';

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
if ($pro != NULL) 
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Product name Exist!</h1>
        <p class="info">Please enter another Product name...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addproduct.php">Back to New Product page</a></p>
    </div>
</div>');
		
}else{

$result = prog_pros_add(trim($_POST['name']),trim($_POST['desc']),trim($_POST['content']),trim($image_name),($_POST['active']),($_POST['home']));

prog_db_close();


if($result == "empty name")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Product name!</h1>
        <p class='info'>Please enter Product's name...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addproduct.php'>Back to New Product page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty desc")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Dscreption!</h1>
        <p class='info'>Please enter product's description...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addproduct.php'>Back to New Product page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty content")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Content!</h1>
        <p class='info'>Please enter Product's content...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addproduct.php'>Back to New Product page</a></p>
    </div>
</div>";
}else{
/*		
if($result == "empty date")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Date!</h1>
        <p class='info'>Please enter Reports's date...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
*/	
if($result == "empty image")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Image!</h1>
        <p class='info'>Please enter Image for your Product...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addproduct.php'>Back to New Product page</a></p>
    </div>
</div>";
}else{

if($result == "Sorry an error")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem in Image!</h1>
        <p class="info">Sorry, there was an error on uploading your Image...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addproduct.php">Back to New Product page</a></p>
    </div>
</div>');
}else{		
		
if($result == "false")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addproduct.php">Back to New Product page</a></p>
    </div>
</div>');
}else{

	
if($result == "true")							 
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Product has successfully...Thank you.</p>
        <p><i class='icon-legal'></i></p>
        <p><a href='products.php'>Back to Products page</a></p>
    </div>
</div>";}                             
	
}}}}}}}}

include_once 'footer.php';
?>
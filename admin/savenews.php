<?php
include_once 'header.php';

if(!isset($_POST['title']) || (!isset($_POST['desc']))|| (!isset($_POST['content'])) || (!isset($_POST['date'])) || (!isset($_POST['active'])))
{
	   echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Go to News page</a></p>
    </div>
</div>');

	
}else{

require_once 'prog_db.php';
require_once 'newsAPI.php';


$image_dir      = dirname(__FILE__). "/images/";
$image_name     = $_FILES['image']["name"]; 
$image_name_dir = $image_dir. $_FILES['image']["name"];


$news = prog_news_get_by_title($_POST['title']);
if ($news != NULL) 
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Title Exist!</h1>
        <p class="info">Please enter another title...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="addnews.php">Back to New Report page</a></p>
    </div>
</div>');
		
}else{

$result = prog_news_add(trim($_POST['title']),trim($_POST['desc']),trim($_POST['content']),trim($_POST['date']),trim($image_name),($_POST['active']));

prog_db_close();


if($result == "empty title")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Title!</h1>
        <p class='info'>Please enter Report's title...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty desc")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Dscreption!</h1>
        <p class='info'>Please enter Report's description...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty content")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Content!</h1>
        <p class='info'>Please enter Report's content...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
		
if($result == "empty date")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Date!</h1>
        <p class='info'>Please enter Report's date...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{
	
if($result == "empty image")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Empty Image!</h1>
        <p class='info'>Please enter Image for your Report...Thank you.</p>
        <p><i class='icon-pencil'></i></p>
        <p><a href='addnews.php'>Back to New Report page</a></p>
    </div>
</div>";
}else{

if($result == "Sorry an error")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem in Image!</h1>
        <p class="info">Sorry, there was an error on uploading your Image...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addnews.php">Back to New Report page</a></p>
    </div>
</div>');
}else{		
		
if($result == "false")
{ echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addnews.php">Back to New Report page</a></p>
    </div>
</div>');
}else{

	
if($result == "true")							 
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	
	 echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Congratulations!</h1>
        <p class='info'>Add a new Report has successfully...Thank you.</p>
        <p><i class='icon-comment'></i></p>
        <p><a href='news.php'>Back to News page</a></p>
    </div>
</div>";}                             
	
}}}}}}}}}

include_once 'footer.php';
?>
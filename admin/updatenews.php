<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("news.php")</script>';
}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("news.php")</script>';

}else{


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
if (($news != NULL) && ($news->news_id != $_id))
{	
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Title Exist!</h1>
        <p class="info">Please enter another Title...Thank you.</p>
        <p><i class="icon-comment"></i></p>
         <p><a href="news.php">Back to News page</a></p>
    </div>
</div>');		
}else{

	
$result = prog_news_update($_id,trim($_POST['title']),trim($_POST['desc']),trim($_POST['content']),trim($_POST['date']),trim($image_name),($_POST['active']));
prog_db_close();

if($result == "true")
{
	move_uploaded_file($_FILES['image']["tmp_name"],$image_name_dir);
	echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating News informations has successfully...Thank you.</p>
        <p><i class='icon-comment'></i></p>
        <p><a href='news.php'>Back to News page from here</a></p>
    </div>
</div>";                                                
	
}else{

/*if($result == "wrong email")
{echo"<div class='row-fluid'>
    <div class='http-error'>
        <h1>Incorrect Email Address!</h1>
        <p class='info'>Please enter Users's Email...Thank you.</p>
        <p><i class='icon-home'></i></p>
        <p><a href='users.php'>Back to Users page</a></p>
    </div>
</div>";

}else{*/
	
if($result == "false")	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
    </div>');

}}}}}

include_once 'footer.php'; 

?>

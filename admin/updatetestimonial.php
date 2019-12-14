<?php include_once 'header.php';

if(!isset($_GET['p']))
{echo'<script> location.replace("testimonials.php")</script>';

}else{
   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("testimonials.php")</script>';

}else{


if(!isset($_POST['name']) || (!isset($_POST['job']))|| (!isset($_POST['desc']))|| (!isset($_POST['content'])) || (!isset($_POST['active'])) || (!isset($_POST['home'])))
{
	echo('<div class="row-fluid">
          <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Go to Testimonials page</a></p>
    </div>
</div>');
	  	
}else{
	
require_once 'prog_db.php';
require_once 'testimonialsAPI.php';
	
$result = prog_testi_update($_id,trim($_POST['name']),trim($_POST['job']),trim($_POST['desc']),trim($_POST['content']),($_POST['active']),($_POST['home']));
prog_db_close();

if($result == "true")
{
	echo"<div class='row-fluid'>
         <div class='http-error'>
        <h1>Updating Done!</h1>
        <p class='info'>Updating Testimonial informations has successfully...Thank you.</p>
        <p><i class='icon-user'></i></p>
        <p>Back to Testimonials page from<a href='testimonials.php'> here.</a></p>
    </div>
</div>";                                                
	
}else{
	
if($result == "false")
	
  echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops....Bad access!</h1>
        <p class="info">Page not found...Please Try again.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
    </div>
    </div>');

}}}}

include_once 'footer.php'; 

?>
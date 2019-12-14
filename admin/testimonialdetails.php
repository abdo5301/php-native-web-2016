<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("testimonials.php")</script>';

}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Please select Testimonial from Testimonials menu...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
    </div>
  </div>');
}

else{
require_once 'prog_db.php';
require_once 'testimonialsAPI.php';

$testi = prog_testi_get_by_id($_id);
prog_db_close();
if($testi == NULL){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Please select Testimonial from T0estimonials menu...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to testimonials page</a></p>
    </div>
  </div>');
}else{


?>
 <div class="header">
         <h1 class="page-title"><?php echo $testi->name; ?> Testimonial </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="testimonials.php">Testimonials</a> <span class="divider">/</span></li>
            <li class="active">Testimonial Details</li>
        </ul>

        <div class="container-fluid">
                      

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<p><strong><li><?php echo $testi->desc; ?></li></strong></p>
		<p><?php echo $testi->content; ?></p>
		<p><strong><li>Name : <?php echo $testi->name; ?></li></strong></span></p>	
		<p><strong><li>Job : <?php echo $testi->job; ?></li></strong></span></p>	
		<p><a href="modifytestimonial.php?p=<?php echo $testi->testimo_id; ?>"><i class='icon-pencil'>.Modifing.</i> <i class='icon-pencil'></i></a></p>
		<p><a href="deletetestimonial.php?p=<?php echo $testi->testimo_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p>
                    
                    </div>
                 </div>
             </div>
            </div>
              
           
















<?php  }}} require_once 'footer.php';  ?>
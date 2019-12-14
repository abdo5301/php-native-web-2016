<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("testimonials.php")</script>';

}else{
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("testimonials.php")</script>';	
}else{
	
require_once 'prog_db.php';
require_once 'testimonialsAPI.php';

$testi = prog_testi_get_by_id($_id);

if($testi == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Testimonial from Testimonials menu...Thank you.</p>
        <p><i class="icon-legal"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deletetestimonial.php?p='.$testi->testimo_id.'& c=1">...Delete <strong>'.$testi->name.' </strong>Testimonial</a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-user"></i></p>
        <p>No..Back to<a href="testimonials.php"> Testimonials page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_tseti_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">Testimonial has been deleted...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
    </div>
    </div>');
      		



	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
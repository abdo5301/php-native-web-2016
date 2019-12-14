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
prog_db_close();

if($testi == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Testimonial from Testimonials menu...Thank you.</p>
        <p><i class="icon-user"></i></p>
        <p><a href="testimonials.php">Back to Testimonials page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of : <?php echo $testi->name; ?> Testimonial</p>
            <div class="block-body">
            	
                <form action="updatetestimonial.php?p=<?php echo $testi->testimo_id; ?>" method="post" enctype="multipart/form-data">
                    <label>Name</label>
                    <input name="name"type="text"  class="span12" value="<?php echo $testi->name; ?>">
                    <label>Job</label>
                    <input name="job"type="text"  class="span12" value="<?php echo $testi->job; ?>">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"><?php echo $testi->desc; ?></textarea> 
                    <label>Read more(content)</label>
                    <textarea name="content" rows="4" cols="50"class="span12"><?php echo $testi->content; ?></textarea>
                    <?php if($testi->active_testimo != 1)
                    echo'<input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0"checked>Inactive<br>';
                          if($testi->active_testimo == 1)
                    echo'<input type="radio" name="active"value="1"checked>Active
                    <input type="radio" name="active"value="0">Inactive<br>';
                                   
                          if($testi->in_home != 1)
                    echo'<input type="radio" name="home"value="1">in home
                    <input type="radio" name="home"value="0"checked>Not<br>';
                          if($testi->in_home == 1)
                    echo'<input type="radio" name="home"value="1"checked>in home
                    <input type="radio" name="home"value="0">Not<br>'?>                                                 
                                                                           
                    <input type="submit" name="updatetestimonial" class="btn btn-primary pull-right" value="Save !">
                    <a href="testimonials.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

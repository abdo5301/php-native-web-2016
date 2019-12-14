<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("newsletters.php")</script>';


}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("newsletters.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'newslettersAPI.php';

$letter = prog_newsletters_get_by_id($_id);
prog_db_close();

if($letter == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Email from Newsletters menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Back to Newsletters page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of Newsletter</p>
            <div class="block-body">
            	
                <form action="updatenewsletter.php?p=<?php echo $letter->news_letter_id; ?>" method="post">
                    <label>Email</label>
                    <input name="email"type="text"  class="span12" value="<?php echo $letter->email; ?>">
                    <input type="submit" name="updatesetting" class="btn btn-primary pull-right" value="Save !">
                    <a href="newsletters.php" class="btn btn-primary pull-left"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("settings.php")</script>';


}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("settings.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'settingAPI.php';

$setting = prog_setting_get_by_id($_id);
prog_db_close();

if($setting == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Setting from Settings menu...Thank you.</p>
        <p><i class="icon-briefcase"></i></p>
        <p><a href="settings.php">Back to Settings page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of Setting</p>
            <div class="block-body">
            	
                <form action="updatesetting.php?p=<?php echo $setting->setting_id; ?>" method="post">
                    <label>Setting key</label>
                    <input name="key"type="text"  class="span12" value="<?php echo $setting->key; ?>">
                    <label>Setting Content</label>
                    <textarea name="content" rows="4" cols="50"class="span12"><?php echo $setting->desc; ?></textarea>                                                                            
                    <input type="submit" name="updatesetting" class="btn btn-primary pull-right" value="Save !">
                    <a href="settings.php" class="btn btn-primary pull-left"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

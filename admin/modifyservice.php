<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("services.php")</script>';

}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("services.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'servicesAPI.php';

$serv = prog_servs_get_by_id($_id);
prog_db_close();

if($serv == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Service from Services menu...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of : <?php echo $serv->title; ?></p>
            <div class="block-body">
            	
                <form action="updateservice.php?p=<?php echo $serv->serv_id; ?>" method="post" enctype="multipart/form-data">
                    <label>Service title</label>
                    <input name="title"type="text"  class="span12" value="<?php echo $serv->title; ?>">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"><?php echo $serv->desc; ?></textarea> 
                    <label>Image</label>
                    <input name="image" type="file"><br>
                    <?php if($serv->active_serv != 1)
                    echo'<input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0"checked>Inactive<br>';
                          if($serv->active_serv == 1)
                    echo'<input type="radio" name="active"value="1"checked>Active
                    <input type="radio" name="active"value="0">Inactive<br>';
                                   
                          if($serv->in_home != 1)
                    echo'<input type="radio" name="home"value="1">in home
                    <input type="radio" name="home"value="0"checked>Not<br>';
                          if($serv->in_home == 1)
                    echo'<input type="radio" name="home"value="1"checked>in home
                    <input type="radio" name="home"value="0">Not<br>'?>                                                 
                                                                           
                    <input type="submit" name="updateservice" class="btn btn-primary pull-right" value="Save !">
                    <a href="services.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

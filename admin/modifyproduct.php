<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("products.php")</script>';

}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("products.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'productsAPI.php';

$pro = prog_pros_get_by_id($_id);
prog_db_close();

if($pro == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Product from Products menu...Thank you.</p>
        <p><i class="icon-legal"></i></p>
        <p><a href="products.php">Back to Products page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of : <?php echo $pro->prod_name; ?></p>
            <div class="block-body">
            	
                <form action="updateproduct.php?p=<?php echo $pro->prod_id; ?>" method="post" enctype="multipart/form-data">
                    <label>Product name</label>
                    <input name="name"type="text"  class="span12" value="<?php echo $pro->prod_name; ?>">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"><?php echo $pro->desc; ?></textarea> 
                    <label>Read more(content)</label>
                    <textarea name="content" rows="4" cols="50"class="span12"><?php echo $pro->content; ?></textarea>
                    <label>Image</label>
                    <input name="image" type="file"><br>
                    <?php if($pro->active_prod != 1)
                    echo'<input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0"checked>Inactive<br>';
                          if($pro->active_prod == 1)
                    echo'<input type="radio" name="active"value="1"checked>Active
                    <input type="radio" name="active"value="0">Inactive<br>';
                                   
                          if($pro->in_home != 1)
                    echo'<input type="radio" name="home"value="1">in home
                    <input type="radio" name="home"value="0"checked>Not<br>';
                          if($pro->in_home == 1)
                    echo'<input type="radio" name="home"value="1"checked>in home
                    <input type="radio" name="home"value="0">Not<br>'?>                                                 
                                                                           
                    <input type="submit" name="updateproduct" class="btn btn-primary pull-right" value="Save !">
                    <a href="products.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

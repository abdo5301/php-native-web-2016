<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("news.php")</script>';

}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("news.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'newsAPI.php';

$news = prog_news_get_by_id($_id);
prog_db_close();

if($news == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select news from news menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
    </div>');
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of : <?php echo $news->title; ?></p>
            <div class="block-body">
            	
                <form action="updatenews.php?p=<?php echo $news->news_id; ?>" method="post" enctype="multipart/form-data">
                    <label>Title</label>
                    <input name="title"type="text"  class="span12" value="<?php echo $news->title; ?>">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"><?php echo $news->desc; ?></textarea> 
                    <label>Read more(content)</label>
                    <textarea name="content" rows="4" cols="50"class="span12"><?php echo $news->content; ?></textarea>
                    <label>Date</label>
                    <input name="date" type="date" class="span12" value="<?php echo $news->date; ?>">
                    <label>Image</label>
                    <input name="image" type="file"><br>
                    <?php if($news->active_news != 1)
                    echo'<input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0"checked>Inactive<br>';
                          if($news->active_news == 1)
                    echo'<input type="radio" name="active"value="1"checked>Active
                    <input type="radio" name="active"value="0">Inactive<br>'?>
                    <input type="submit" name="updatenews" class="btn btn-primary pull-right" value="Save !">
                    <a href="news.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>
    
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

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

if($news == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select news from news menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deletenews.php?p='.$news->news_id.'& c=1">...delete '.$news->title.' </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-comment"></i></p>
        <p>No..Back to<a href="news.php"> News page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_news_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">News has been deleted...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please tray again...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
    </div>');
      		



	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
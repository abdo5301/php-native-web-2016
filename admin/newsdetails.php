<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("news.php")</script>';

}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Please select Report from News menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
  </div>');
}

else{
require_once 'prog_db.php';
require_once 'newsAPI.php';

$news = prog_news_get_by_id($_id);
prog_db_close();
if($news == NULL){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Please select Report from News menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="news.php">Back to News page</a></p>
    </div>
  </div>');
}else{


?>
 <div class="header">
         <h1 class="page-title"><?php echo $news->title; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="news.php">News</a> <span class="divider">/</span></li>
            <li class="active">News Details</li>
        </ul>

        <div class="container-fluid">
                      

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2><?php echo $news->desc; ?></h2>
						
						
							<figure class="left marg_right1" style="width: 1050px;height: 420px;"><img src="images/<?php echo $news->image; ?>" alt=""style="width: 800px;height: 400px;"></figure>
							<p><?php echo $news->content; ?></p>
							<p><span class="date"><strong><li>Uploding date : <?php echo $news->date; ?></li></strong></span></p>	
							<p><a href="modifynews.php?p=<?php echo $news->news_id; ?>"><i class='icon-pencil'>.Modifing.</i> <i class='icon-pencil'></i></a></p>
						    <p><a href="deletenews.php?p=<?php echo $news->news_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p>
                    
                    </div>
                 </div>
             </div>
            </div>
              
           
















<?php  }}} require_once 'footer.php';  ?>
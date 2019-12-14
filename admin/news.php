<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'newsAPI.php';

$news = prog_news_get();
if($news == NULL)
{
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Go to Users page </a></p>
    </div>
</div>');	

}else{
	
$ncount = @count($news);
if($ncount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO News!</h1>
        <p class="info">Please add new Report...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addnews.php">Go to New Report page</a></p>
    </div>
</div>');

	
}else{
?>



   
    
    
        
        <div class="header">
            
            <h1 class="page-title">News</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">News Lest (<?php echo $ncount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchnews.php" method="post">
               <input class="input-xlarge" placeholder="Enter Title only...." id="appendedInputButton" type="text" name="title">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>

                    
<div class="btn-toolbar">
    <a href="addnews.php"><button class="btn btn-primary" ><i class="icon-plus">New Report</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 100px;">Num</th>	 
          <th style="width: 100px;">ID</th>
          <th style="width: 100px;">Title</th>
          <th style="width: 100px;">Descreption</th>
          <th style="width: 150px;">Read more(content)</th>
          <th style="width: 100px;">Date</th>
          <th style="width: 150px;">Reports Image</th>
          <th style="width: 100px;">Active News</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$ncount; $i++)      
{
	$num = $i+1;	
	
 	$new = $news[$i];

if($new->active_news == 1) 
 $new->active_news = 'Active';
else
 $new->active_news = '......';
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$new->news_id</td>
          <td>".limit_text($new->title)."</td>
          <td>".limit_text($new->desc,3)."</td>
          <td><a href='newsdetails.php?p=$new->news_id'><i class='icon-comment'></i> Read more</a></td>
          <td>$new->date</td>
          <td style='width: 100px;'><figure class='left marg_right1' style='width: 100px;height: 50px;'><img src='images/$new->image' alt=''style='width: 100px;height: 50px;'></figure></td>		  
          <td><i class='icon-comment'>$new->active_news</i></td>		  
          <td>
              <a href='modifynews.php?p=$new->news_id'><i class='icon-pencil'></i></a>
              <a href='deletenews.php?p=$new->news_id'><i class='icon-remove'></i></a>
          </td>
        </tr>
      </tbody>";
      
}  

	  
?>      
    </table>
</div>

</div>
</div>





<?php }} ?>
                    
    
<?php 
prog_db_close();
include_once'footer.php'; 
?>
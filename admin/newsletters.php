<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'newslettersAPI.php';

$letters = prog_newsletters_get();
if($letters == NULL)
{
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Go to Users page </a></p>
        <div class="btn-toolbar"><p><a href="addnewsletter.php"><button class="btn btn-primary" ><i class="icon-plus">New Newsletter</i></button></a></p></div>
    </div>
</div>');	

}else{
	
$lcount = @count($letters);
if($lcount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Letters found!</h1>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Go to Users page </a></p>
    </div>
</div>');

	
}else{
	
?>

        
        <div class="header">
            
            <h1 class="page-title">Newsletters</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Newsletters Lest (<?php echo $lcount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">
      
      <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchnewsletter.php" method="post">
               <input class="input-xlarge" placeholder="Enter Email only...." id="appendedInputButton" type="text" name="email">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>

                    
<div class="btn-toolbar">
    <a href="addnewsletter.php"><button class="btn btn-primary" ><i class="icon-plus">New Newsletter</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">Num</th>
          <th style="width: 80px;">ID</th>
          <th style="width: 100px;">Email</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$lcount; $i++)      
{
    $num = $i+1;

 	$letter = $letters[$i];
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$letter->news_letter_id</td>
          <td><abbr title=".limit_text($letter->email,5).">$letter->email<abbr></td>
          <td>
              <a href='modifynewsletter.php?p=$letter->news_letter_id'><i class='icon-pencil'></i></a>
              <a href='deletenewsletter.php?p=$letter->news_letter_id'><i class='icon-remove'></i></a>
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
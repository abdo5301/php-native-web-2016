<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'servicesAPI.php';

$servs = prog_servs_get();
if($servs == NULL)
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
	
$scount = @count($servs);
if($scount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Services found!</h1>
        <p class="info">Please add new service...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addservice.php">Go to New Service page</a></p>
    </div>
</div>');

	
}else{
?>



   
    
    
        
        <div class="header">
            
            <h1 class="page-title">Services</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Services Lest (<?php echo $scount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">
      
      <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchservice.php" method="post">
               <input class="input-xlarge" placeholder="Enter Service title only...." id="appendedInputButton" type="text" name="title">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>

                    
<div class="btn-toolbar">
    <a href="addservice.php"><button class="btn btn-primary" ><i class="icon-plus">New Service</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 100px;">Num</th>
          <th style="width: 100px;">ID</th>
          <th style="width: 100px;">Service title</th>
          <th style="width: 100px;">Descreption</th>
          <th style="width: 150px;">Service image</th>
          <th style="width: 100px;">Active Service</th>
          <th style="width: 100px;">In home page</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$scount; $i++)      
{
    $num = $i+1;

 	$serv = $servs[$i];

if($serv->active_serv == 1) 
 $serv->active_serv = 'Active';
else
 $serv->active_serv = '........';

if($serv->in_home == 1) 
 $serv->in_home = 'in home';
else
 $serv->in_home = '........';

	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$serv->serv_id</td>
          <td>".limit_text($serv->title)."</td>
          <td><abbr title='$serv->desc'><a href='servdetails.php?p=$serv->serv_id'><i class='icon-comment'></i> Read more</a><abbr></td>
          <td style='width: 100px;'><figure class='left marg_right1' style='width: 100px;height: 50px;'><img src='images/$serv->image' alt=''style='width: 100px;height: 50px;'></figure></td>		  
          <td><i class='icon-dashboard'>$serv->active_serv</i></td>
          <td><i class='icon-home'>$serv->in_home</i></td>		  
          <td>
              <a href='modifyservice.php?p=$serv->serv_id'><i class='icon-pencil'></i></a>
              <a href='deleteservice.php?p=$serv->serv_id'><i class='icon-remove'></i></a>
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
<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'settingAPI.php';

$settings = prog_setting_get();
if($settings == NULL)
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
	
$scount = @count($settings);
if($scount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Settings found!</h1>
        <p class="info">Please add new setting...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addsetting.php">Go to New Setting page</a></p>
    </div>
</div>');

	
}else{
?>



   
    
    
        
        <div class="header">
            
            <h1 class="page-title">Settings</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Settings Lest (<?php echo $scount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">
      
      <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchsetting.php" method="post">
               <input class="input-xlarge" placeholder="Enter Setting key only...." id="appendedInputButton" type="text" name="key">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>

                    
<div class="btn-toolbar">
    <a href="addsetting.php"><button class="btn btn-primary" ><i class="icon-plus">New Setting</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">Num</th>
          <th style="width: 80px;">ID</th>
          <th style="width: 100px;">Setting key</th>
          <th style="width: 100px;">Descreption(content)</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$scount; $i++)      
{
    $num = $i+1;

 	$setting = $settings[$i];
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$setting->setting_id</td>
          <td>".limit_text($setting->key)."</td>
          <td><abbr title='$setting->desc'><a href='settingdetails.php?p=$setting->setting_id'><i class='icon-comment'></i> Show</a><abbr></td>
          <td>
              <a href='modifysetting.php?p=$setting->setting_id'><i class='icon-pencil'></i></a>
              <a href='deletesetting.php?p=$setting->setting_id'><i class='icon-remove'></i></a>
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
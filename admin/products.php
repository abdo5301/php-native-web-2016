<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'productsAPI.php';

$pros = prog_pros_get();
if($pros == NULL)
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
	
$pcount = @count($pros);
if($pcount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Products!</h1>
        <p class="info">Please add new Product...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addproduct.php">Go to New Product page</a></p>
    </div>
</div>');

	
}else{
?>



   
    
    
        
        <div class="header">
            
            <h1 class="page-title">Products</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Products Lest (<?php echo $pcount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">
      
      <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchproduct.php" method="post">
               <input class="input-xlarge" placeholder="Enter Product name only...." id="appendedInputButton" type="text" name="name">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>


                    
<div class="btn-toolbar">
    <a href="addproduct.php"><button class="btn btn-primary" ><i class="icon-plus">New Product</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 100px;">Num</th>	
          <th style="width: 100px;">ID</th>
          <th style="width: 100px;">Product name</th>
          <th style="width: 100px;">Descreption</th>
          <th style="width: 150px;">Read more(content)</th>
          <th style="width: 150px;">Product image</th>
          <th style="width: 100px;">Active Products</th>
          <th style="width: 100px;">In home page</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$pcount; $i++)      
{
	$num = $i+1;	
	
 	$pro = $pros[$i];

if($pro->active_prod == 1) 
 $pro->active_prod = 'Active';
else
 $pro->active_prod = '........';

if($pro->in_home == 1) 
 $pro->in_home = 'in home';
else
 $pro->in_home = '........';

 
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$pro->prod_id</td>
          <td>$pro->prod_name</td>
          <td>".limit_text($pro->desc,3)."</td>
          <td><a href='prodetails.php?p=$pro->prod_id'><i class='icon-comment'></i> Read more</a></td>
          <td style='width: 100px;'><figure class='left marg_right1' style='width: 100px;height: 50px;'><img src='images/$pro->image' alt=''style='width: 100px;height: 50px;'></figure></td>		  
          <td><i class='icon-legal'>$pro->active_prod</i></td>
          <td><i class='icon-home'>$pro->in_home</i></td>		  
          <td>
              <a href='modifyproduct.php?p=$pro->prod_id'><i class='icon-pencil'></i></a>
              <a href='deleteproduct.php?p=$pro->prod_id'><i class='icon-remove'></i></a>
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
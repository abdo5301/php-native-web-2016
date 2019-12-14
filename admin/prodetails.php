<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("products.php")</script>';
}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Wrong ID!</h1>
        <p class="info">Please select Product from Products menu...Thank you.</p>
        <p><i class="icon-legal"></i></p>
        <p>GO to Products page<a href="products.php"> here.</a></p>
    </div>
  </div>');
}

else{
require_once 'prog_db.php';
require_once 'productsAPI.php';

$pro = prog_pros_get_by_id($_id);
prog_db_close();
if($pro == NULL){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Product not found!</h1>
        <p class="info">Please select Product from Products menu...Thank you.</p>
        <p><i class="icon-legal"></i></p>
        <p>GO to Products page<a href="products.php"> here.</a></p>
    </div>
  </div>');
}else{


?>
 <div class="header">
         <h1 class="page-title"><?php echo $pro->prod_name; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="products.php">Products</a> <span class="divider">/</span></li>
            <li class="active">Producut Details</li>
        </ul>

        <div class="container-fluid">
                      

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2><?php echo $pro->desc; ?></h2>
						
						
							<figure class="left marg_right1" style="width: 1050px;height: 420px;"><img src="images/<?php echo $pro->image; ?>" alt=""style="width: 800px;height: 400px;"></figure>
							<p><?php echo $pro->content; ?></p>	
							<p><a href="modifyproduct.php?p=<?php echo $pro->prod_id; ?>"><i class='icon-pencil'>Modifing</i> <i class='icon-pencil'></i></a></p>
						    <p><a href="deleteproduct.php?p=<?php echo $pro->prod_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p>
                    
                    </div>
                 </div>
             </div>
            </div>
              
           
















<?php   }}} require_once 'footer.php';  ?>
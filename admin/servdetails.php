<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("services.php")</script>';

}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..!</h1>
        <p class="info">Page not found.</p>
        <p><i class="icon-dashboard"></i></p>
        <p>GO to Services page<a href="services.php"> here.</a></p>
    </div>
  </div>');
}

else{
require_once 'prog_db.php';
require_once 'servicesAPI.php';

$serv = prog_servs_get_by_id($_id);
prog_db_close();
if($serv == NULL){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Service not found!</h1>
        <p class="info">Please select Service from Services menu...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p>GO to Services page<a href="services.php"> here.</a></p>
    </div>
  </div>');
}else{


?>
 <div class="header">
         <h1 class="page-title"><?php echo $serv->title; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="services.php">Services</a> <span class="divider">/</span></li>
            <li class="active">Service Details</li>
        </ul>

        <div class="container-fluid">
                      

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2><?php echo $serv->title; ?></h2>
						
						
							<figure class="left marg_right1" style="width: 1050px;height: 420px;"><img src="images/<?php echo $serv->image; ?>" alt=""style="width: 800px;height: 400px;"></figure>
							<p><big><?php echo $serv->desc; ?></big></p>	
							<p><a href="modifyservice.php?p=<?php echo $serv->serv_id; ?>"><i class='icon-pencil'>Modifing</i> <i class='icon-pencil'></i></a></p>
						    <p><a href="deleteservice.php?p=<?php echo $serv->serv_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p>
                    
                    </div>
                 </div>
             </div>
            </div>
              
           
















<?php   }}} require_once 'footer.php';  ?>
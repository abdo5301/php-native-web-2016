<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("services.php")</script>';

}else{
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("services.php")</script>';
		
}else{
	
require_once 'prog_db.php';
require_once 'servicesAPI.php';

$serv = prog_servs_get_by_id($_id);

if($serv == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Service from Services menu...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deleteservice.php?p='.$serv->serv_id.'& c=1">...Delete '.$serv->title.' </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-dashboard"></i></p>
        <p>No..Back to<a href="services.php"> Services page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_servs_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">Service has been deleted...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-dashboard"></i></p>
        <p><a href="services.php">Back to Services page</a></p>
    </div>
    </div>');
      		



	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
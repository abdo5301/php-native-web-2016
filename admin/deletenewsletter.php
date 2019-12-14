<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("newsletters.php")</script>';

}else{
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("newsletters.php")</script>';
		
}else{
	
require_once 'prog_db.php';
require_once 'newslettersAPI.php';

$letter = prog_newsletters_get_by_id($_id);

if($letter == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Email from Newsletters menu...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Back to Newsletters page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p><strong>Yes</strong> Iam sure<a href="deletenewsletter.php?p='.$letter->news_letter_id.'& c=1">...Delete Newsletter of '.$letter->email.' </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-briefcase"></i></p>
        <p><strong>No</strong>..Back to<a href="newsletters.php"> Newsletters page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_newsletters_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">Newsletter has been deleted...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Back to Newsletters page</a></p>
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-comment"></i></p>
        <p><a href="newsletters.php">Back to Newsletters page</a></p>
    </div>
    </div>');
	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
<?php include_once 'header.php';


if(!isset($_GET['p']))
{echo'<script> location.replace("contacts.php")</script>';

}else{
    
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("contacts.php")</script>';
		
}else{
	
require_once 'prog_db.php';
require_once 'repliesAPI.php';

$r = prog_replies_get_by_id($_id);

if($r == NULL)
{
	prog_db_close();
    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Contact from Contacts menu...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="contacts.php">Back to Contacts page</a></p>
     </div>
     </div>');

}else{
		
	if((!isset($_GET['c'])) || ($_GET['c'] != 1))
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Are you sure?!</h1>
        <p class="info">Please select answer...Thank you.</p>       
        <p><i class="icon-exclamation-sign"></i></p>
        <p>Yes Iam sure<a href="deletereply.php?p='.$r->answer_id.'& c=1">...Delete this Reply. </a></p>
        <p>----------------------</p>
        <li> OR </li>
        <p>----------------------</p>
        <p><i class="icon-twitter"></i></p>
        <p>No..Back to<a href="contactdetails.php?p= '.$r->contact_id.'"> Last page</a></p>
      </div>
      </div>');
	


		
else{
	
$result = prog_replies_delete($_id);
if($result)

{   prog_db_close();
	echo('<div class="row-fluid">
	    <div class="http-error">
        <h1>Success!</h1>
        <p class="info">Reply has been deleted...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p>Back to<a href="contactdetails.php?p= '.$r->contact_id.'"> Last page</a></p>
      
    </div>
    </div>');

}else{
	
	prog_db_close();	
echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please try again...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p>Back to<a href="contactdetails.php?p= '.$r->contact_id.'"> Last page</a></p>
    </div>
    </div>');
	

	
?>  



<?php }}}}} ?>


<?php include_once 'footer.php';?>
<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("contacts.php")</script>';


}else{

	   
$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("contacts.php")</script>';

}else{


require_once 'prog_db.php';
require_once 'contactsAPI.php';

$c = prog_contacts_get_by_id($_id);

prog_db_close();

if($c == NULL){

    echo('<div class="row-fluid">
        <div class="http-error">
        <h1>Oops..Page not found!</h1>
        <p class="info">Please select Contact from Contacts menu...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p><a href="contacts.php">Back to Contacts page</a></p>
    </div>
    </div>');
			
}else{


?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New Reply From :<?php echo $_SESSION['user_info']->username ?></p>
            <div class="block-body">
            	
                <form action="savereply.php?p=<?php echo $_id; ?>" method="post">
                    <label>Title</label>
                    <input name="title" type="text" class="span12">
                    <label>Message</label>
                    <textarea name="message" rows="4" cols="50" class="span12"></textarea>        
                    <label>Email Address</label>
                    <input name="email" type="text" class="span12" value="<?php echo $c->email; ?>">
                    <input type="submit" name="savecontact" class="btn btn-primary pull-right" value="Send !">
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
    </div>
</div>


    

<?php }}} include_once 'footer.php';?>


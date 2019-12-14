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

$contact = prog_contacts_get_by_id($_id);
prog_db_close();

if($contact == NULL){

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
            <p class="block-heading">Updateing informations of : <?php echo $contact->name; ?> message</p>
            <div class="block-body">
            	
                <form action="updatecontact.php?p=<?php echo $contact->contact_id; ?>" method="post">
                    <label>Name</label>
                    <input name="name"type="text"  class="span12" value="<?php echo $contact->name; ?>">
                    <label>City</label>
                    <input name="city"type="text"  class="span12" value="<?php echo $contact->city; ?>">
                    <label>Email Address</label>
                    <input name="email"type="text"  class="span12" value="<?php echo $contact->email; ?>">
                    <label>Message</label>
                    <textarea name="message" rows="4" cols="50"class="span12"><?php echo $contact->Message; ?></textarea>                                                                            
                    <input type="submit" name="updatecontact" class="btn btn-primary pull-right" value="Save !">
                    <a href="contacts.php" class="btn btn-primary pull-left"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
 </div>         
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

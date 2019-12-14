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

if($r == NULL){
	
echo'<script> location.replace("contacts.php")</script>';
					
}else{

require_once 'adm_usersAPI.php';

$a = prog_adm_users_get_by_id($r->adm_id);
if($a == NULL)
{
	echo'<script> location.replace("contactdetails.php?p='.$r->contact_id.'")</script>';

}else{
	prog_db_close();
?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updating Reply of <?php echo $a->username; ?> By : <?php echo $_SESSION['user_info']->username ?></p>
            <div class="block-body">
            	
                <form action="updatereply.php?p=<?php echo $r->answer_id; ?>" method="post">
                    <label>Title</label>
                    <input name="title" type="text" class="span12" value="<?php echo $r->title; ?>">
                    <label>Message</label>
                    <textarea name="message" rows="4" cols="50" class="span12"><?php echo $r->content; ?></textarea>        
                    <label>Email Address</label>
                    <input name="email" type="text" class="span12" value="<?php echo $r->contact_email; ?>">
                    <input type="submit" name="savecontact" class="btn btn-primary pull-right" value="Send !">
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
    </div>
</div>


    

<?php }}}} include_once 'footer.php';?>


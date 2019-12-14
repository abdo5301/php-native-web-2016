<?php include_once 'header.php'; ?>


<?php


if(!isset($_GET['p']))
{echo'<script> location.replace("users.php")</script>';

}else{


if($_SESSION['user_info']->big_adm != 1)
{
if($_SESSION['user_info']->adm_id != $_GET['p']) 
{
	echo'<script> location.replace("users.php")</script>';
}

}
    
$_id = (int)$_GET['p'];
if($_id == 0){
	
echo'<script> location.replace("users.php")</script>';

}else{
	
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$user = prog_adm_users_get_by_id($_id);
prog_db_close();

if($user == NULL){
echo'<script> location.replace("users.php")</script>';


		
}else{
	    
?>
    <div class="container-fluid">
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Changing password of : <?php echo $user->username; ?></p>
            <div class="block-body">
            	
                <form action="updatepass.php?p=<?php echo $user->adm_id; ?>" method="post">
                    <label>Old password</label>
                    <input name="password1" type="password"  class="span12">
                    <label>New password</label>
                    <input name="password2" type="password"  class="span12">
                    <label>Confirm</label>
                    <input name="password3" type="password"  class="span12">
                    <input type="submit" name="updatepass" class="btn btn-primary pull-right" value="Save">
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
 </div>       
    </div>
    </div>
    </div>
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

<?php include_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("users.php")</script>';

}else{


if($_SESSION['user_info']->big_adm != 1)
{
if($_SESSION['user_info']->adm_id != $_GET['p']) 
{echo'<script> location.replace("users.php")</script>';

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
$_SESSION['user_info'] = false;
			
}else{
	    
?>
    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Updateing informations of : <?php echo $user->username; ?></p>
            <div class="block-body">
            	
                <form action="updateuser.php?p=<?php echo $user->adm_id; ?>" method="post">
                    <label>First Name</label>
                    <input name="first_name"type="text"  class="span12" value="<?php echo $user->first_name; ?>">
                    <label>Last Name</label>
                    <input name="last_name" type="text" class="span12" value="<?php echo $user->last_name; ?>">
                    <label>Email Address</label>
                    <input name="email" type="text"  class="span12" value="<?php echo $user->email; ?>">
                    <label>Username</label>
                    <input name="username" type="text" class="span12" value="<?php echo $user->username; ?>">
                    <?php if($_SESSION['user_info']->big_adm == 1)
                    {if($user->big_adm == 1)
                    	echo'<br>  <input type="radio" name="golden"value="1"checked>Golden  
                    <input type="radio" name="golden"value="0" >Not<br>'; 
                    else
                    echo'<br>  <input type="radio" name="golden"value="1">Golden  
                    <input type="radio" name="golden"value="0"checked>Not<br>';} ?>
                    <input type="submit" name="updateuser" class="btn btn-primary pull-right" value="Save">
                    <p><i class="icon-question-sign"> <a href="restpass.php?p=<?php echo $user->adm_id; ?>">Change Password </a><i class="icon-question-sign"></i></i></p>
                    
                    <div class="clearfix"></div>
                </form>
        </div>        
       
</div>        
          
 </div>
 </div>   
<?php }}} ?>

   <?php include_once 'footer.php';  ?>

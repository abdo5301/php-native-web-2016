<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("contacts.php")</script>';

}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..!</h1>
        <p class="info">Page not found.</p>
        <p><i class="icon-twitter"></i></p>
        <p>Go to Contacts page<a href="contacts.php"> here.</a></p>
    </div>
  </div>');
}

else{
require_once 'prog_db.php';
require_once 'contactsAPI.php';
require_once 'repliesAPI.php';
require_once 'adm_usersAPI.php';

$contact = prog_contacts_get_by_id($_id);

if($contact == NULL){
	
prog_db_close();	
echo('<div class="row-fluid">
       <div class="http-error">
        <h1>Oops..Contact not found!</h1>
        <p class="info">Please select Contact from Contacts menu...Thank you.</p>
        <p><i class="icon-twitter"></i></p>
        <p>Go to Contacts page<a href="contacts.php"> here.</a></p>
    </div>
  </div>');
}else{


?>


 <div class="header">
         <h1 class="page-title">Message from <?php echo $contact->name; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="contacts.php">Contacts</a> <span class="divider">/</span></li>
            <li class="active">Message Details</li>
        </ul>

        <div class="container-fluid">
                         

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2><strong>From</strong> <?php echo $contact->name; ?>:</h2>
						
						
							<p><big><?php echo $contact->Message; ?></big></p>
							<p><span><li><strong>Iam from : </strong><?php echo $contact->city; ?></li></span></p>
							<p><span><li><strong>My Email : </strong><?php echo $contact->email; ?></li></span></p>	
							<p><a href="modifycontact.php?p=<?php echo $contact->contact_id; ?>"><i class='icon-pencil'>.Modifing.</i> <i class='icon-pencil'></i></a></p>
						    <p><a href="deletecontact.php?p=<?php echo $contact->contact_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p><hr  size="4" color="gray"/>
                    
          
         <div class="block">           
    <a href="#page-stats" class="block-heading" data-toggle="collapse" id="addreply">New Reply From :<?php echo $_SESSION['user_info']->username ?></a>
    <div id="page-stats" class="block-body collapse ">
    	<div class="stat-widget-container" style="height: auto;width: auto;">    		                
    <div class="dialog" style="height: auto;width: auto;">           
            <div class="block-body">            	
                <form action="savereply.php?p=<?php echo $_id; ?>" method="post">
                    <label>Title</label>
                    <input name="title" type="text" class="span12">
                    <label>Message</label>
                    <textarea name="message" rows="4" cols="50" class="span12"></textarea>        
                    <label>Email Address</label>
                    <input name="email" type="text" class="span12" value="<?php echo $contact->email; ?>">
                    <input type="submit" name="savecontact" class="btn btn-primary pull-right" value="Send !">
                    <div class="clearfix"></div>
                </form>      
            </div>
        </div>
    </div>
                    
 </div>
 </div>
 </div>
 </div>
 </div>
 
 


<?php

$replies = prog_replies_get_by_cid($_id);

if($replies != NULL)
{$rcount = @count($replies);

echo '<center><h2 style="width: 100px;"><ins>Old Replies</ins><p>--------------</p></h2></center>';


for($i = 0; $i<$rcount ; $i++) 
{
	 $reply = $replies[$i];
	 
$adms = prog_adm_users_get('WHERE `adm_id`='.$reply->adm_id);

if($adms != NULL)
{$acount = @count($adms);

for($e = 0; $e<$acount ; $e++)
{
	$adm = $adms[$e];
	
	
echo  '

<div class="block">
  <div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2>Reply From <ins>'.$adm->username.'</ins> :</h2>
						     <p><big><strong> '.$reply->title.' </strong></big></p>
							<p><big> '.$reply->content.'</big></p>
							<p><a href="modifyreply.php?p= '.$reply->answer_id.'"> <i class="icon-pencil">.Modifing.</i> <i class="icon-pencil"></i></a></p>
						    <p><a href="deletereply.php?p= '.$reply->answer_id.'"><i class="icon-remove">.Delete.</i><i class="icon-remove"></i></a></p>
                    
                    </div>
                 </div>
             </div>
			        
					
					
					<div class="btn-toolbar">
	<div class="btn-group">
    
   <a href="#addreply" style="float: right; line-height: 1.25em; display: inline-block; padding: .75em 0em;"><button class="btn btn-primary" ><i class="icon-comment">Add Reply</i>  Top <i class="icon-circle-arrow-up"></i></button></a>
  </div>
</div>';


					                         

}
}
}
}
prog_db_close();              
?>           

</div>














<?php   }}}  require_once 'footer.php';  ?>
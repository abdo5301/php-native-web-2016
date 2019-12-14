<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'contactsAPI.php';


if(!isset($_POST['name']))
{
	prog_db_close();
header("Location: contacts.php");
}


$contacts = prog_contacts_get_by_name(trim($_POST['name']));
prog_db_close();

if ($contacts == NULL)
	header("Location:contacts.php");

else{
	$ccount = @count($contacts);
	
if($ccount == NULL)
	header("Location:contacts.php");
	
else{	
	require_once 'header3.php'; 
?>	
	
	
	
	
<div class="header">
         <h1 class="page-title">Messages from <?php echo $_POST['name']; ?> :</h1>        
        </div>
        
                <ul class="breadcrumb">
                	<li><a href="contacts.php">Contacts</a> <span class="divider">/</span></li>
            <li class="active">Messages Details</li>
        </ul>

        <div class="container-fluid">

<?php
for($i = 0; $i<$ccount; $i++)      
  
   { $contact = $contacts[$i];
                      
echo '<div class="block">
      <div class="block-body">
	  <div class="row-fluid" style="text-align: center;">
		<h2><strong>From</strong> '.$contact->name.' :</h2>
						
						
							<p><big>'.$contact->Message.'</big></p>
							<p><span><li><strong>Iam from : </strong>'.$contact->city.'</li></span></p>
							<p><span><li><strong>My Email : </strong>'.$contact->email.'</li></span></p>	
							<p><a href="modifycontact.php?p='.$contact->contact_id.'"><i class="icon-pencil">.Modifing.</i> <i class="icon-pencil"></i></a></p>
						    <p><a href="deletecontact.php?p='.$contact->contact_id.'"><i class="icon-remove">.Delete.</i><i class="icon-remove"></i></a></p>
                            <p><a href="contactdetails.php?p='.$contact->contact_id.'"><i class="icon-comment">.Replies.</i><i class="icon-comment"></i></a></p>
                    
                    </div>
                 </div>
             </div>';
            

	
   }
	
	
?>

</div>

<?php require_once 'footer.php'; ?>






<?php }} ?>
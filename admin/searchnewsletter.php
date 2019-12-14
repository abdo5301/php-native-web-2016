<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'newslettersAPI.php';


if(!isset($_POST['email']))
{
	prog_db_close();
header("Location: newsletters.php");
}


$letter = prog_newsletters_get_by_email(trim($_POST['email']));
prog_db_close();

if ($letter == NULL)
	header("Location:newsletters.php");

else{
	require_once 'header3.php'; 
?>	
	
	
	
	
<div class="header">
         <h1 class="page-title">Newsletter info :</h1>        
        </div>
        
                <ul class="breadcrumb">
                	<li><a href="newsletters.php">Newsletters</a> <span class="divider">/</span></li>
            <li class="active">Newsletters Details</li>
        </ul>

        <div class="container-fluid">

                      
<div class="block">
      <div class="block-body">
	  <div class="row-fluid" style="text-align: center;">
		<h2><?php echo $letter->email; ?></h2>
							<p><a href="modifynewsletter.php?p=<?php echo $letter->news_letter_id; ?>"><i class="icon-pencil">.Modifing.</i> <i class="icon-pencil"></i></a></p>
						    <p><a href="deletenewsletter.php?p=<?php echo $letter->news_letter_id; ?>"><i class="icon-remove">.Delete.</i><i class="icon-remove"></i></a></p>
                            
                    </div>
                 </div>
             </div>
            
</div>

<?php require_once 'footer.php'; ?>






<?php } ?>
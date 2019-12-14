<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'settingAPI.php';


if(!isset($_POST['key']))
{
	prog_db_close();
header("Location: settings.php");
}


$setting = prog_setting_get_by_key(trim($_POST['key']));
prog_db_close();

if ($setting == NULL)
	header("Location:settings.php");

else{
	require_once 'header3.php'; 
?>	
	
	
	
	
<div class="header">
         <h1 class="page-title">Setting of <?php echo $setting->key; ?> :</h1>        
        </div>
        
                <ul class="breadcrumb">
                	<li><a href="settings.php">Settings</a> <span class="divider">/</span></li>
            <li class="active">Setting Details</li>
        </ul>

        <div class="container-fluid">

                      
<div class="block">
      <div class="block-body">
	  <div class="row-fluid" style="text-align: center;">
		<h2><?php echo $_POST['key']; ?></h2>
							<p><big><?php echo $setting->desc; ?></big></p>
							<p><a href="modifysetting.php?p=<?php echo $setting->setting_id; ?>"><i class="icon-pencil">.Modifing.</i> <i class="icon-pencil"></i></a></p>
						    <p><a href="deletesetting.php?p=<?php echo $setting->setting_id; ?>"><i class="icon-remove">.Delete.</i><i class="icon-remove"></i></a></p>
                            
                    </div>
                 </div>
             </div>
            
</div>

<?php require_once 'footer.php'; ?>






<?php } ?>
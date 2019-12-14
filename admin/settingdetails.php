<?php require_once 'header.php'; 

if(!isset($_GET['p']))
{echo'<script> location.replace("settings.php")</script>';

}else{


$_id = (int)$_GET['p'];
if($_id == 0){
echo'<script> location.replace("settings.php")</script>';
}

else{
require_once 'prog_db.php';
require_once 'settingAPI.php';

$set = prog_setting_get_by_id($_id);
prog_db_close();
if($set == NULL){
echo '<script> location.replace("settings.php")</script>';

}else{


?>
 <div class="header">
         <h1 class="page-title"><?php echo $set->key; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="settings.php">Settings</a> <span class="divider">/</span></li>
            <li class="active">Setting Details</li>
        </ul>

        <div class="container-fluid">
                      

<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<h2><?php echo $set->key; ?>  :</h2>
						
						
							<p><strong><?php echo $set->desc; ?></strong></p><br />
							<p><a href="modifysetting.php?p=<?php echo $set->setting_id; ?>"><i class='icon-pencil'>.Modifing.</i> <i class='icon-pencil'></i></a></p>
						    <p><a href="deletesetting.php?p=<?php echo $set->setting_id; ?>"><i class='icon-remove'>.Delete.</i><i class='icon-remove'></i></a></p>
                    
                    </div>
                 </div>
             </div>
            </div>
              
           
















<?php  }}} require_once 'footer.php';  ?>
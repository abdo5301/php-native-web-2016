<?php
require_once 'session.php'; 
if($_SESSION['user_info'] == false)
header('Location: logout.php');

require_once 'prog_db.php';
require_once 'testimonialsAPI.php';


if(!isset($_POST['name']))
{
	prog_db_close();
header("Location: testimonials.php");
}


$testis = prog_testi_get_all_by_name(trim($_POST['name']));
prog_db_close();

if ($testis == NULL)
	header("Location:testimonials.php");

else{
	$tcount = @count($testis);
	
if($tcount == NULL)
	header("Location:testimonials.php");
	
else{	
	require_once 'header3.php'; 
?>	
	
	
	
	
<div class="header">
         <h1 class="page-title">Testimonials of <?php echo $_POST['name']; ?> :</h1>        
        </div>
        
                <ul class="breadcrumb">
                	<li><a href="testimonials.php">Testimonials</a> <span class="divider">/</span></li>
            <li class="active">Testimonial Details</li>
        </ul>

        <div class="container-fluid">

<?php
for($i = 0; $i<$tcount; $i++)      
  
   { $testi = $testis[$i];
                      
echo '<div class="block">
<div class="block-body">
	<div class="row-fluid" style="text-align: center;">
		<p><strong><li> '.$testi->desc.'</li></strong></p>
		<p>'.$testi->content.'</p>
		<p><strong><li>Name : '.$testi->name.' </li></strong></span></p>	
		<p><strong><li>Job :   '.$testi->job.' </li></strong></span></p>	
		<p><a href="modifytestimonial.php?p= '.$testi->testimo_id.'"><i class="icon-pencil">.Modifing.</i> <i class="icon-pencil"></i></a></p>
		<p><a href="deletetestimonial.php?p= '.$testi->testimo_id.'"><i class="icon-remove">.Delete.</i><i class="icon-remove"></i></a></p>
                    
                    </div>
                 </div>
          </div>';
    

	
   }
	
	
?>

</div>

<?php require_once 'footer.php'; ?>






<?php }} ?>
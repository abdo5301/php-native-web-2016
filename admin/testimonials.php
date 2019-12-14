<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'testimonialsAPI.php';

$testis = prog_testi_get();
if($testis == NULL)
{
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops..Problem!</h1>
        <p class="info">Page not found...Thank you.</p>
        <p><i class="icon-home"></i></p>
        <p><a href="users.php">Go to Users page </a></p>
       <div class="btn-toolbar"> <p><a href="addtestimonial.php"><button class="btn btn-primary" ><i class="icon-plus">New Testimonial</i></button></a></p></div>

    </div>
</div>');	

}else{
	
$tcount = @count($testis);
if($tcount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Testimonials!</h1>
        <p class="info">Please add new Testimonial...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addtestimonial.php">Go to New Testimonial page</a></p>
    </div>
</div>');

	
}else{
	
?>



   
    
    
        
        <div class="header">
            
            <h1 class="page-title">Testimonials</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Testimonials Lest (<?php echo $tcount ?>)</li>
        </ul>


        <div class="container-fluid">
            <div class="row-fluid">
      
      <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchtestimonial.php" method="post">
               <input class="input-xlarge" placeholder="Enter name only...." id="appendedInputButton" type="text" name="name">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>


                    
<div class="btn-toolbar">
    <a href="addtestimonial.php"><button class="btn btn-primary" ><i class="icon-plus">New Testimonial</i></button></a>
   
  <div class="btn-group">
  	
            
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 100px;">Num</th>	
          <th style="width: 100px;">ID</th>
          <th style="width: 100px;">Name</th>
          <th style="width: 100px;">Job</th>
          <th style="width: 100px;">Descreption</th>
          <th style="width: 150px;">Read more(content)</th>
          <th style="width: 100px;">Active Testimonials</th>
          <th style="width: 100px;">In home page</th>
          <th style="width: 50px;"></th>
        </tr>
      </thead> 
<?php
  
for($i = 0; $i<$tcount; $i++)      
{
	$num = $i+1;	
	
 	$testi = $testis[$i];

if($testi->active_testimo == 1) 
 $testi->active_testimo = 'Active';
else
 $testi->active_testimo = '........';

if($testi->in_home == 1) 
 $testi->in_home = 'in home';
else
 $testi->in_home = '........';

 
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$testi->testimo_id</td>
          <td>$testi->name</td>
          <td>$testi->job</td>          
          <td>".limit_text($testi->desc,3)."</td>
          <td><a href='testimonialdetails.php?p=$testi->testimo_id'><i class='icon-comment'></i> Read more</a></td>
          <td><i class='icon-uesr'>$testi->active_testimo</i></td>
          <td><i class='icon-home'>$testi->in_home</i></td>		  
          <td>
              <a href='modifytestimonial.php?p=$testi->testimo_id'><i class='icon-pencil'></i></a>
              <a href='deletetestimonial.php?p=$testi->testimo_id'><i class='icon-remove'></i></a>
          </td>
        </tr>
      </tbody>";
      
}  

	  
?>      
    </table>
</div>

</div>
</div>





<?php }} ?>
                    
    
<?php 
prog_db_close();
include_once'footer.php'; 
?>
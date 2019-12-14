<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'contactsAPI.php';
require_once 'repliesAPI.php';

$contacts = prog_contacts_get();
if($contacts == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Contacts!</h1>
        <p class="info">Please add new Contact...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addcontact.php">Go to New Contact page</a></p>
    </div>
</div>');
}

else{
$ccount = @count($contacts);
if($ccount == NULL)

{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Contacts!</h1>
        <p class="info">Please add new Contact...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="addcontact.php">Go to New Contact page</a></p>
    </div>
</div>');
	
}else{
	
	
	
	
?>



   
    
      
        <div class="header">
            
            <h1 class="page-title">Contacts</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Contacts Lest (<?php echo $ccount ?>)</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
            
            <div class="btn-toolbar">
	<div class="btn-group">
         <div class="search-well">
                <form class="form-inline" action="searchcontact.php" method="post">
               <input class="input-xlarge" placeholder="Enter name only...." id="appendedInputButton" type="text" name="name">
               <input class="btn btn-primary" type="submit" value= "Search" name="search">
                </form>
            </div> 	
</div>
</div>
	
                    
<div class="btn-toolbar">
    <a href="addcontact.php"><button class="btn btn-primary" ><i class="icon-plus">New Contact</i></button></a>
   
  <div class="btn-group">
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 100px;">Num</th>
          <th style="width: 150px;">Contact id</th>
          <th style="width: 200px;">Name</th>
          <th style="width: 200px;">City</th>
          <th style="width: 300px;">Email Adress</th>
          <th style="width: 200px;">Message</th>
          <th style="width: 200px;">Reply</th>
          <th style="width:  50px;"></th>
        </tr>
      </thead> 
<?php
 
  
for($i = 0; $i<$ccount; $i++)      
 {
 	$num = $i+1;
	
 	$contact = $contacts[$i];

$reply = prog_replies_get_by_cid($contact->contact_id);
	
 	echo "    <tbody>        
        <tr>
          <td>$num</td>
          <td>$contact->contact_id</td>
          <td><li class='icon-user'>$contact->name</li></td>
          <td>$contact->city</td>
          <td>$contact->email</td>
          <td><abbr title='$contact->Message'><a href='contactdetails.php?p=$contact->contact_id'><i class='icon-comment'></i> Read</a><abbr></td>";
if($reply == NULL)		  		  
         echo "<td><a href='contactdetails.php?p=$contact->contact_id'><i class='icon-exclamation-sign'></i> Reply</a></td>";	  		  
else 
	     echo "<td><a href='contactdetails.php?p=$contact->contact_id'>Had Replied</a></td>";
          	  		  
         echo"<td>
        	  <a href='modifycontact.php?p=$contact->contact_id'><i class='icon-pencil'></i></a>
              <a href='deletecontact.php?p=$contact->contact_id'><i class='icon-remove'></i></a>
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
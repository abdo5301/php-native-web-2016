<?php
include_once 'header.php';
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$users = prog_adm_users_get();
if($users == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Users!</h1>
        <p class="info">Please add new user...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="adduser.php">Go to sign up page</a></p>
    </div>
</div>');
}

else{
$ucount = @count($users);
if($ucount == NULL)

{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h1>Oops...NO Users!</h1>
        <p class="info">Please add new user...Thank you.</p>
        <p><i class="icon-pencil"></i></p>
        <p><a href="adduser.php">Go to sign up page</a></p>
    </div>
</div>');
	
}else{
	
	
?>



   
    
      
        <div class="header">
            
            <h1 class="page-title">Users</h1>
        </div>
        
                <ul class="breadcrumb">
            
            <li class="active">Users</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
<div class="btn-toolbar">
    <a href="adduser.php"><button class="btn btn-primary" ><i class="icon-plus">New User</i></button></a>
   
  <div class="btn-group">
  </div>
</div>



<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">ID</th>
          <th style="width: 200px;">First Name</th>
          <th style="width: 200px;">Last Name</th>
          <th style="width: 300px;">Email Adress</th>
          <th style="width: 200px;">Username</th>
          <th style="width: 200px;">Golden Admins</th>
          <th style="width:  50px;"></th>
        </tr>
      </thead> 
<?php
 
  
for($i = 0; $i<$ucount; $i++)      
 {
 	$user = $users[$i];

if($user->big_adm == 1) 
 $user->big_adm = 'Golden';
else
 $user->big_adm = '......';

	
 	echo "    <tbody>        
        <tr>
          <td>$user->adm_id</td>
          <td>$user->first_name</td>
          <td>$user->last_name</td>
          <td>$user->email</td>
          <td>$user->username</td>	  
	      <td><li class='icon-user'>$user->big_adm</li></td>";
 
if($_SESSION['user_info']->big_adm == 1)		  
    
   echo "<td>
        	  <a href='modifyuser.php?p=$user->adm_id'><i class='icon-pencil'></i></a>
              <a href='deleteuser.php?p=$user->adm_id'><i class='icon-remove'></i></a>
        </td>";
          
        echo"</tr>
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
<?php
include_once 'header.php';

    
$_id = (int)$_SESSION['user_info']->adm_id;
if($_id == 0){
echo'<script> location.replace("users.php")</script>';
}

else{
require_once 'prog_db.php';
require_once 'adm_usersAPI.php';

$user = prog_adm_users_get_by_id($_id);
prog_db_close();
if($user == NULL){
echo'<script> location.replace("users.php")</script>';

}else{
			
?>     
        <div class="header">
         <h1 class="page-title"><?php echo $user->username; ?> </h1>        
        </div>
        
                <ul class="breadcrumb">
            <li><a href="users.php">Users</a> <span class="divider">/</span></li>
            <li class="active">User Profile</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    
  
 <div class="well">
    <table class="table">
      <thead>
        <tr>
          <th style="width: 50px;">ID</th>
          <th style="width: 200px;">First Name</th>
          <th style="width: 200px;">Last Name</th>
          <th style="width: 200px;">Email Adress</th>
          <th style="width: 200px;">Username</th>
          <th style="width:  29px;"></th>
        </tr>
      </thead> 
<?php
  
 	echo "    <tbody>        
        <tr>
          <td>$user->adm_id</td>
          <td>$user->first_name</td>
          <td>$user->last_name</td>
          <td>$user->email</td>
          <td>$user->username</td>
          <td>
              <a href='modifyuser.php?p=$_id'><i class='icon-pencil'></i></a>	
          </td>
        </tr>
      </tbody>";
      
  

	  
?>      
    </table>
</div>
</div>
</div>
                    
                   
<?php }}include_once'footer.php';?>
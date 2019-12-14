<?php include_once 'header.php'; ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">Sign Up</p>
            <div class="block-body">
            	
                <form action="saveuser.php" method="post">
                    <label>First Name</label>
                    <input name="first_name"type="text"  class="span12">
                    <label>Last Name</label>
                    <input name="last_name" type="text" class="span12">
                    <label>Email Address</label>
                    <input name="email" type="text"  class="span12">
                    <label>Username</label>
                    <input name="username" type="text" class="span12">
                    <label>Password</label>
                    <input name="password" type="password"  class="span12">
                    <?php if($_SESSION['user_info']->big_adm == 1)
                    echo'<br>  <input type="radio" name="golden"value="1">Golden  
                    <input type="radio" name="golden"value="0" checked>Not<br>'; ?>
                    <input type="submit" name="saveuser" class="btn btn-primary pull-right" value="sign up">
                    <label class="remember-me"><input type="checkbox"> I agree with the <a href="terms-and-conditions.html">Terms and Conditions</a></label>
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
        <p><a href="">Privacy Policy</a></p>
    </div>
</div>


    

<?php include_once 'footer.php';?>


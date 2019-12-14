<?php include_once 'header.php'; ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New Contact</p>
            <div class="block-body">
            	
                <form action="savecontact.php" method="post">
                    <label>Name</label>
                    <input name="name"type="text"  class="span12">
                    <label>City</label>
                    <input name="city" type="text" class="span12">
                    <label>Email Address</label>
                    <input name="email" type="text"  class="span12">
                    <label>Message</label>
                    <textarea name="message" rows="4" cols="50" class="span12"></textarea>
                    <input type="submit" name="savecontact" class="btn btn-primary pull-right" value="Send !">
                    <a href="contacts.php" class="btn btn-primary pull-left"> Cancel</a>
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
    </div>
</div>


    

<?php include_once 'footer.php';?>


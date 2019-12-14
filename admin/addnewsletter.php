<?php include_once 'header.php'; ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New Newsletter</p>
            <div class="block-body">
            	
                <form action="savenewsletter.php" method="post">
                    <label>Email</label>
                    <input name="email"type="text" class="span12">
                    <input type="submit" name="saveletter" class="btn btn-primary pull-right" value="Save !">
                    <a href="newsletters.php" class="btn btn-primary pull-left"> Cancel</a>
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
    </div>
</div>


    

<?php include_once 'footer.php';?>


<?php include_once 'header.php'; ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New Setting</p>
            <div class="block-body">
            	
                <form action="savesetting.php" method="post">
                    <label>Setting key</label>
                    <input name="key"type="text" class="span12">
                    <label>Setting Content</label>
                    <textarea name="content" rows="4" cols="50" class="span12"></textarea>
                    <input type="submit" name="savesetting" class="btn btn-primary pull-right" value="Save !">
                    <a href="settings.php" class="btn btn-primary pull-left"> Cancel</a>
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
    </div>
</div>


    

<?php include_once 'footer.php';?>


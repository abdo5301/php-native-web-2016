<?php include_once 'header.php' ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New--Product</p>
            <div class="block-body">
            	
                <form action="saveproduct.php" method="post" enctype="multipart/form-data">
                    <label>Product name</label>
                    <input name="name"type="text"  class="span12">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"></textarea>
                    <label>Read more(content)</label>
                    <textarea name="content" rows="4" cols="50"class="span12"></textarea>
                    <label>Image</label>
                    <input type="file" name="image"><br>
                    <input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0" checked>Inactive<br>
                    <input type="radio" name="home"value="1">In home	
                    <input type="radio" name="home"value="0" checked>Not<br>
                    <input type="submit" name="saveproduct" class="btn btn-primary pull-right" value="Save !">
                    <a href="products.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
        
    </div>
</div>


    

<?php include_once 'footer.php';?>


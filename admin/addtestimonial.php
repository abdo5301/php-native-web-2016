<?php include_once 'header.php' ?>
    


    

    
        <div class="row-fluid">
    <div class="dialog">
        <div class="block">
            <p class="block-heading">New--Testimonial</p>
            <div class="block-body">
            	
                <form action="savetestimonial.php" method="post" enctype="multipart/form-data">
                    <label>Name</label>
                    <input name="name"type="text"  class="span12">
                    <label>Job</label>
                    <input name="job"type="text"  class="span12">
                    <label>Descreption</label>
                    <textarea name="desc" rows="4" cols="50"class="span12"></textarea>
                    <label>Read more(content)</label>
                    <textarea name="content" rows="4" cols="50"class="span12"></textarea>
                    <input type="radio" name="active"value="1">Active
                    <input type="radio" name="active"value="0" checked>Inactive<br>
                    <input type="radio" name="home"value="1">In home	
                    <input type="radio" name="home"value="0" checked>Not<br>
                    <input type="submit" name="savetestimonial" class="btn btn-primary pull-right" value="Save !">
                    <a href="testimonials.php" class="btn btn-primary pull-right"> Cancel</a>
                    
                    <div class="clearfix"></div>
                </form>
                
               
            </div>
        </div>
        
    </div>
</div>


    

<?php include_once 'footer.php';?>


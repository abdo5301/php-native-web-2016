<!DOCTYPE html>
<html lang="en">
<head>
<title>Services</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/zerogrid.css">
<link rel="stylesheet" href="css/responsive.css">
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/tabs.js"></script>
<script src="js/css3-mediaqueries.js"></script>
  <!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
	<style type="text/css">
		.bg{ behavior: url(js/PIE.htc); }
	</style>
  <![endif]-->
	<!--[if lt IE 7]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0"  alt="" /></a>
		</div>
	<![endif]-->

</head>

<body id="page3">
	<div class="body1">
	<div class="body2">
	<div class="body5">
		<div class="main zerogrid">
<!-- header -->
			<header>
				<div class="wrapper row">
				<h1><a href="index.php" id="logo"><img src="images/logo.png" /></a></h1>
				<nav>
					<ul id="menu">
						<li id="nav1"><a href="index.php">Home<span>Welcome!</span></a></li>
						<li id="nav2"><a href="news.php">News<span>Fresh</span></a></li>
						<li id="nav3" class="active"><a href="services.php">Services<span>for you</span></a></li>
						<li id="nav4"><a href="products.php">Products<span>The best</span></a></li>
						<li id="nav5"><a href="contacts.php">Contacts<span>Our Address</span></a></li>
					</ul>
				</nav>
				</div>

			</header>
<!-- header end-->
		</div>
	</div>
	</div>
	</div>
	<div class="body3">
		<div class="main zerogrid">
<!-- content -->
<?php

require_once 'prog_db.php';
require_once 'servicesAPI.php';

$servs = prog_servs_get_by_active();
if($servs == NULL)
{
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
        
    </div>
</div>');	

}else{
	
$scount = @count($servs);
if($scount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
    </div>
</div>');

	
}else{
?>

			<article id="content">
				<div class="wrapper">
					<h2 class="under">Overview of Our Main Services</h2>
					<div class="wrapper">
						<section class="col-1-3">														
						<div class="wrap-col">
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==0)) 
							
						echo '<div class="wrapper pad_bot1">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==3)) 
							
							echo'<div class="wrapper">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
						</div>
						</section>
						<section class="col-1-3">
						<div class="wrap-col">
							
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==1)) 
							
							echo'<div class="wrapper pad_bot1">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==4)) 
							
							echo'<div class="wrapper">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
							
						</div>
						</section>
						<section class="col-1-3">
						<div class="wrap-col">
							
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==2)) 
							
							echo'<div class="wrapper pad_bot1">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
<?php
  
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

if(($serv->active_serv == 1) && ($i==5)) 
							
							echo'<div class="wrapper">
								<figure class="left marg_right1" style="width: 62px;height: 104px;"><img src="admin/images/'.$serv->image.'" alt="" style="width: 62px;height: 99px;"></figure>
								<h6>'.limit_text($serv->title,2).'</h6>
								<p style="width: 293.3px;height: 110px;">'.limit_text($serv->desc,15).'</p>
							</div>';
}							
?>
							
							
						</div>
						</section>
					</div>
				</div>

			</article>
		</div>
	</div>
	
	<?php }} require_once 'settingAPI.php'; ?>
	
		<div class="body4">
		<div class="main zerogrid">
			<article id="content2">
				<div class="wrapper row">
					<section class="col-1-4">
					<div class="wrap-col">
						<h4><?= limit_text( get_set('footer_title1'),2) ?></h4>
						<ul class="list1">
                            <li><a href="<?= get_set('footer_link1_link') ?>"><?= limit_text(get_set('footer_link1_title'),3) ?></a></li>
							<li><a href="<?= get_set('footer_link2_link') ?>"><?= limit_text(get_set('footer_link2_title'),3) ?></a></li>
							<li><a href="<?= get_set('footer_link3_link') ?>"><?= limit_text(get_set('footer_link3_title'),3) ?></a></li>
							<li><a href="<?= get_set('footer_link4_link') ?>"><?= limit_text(get_set('footer_link4_title'),3) ?></a></li>
						</ul>
					</div>
					</section>
					<section class="col-1-4">
					<div class="wrap-col">
						<h4><?= limit_text( get_set('footer_title2'),2) ?></h4>
						<ul class="address">
							
							<li><span>Country:</span><?= get_set('Country') ?></li>
							
							<li><span>City:</span><?= get_set('City') ?></li>
							
							<li><span>Phone:</span><?= get_set('Phone') ?></li>
							
							<li><span>Email:</span><a href=<?= get_set('footer_Email_link') ?>><?= limit_text(get_set('footer_Email_title'),3) ?></a></li>
												
						</ul>
					</div>
					</section>
					<section class="col-1-4">
					<div class="wrap-col">
						<h4><?= limit_text( get_set('footer_title3'),2) ?></h4>
						<ul id="icons">
                            
					<li><a href="<?= get_set('facebook') ?>"><img src="images/icon1.jpg" alt="">Facebook</a></li>
					<li><a href="<?= get_set('Twitter') ?>"><img src="images/icon2.jpg" alt="">Twitter</a></li>
					<li><a href="<?= get_set('LinkedIn') ?>"><img src="images/icon3.jpg" alt="">LinkedIn</a></li>
					<li><a href="<?= get_set('Delicious') ?>"><img src="images/icon4.jpg" alt="">Delicious</a></li>
																	
						</ul>
					</div>
					</section>
									
					<section class="col-1-4">
					<div class="wrap-col">
						<h4>Newsletter</h4>
						<form  method="post" id="newsletter">
							<div>
								<div class="wrapper" style="width: 215px;height: 40;">
									<input class="input" type="text" id="newsletters" value="Type Your Email Here"  onblur="if(this.value=='') this.value='Type Your Email Here'" onfocus="if(this.value =='Type Your Email Here' ) this.value=''">
								</div>
								
								<div id="rt1"  style="color: red; display: none;" >
								Incorrect Email.please try again!
							</div>
								
								<div id="rt2" style="color: red; display: none;">
								Enter your Email and try again!
							</div>
							
							<div id="rt3" style="color: green; display: none;">
								Done successfuly.Thank you.
							</div>
							
							<div id="rt4" style="color: red; display: none;">
							Wrong.please try again later!
							</div>
		
							<input type="button" class="button" style="color: white;height: 30px;background-color: green;" onclick="letter_info()" value="Subscribe" />
	                    	
							    </div>
							</div>
						</form>
					</div>
					</section>
				</div>
			</article>


<script type="text/javascript">

 function letter_info(){
 
 var letter = {'email':$('#newsletters').val()}
 
 
    $.get("savenewsletter.php",letter,function(data){	
    	//alert($.trim(data));
    	if($.trim(data) == 'wrong_email')
    	 {$('#rt1').css("display","block")
    	  $('#rt1').fadeOut(15000)
    	  $('#rt2').css("display","none")
    	  $('#rt3').css("display","none")
    	  $('#rt4').css("display","none");
    	 }
       
       if($.trim(data) == 'empty email')
    	 {$('#rt2').css("display","block")
    	  $('#rt2').fadeOut(15000)
    	  $('#rt1').css("display","none")
    	  $('#rt3').css("display","none")
    	  $('#rt4').css("display","none");
    	 }
       
       if($.trim(data) == 'true')
    	 {$('#rt3').css("display","block")
    	  $('#rt3').fadeOut(15000)
    	  $('#rt1').css("display","none")
    	  $('#rt2').css("display","none")
    	  $('#rt4').css("display","none")
          $('#newsletters').val('');}
       
       if(($.trim(data) == 'false') || (data == 'failur'))
    	 {$('#rt4').css("display","block");
    	  $('#rt4').fadeOut(15000)
    	  $('#rt2').css("display","none")
    	  $('#rt3').css("display","none")
    	  $('#rt1').css("display","none")
    	 }
       
       
    });

} 		
 	
	
</script>					
		
<!-- content end -->
		</div>
	</div>
		<div class="main zerogrid">
<!-- footer -->
			<footer>
				<a href="http://www.zerotheme.com/432/free-responsive-html5-css3-website-templates.html" target="_blank">Html5 Templates</a> by <a href="http://www.templatemonster.com/" target="_blank">Templatesmonster.com</a><br>
				<a href="http://www.zerotheme.com/432/free-responsive-html5-css3-website-templates.html" target="_blank">Responsive Themes</a> by <a href="http://www.zerotheme.com/" target="_blank">Zerotheme.com</a><br>
			</footer>
<!-- footer end -->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
<script>
	$(document).ready(function() {
		tabs.init();
	})
</script>
</body>
</html>
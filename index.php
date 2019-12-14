<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="css/zerogrid.css">
<link rel="stylesheet" href="css/responsive.css">
<link rel="stylesheet" href="css/responsiveslides.css" />
<script type="text/javascript" src="js/jquery-1.6.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_400.font.js"></script>
<script type="text/javascript" src="js/Swis721_Cn_BT_700.font.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/tms-0.3.js"></script>
<script type="text/javascript" src="js/tms_presets.js"></script>
<script type="text/javascript" src="js/jcarousellite.js"></script>
<script type="text/javascript" src="js/script.js"></script>
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
	
	<script src="js/responsiveslides.js"></script>
	<script>
		$(function () {
		  $("#slider").responsiveSlides({
			auto: true,
			pager: false,
			nav: true,
			speed: 500,
			maxwidth: 960,
			namespace: "centered-btns"
		  });
		});
	</script>
	
</head>
<body id="page1">
<div class="body1">
	<div class="body2">
		<div class="main zerogrid">
<!-- header -->
			<header>
				<div class="wrapper row">
				<h1><a href="index.php" id="logo"><img src="images/logo.png" style="width: 1000px;height: 100px;" /></a></h1>
				<nav>
					<ul id="menu">
						<li id="nav1" class="active"><a href="index.php">Home<span>Welcome!</span></a></li>
						<li id="nav2"><a href="news.php">News<span>Fresh</span></a></li>
						<li id="nav3"><a href="services.php">Services<span>for you</span></a></li>
						<li id="nav4"><a href="products.php">Products<span>The best</span></a></li>
						<li id="nav5"><a href="contacts.php">Contacts<span>Our Address</span></a></li>
						<li id="nav4"><a href="products2.php">Others<span>Any Subject</span></a></li>
					</ul>
				</nav>
				</div>


				<div class="wrapper row">
					<div class="slider">
					  	<div class="rslides_container">
							<ul class="rslides" id="slider">
								
<?php

require_once 'prog_db.php';
require_once 'productsAPI.php';

$pros = prog_pros_get_by_active();
if($pros == NULL)
{
	prog_db_close();
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..Problem!</h2>
        <p class="info">Page not found...Thank you.</p>
        
    </div>
</div>');	

}else{
	
$pcount = @count($pros);
if($pcount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
    </div>
</div>');

	
}else{
	
for($i = 0; $i<$pcount; $i++)      
{
 	$pro = $pros[$i];

if($pro->active_prod == 1) 
echo '<li><a href="prodetails.php?P='.$pro->prod_id.'"><img src="admin/images/'.$pro->image.'" alt="" style="width: 940px;height: 423px;"></a></li>';
								
}

?>
								
								
							</ul>
						</div>
					</div>
				</div>
				
			</header>
<!-- header end-->
		</div>
	</div>
</div>
	<div class="body3">
		<div class="main zerogrid">
<!-- content -->

<?php

require_once 'servicesAPI.php';

$servs = prog_servs_get_by_home();
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
				<div class="wrapper row">

							
<?php
 
  $a = 0;
for($i = 0; $i<$scount; $i++)      
{
 	$serv = $servs[$i];

$a++;

$e = explode(" ", $serv->title);

if(($serv->in_home == 1) && ($i<=3)) 
										
			echo'<section class="col-1-4">
						<div class="wrapper pad_bot2">
							<h3><span class="dropcap">'. $a .'</span>'.$e[0].'<span>'.$e[1].'</span></h3>
							<p style="width: 210px;height: 80px;" class="pad_bot1">'.limit_text($serv->desc,10).'</p>
							<a href="services.php" class="link1">Read More</a>
						</div>
					</section>';

}


require_once 'settingAPI.php';							


$sets = prog_setting_get();
if($sets == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
    </div>
</div>');

}else{

$setcount = @count($sets);
if($setcount == NULL)
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
					
				</div>
				
				
		<div class="wrapper row">
					            <section class="col-3-4">
						         <div class="wrap-col">
							     <h2 class="under"><?= limit_text( get_set('Welcome_title'),4) ?></h2>
						  	     <div class="wrapper">
								 <figure class="left marg_right1"><img style="width: 221px;hight: 132px;" src="admin/images/<?=  get_set('Welcome_image') ?>" alt=""></figure>
								 <p class="pad_bot1"><?= limit_text( get_set('Welcome_content'),65) ?></p>
								 </div>
						</div>
					</section>
					
					
					<section class="col-1-4">
						<div class="wrap-col">
							<h2>Testimonials</h2>
							<div class="testimonials">
							<div id="testimonials">
								<ul>

<?php

require_once 'testimonialsAPI.php';							

$testis = prog_testi_get();
if($testis == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
    </div>
</div>');

}else{

$testicount = @count($testis);
if($testicount == NULL)
{
	prog_db_close();
	
	echo('<div class="row-fluid">
    <div class="http-error">
        <h2>Oops..!</h2>
        <p class="info">Page not found...Thank you.</p>
    </div>
</div>');

	
}else{
	

for($i = 0; $i<$testicount; $i++)
{
  $testi = $testis[$i];  
  
if(($testi->active_testimo == 1) && ($testi->in_home == 1))
  							
							 
								echo'<li>
									<div>
										“'.limit_text($testi->desc,8).'.”<br><a href="testimonialsdetails.php?t='.$testi->testimo_id.'" class="link1">Read more</a>
									</div>
									<span><strong class="color1">'.$testi->name.',</strong> <br>
									'.$testi->job.'<br>
									</span>
								</li>';
								
								

}

?>								
                            
                            </ul>
							</div>
							<a href="#" class="up"></a>
							<a href="#" class="down"></a>
							</div>
						</div>
					</section>
				</div>
			</article>
			
		</div>	
	</div>
	
	<?php }}}}}}}} ?>
	
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
				<a href="http://www.zerotheme.com/432/free-responsive-html5-css3-website-templates.html" target="_blank">Html5 Templates</a> by <a href="http://www.templatemonster.com/" target="_blank">pop</a><br>
				<a href="http://www.zerotheme.com/432/free-responsive-html5-css3-website-templates.html" target="_blank">Responsive Themes</a> by <a href="http://www.zerotheme.com/" target="_blank">pop</a><br>
			</footer>
			
<!-- footer end -->
		</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
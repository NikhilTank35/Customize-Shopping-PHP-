<?php ob_start(); include("conn.php");  session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Smart Bazaar an E-commerce Online Shopping Category Flat Bootstrap Responsive Website Template | Products :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->  
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" />   
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-2.2.3.min.js"></script> 
<script src="js/owl.carousel.js"></script>
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 
<!-- scroll to fixed--> 
<script src="js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- //scroll to fixed--> 
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
	$(document).ready(function() {
	
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>
<!-- //smooth-scrolling-of-move-up -->  
<!-- the jScrollPane script -->
<script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
</script>
<!-- //the jScrollPane script -->
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<!-- the mousewheel plugin --> 
</head>
<body>
<?php 
 if(isset($_GET['val'])) {

$val=$_GET['val'];


}
?>
	<!-- header --><?php include("header.php"); ?>
	<?php 

				if(isset($_GET['cate'])){ $cate=$_GET['cate']; }
				else
				{
					$cate=1;
				}
				if(isset($_GET["pname"]))
				{	
						if ($_GET['x']==1) {
							$_SESSION['x']=1;
						}
					$pname=$_GET["pname"];
						$result=mysql_query("select * from product where pname='$pname'",$con);
				
				}
			elseif (isset($_GET['val'])) {
			$result=mysql_query("select * from product where price<=$val and cate=$cate",$con);
			}
				else
					$result=mysql_query("select * from product where cate=$cate");
$print=mysql_fetch_array($result)['cate'];
?>
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.php">Home</a></li>
			
					<li class="active">Products</li>
				</ol>
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">	
					<h4><?php if ($print==1) {
						echo "Watches";
					}
					elseif ($print==2) {
						echo "Spectacles";
					}elseif ($print==3) {
						echo "T-shirts";
					}elseif ($print==4) {
						echo "Jeans";
					}
					?></h4>
					<!--<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filter By<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Low price</a></li> 
								<li><a href="#">High price</a></li>
								<li><a href="#">Latest</a></li> 
								<li><a href="#">Popular</a></li> 
							</ul> 
						</li>
					<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Brands<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#">Samsung</a></li> 
								<li><a href="#">LG</a></li>
								<li><a href="#">Sony</a></li> 
								<li><a href="#">Other</a></li> 
							</ul> 
						</li>
					</ul> -->
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
<?php            if(mysql_num_rows($result)==0){
					echo "<h4 style='margin-top:200px;'> <center>no products are available in this range...</center></h4>";}
				while ($ans=mysql_fetch_array($result)) {
				$result1=mysql_query("select spartid1,spartid2 from possibility where image='$ans[4]'");					
			$ans1=mysql_fetch_row($result1);
				?>
					<div class="col-md-4 product-grids"> 
						<div class="agile-products">
							<div class="new-tag" ><h6>New</h6></div>
							<a href="single.php?pid=<?php echo $ans[0]; ?>&spid1=<?php echo $ans1[0]; ?>&spid2=<?php echo $ans1[1]; ?>&pcate=<?php echo $ans[6]; ?>"><img src="image1/<?php echo $ans[4]; ?>" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5><a href="single.php?pid=<?php echo $ans1[0]; ?>&spid1=<?php echo $ans1[0]; ?>&spid2=<?php echo $ans1[1]; ?>"><?php echo $ans[1]; ?></a></h5> 
								<h6><?php echo "Rs.$ans[5]"; ?></h6> 
								<form action="single.php" method="get">
									<input type="hidden" name="pid" value="<?php echo $ans[0]; ?>" />
									<input type="hidden" name="spid1" value="<?php echo $ans1[0]; ?>" /> 
									<input type="hidden" name="spid2" value="<?php echo $ans1[1]; ?>" /> 
									 
									<button type="submit" class="w3ls-cart pw3ls-cart">View Product</button>
								</form> 
							</div>
						</div> 
					</div>
<?php } ?>
					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 
			
			</div>
			<div class="col-md-3 rsidebar" >
			<!--here js-->
			
		
		<script>function myc() {
	
	var checkboxes = document.getElementsByName('c');

for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      //  selected.push(checkboxes[i].value);
     // document.getElementById("hide").innerHTML =  checkboxes[i].value;
     	var val=checkboxes[i].value;	
    }} var cate="<?php echo  $cate; ?>";  
    document.location ="products.php?val="+val+"&cate="+cate;
}</script>

				<div class="rsidebar-top"    >
					<div class="slider-left" >
						<h4>Filter By Price</h4>            
						<div class="row row1 ">
							<label class="checkbox"><input type="checkbox"  onclick="myc()"  name="c" value="100"><i></i>0 - 100 </label>
							<label class="checkbox"><input type="checkbox" onclick="myc()"  name="c" value="200"><i></i>100 - 200 </label> 
							<label class="checkbox"><input type="checkbox" onclick="myc()" name="c" value="250"><i></i>200 - 250  </label> 
							<label class="checkbox"><input type="checkbox" onclick="myc()" name="c" value="300"><i></i>250 - 300 </label> 
							<label class="checkbox"><input type="checkbox" onclick="myc()"  name="c" value="400"><i></i>350 - 400 </label> 
							<label class="checkbox"><input type="checkbox" onclick="myc()" name="c" value="500"><i></i>450 - 500  </label> 
							<label class="checkbox"><input type="checkbox" onclick="myc()" name="c" value="50000"><i></i>All</label> 
						</div> 
					</div>
					<div class="sidebar-row" >
				
					
					<!--<ul class="faq">
							<li class="item1"><a href="#">Mobile phones<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Smart phones</a></li>										
									<li class="subitem1"><a href="#">Accessories</a></li>										
									<li class="subitem1"><a href="#">Tabs</a></li>										
								</ul>
							</li>
							<li class="item2"><a href="#">Large appliances<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#">Refrigerators </a></li>										
									<li class="subitem1"><a href="#">Washing Machine </a></li>										
									<li class="subitem1"><a href="#">Kitchen Appliances </a></li>										
									<li class="subitem1"><a href="#">Air Conditioner</a></li>										
								</ul>
							</li>
							<li class="item3"><a href="#">Entertainment<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#"> Tv & Accessories</a></li>										
									<li class="subitem1"><a href="#">Digital Camera </a></li>										
									<li class="subitem1"><a href="#">Computer</a></li>										
								</ul>
							</li>
						</ul>-->
						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div>
					<!--<div class="sidebar-row">
						<h4>DISCOUNTS</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Upto - 10% (20)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>70% - 60% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>50% - 40% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (5)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>30% - 20% (7)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>10% - 5% (2)</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other(50)</label>
						</div>
					</div>-->
<!--					<div class="sidebar-row" >
						<h4>Color</h4>
						<div class="row row1 ">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>White</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Pink</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Gold</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Blue</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Orange</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i> Brown</label> 
						</div>
					</div>-->			 
				</div>
				<div class="related-row">
					<h4>Related Searches</h4>
					<ul>
						<li><a href="products.php?cate=1">Watches </a></li>
						<li><a href="products.php?cate=2">Spectacles</a></li>
						<li><a href="products.php?cate=3">T-shirts</a></li>
						<li><a href="products.php?cate=4">Jeans</a></li>
						
					</ul>
				</div>
				<div class="related-row">
			<h4>COMING SOON</h4>
					<div class="galry-like">  
						<img src="images/f5.png" class="img-responsive" alt="img">             
						<br/>
						<h4><a href="products.php">JACKET</a></h4> 
						       <br/>
					<div class="galry-like">  
						<img src="images/f4.png" class="img-responsive" alt="img">             
						<br/>
						<h4><a href="products.php">Frokes</a></h4> 
					     <br/>
					</div>
					<div class="galry-like">  
						<img src="images/f8.png" class="img-responsive" alt="img">             
						<br/>
						<h4><a href="products.php">Capree</a></h4> 
					</div>
			</div>
			<div class="clearfix"> </div>
			<!-- recommendations -->

	<!--//products-->  
	<!-- footer-top -->
	
	</div></div></div></div><div class="container">
	<?php include("footer.php"); ?></div>
	<!-- //cart-js -->  
	<!-- menu js aim -->
	<script src="js/jquery.menu-aim.js"> </script>
	<script src="js/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.js"></script>
   
</body>
</html>
<?php include("conn.php");
session_start();
$abc=0;
if (isset($_SESSION['uid'])) {
/*if (isset($_GET['qtotal']) && $_GET['qtotal']=='click') {
		  $pid=$_GET['pid'];
		  $q=$_GET['q'];
		 $sp1=$_GET['sp1'];
		 $sp2=$_GET['sp2'];
	//	$p=$_POST['p'];
	//	$a=$q*$p;
		$res1=mysql_query("select * from parts where spartid=$sp1");
		$res2=mysql_query("select * from parts where spartid=$sp2");
		$ans1=mysql_fetch_array($res1);
		$ans2=mysql_fetch_array($res2);
	
		$temp1=$ans1['nparts']-$q;
		$temp2=$ans2['nparts']-$q;
			if ($temp1>=0 && $temp2>=0) {
				$abc=2;
					   	}
			else
			{
						$abc=1;				
			}

	}	*/

?>
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
<style type="text/css">
	
.login-body
{
	width: 100%;
	width: 960px;
	height: auto;
}
.top
{
	width: 100%;
	
}
</style>
</head>
<body>
	<!-- header --><?php include("header.php"); ?>
	<!-- products -->
<ol class="breadcrumb breadcrumb1">
					<li><a href="index.php">Home</a></li>
					<li><a href="products.php">Products</a></li>
				
						
					<li class="active">Cart</li>
				</ol>
				<div class="clearfix"> </div>
				
	<h3 class="w3ls-title w3ls-title1" style="padding-top:60px;">Check Out</h3> 
	<div class="row login-body">
<div class="" style="margin:4px auto;">
<table class="table table-hover top">
	<thead class="product-top top" style="color:white;">
	<th></th>
	<th><h4 style="padding-left: 40px;">Items</h4></th>
	<th><h4>Product Name</h4></th>
	<th><h4>Unit Price</h4></th>
	<th ><h4>Quantity</h4></th>
	<th></th>
	
	
	</thead>
	<tbody>
	<?php  
	
	$uid=$_SESSION['uid'];
	if(isset($_GET['proid'])){	
		 $ppid=$_GET['proid'];
		 $sp1=$_GET['sp1'];
		 $sp2=$_GET['sp2'];
	mysql_query("delete from carts where pid='$ppid' and uid='$uid' and spid1=$sp1 and spid2=$sp2");}

	$result=mysql_query("select * from carts where uid='$uid'");
	if(mysql_num_rows($result)==0)
	{
		echo "<tr><td colspan='5' style='text-align:center;padding-top:50px;'><h3 style='padding-left:70px;'> Your Cart Is Empty</h3></td></tr>";
	}
	while ($row=mysql_fetch_array($result)){
	
	?><tr>
	
	<td><a href="cart.php?proid=<?php echo $row[2]; ?>&sp1=<?php echo $row[8];?>&sp2=<?php echo $row[9]; ?>"><img src="image1/close1.png" style="padding-top:50px; "></a></td>
		<td><img src=<?php echo "image1/possibility/$row[11]/$row[10]"; ?> height=150px width=150px ></td>
		<td><h4 style="padding-top:50px;"><?php echo $row['pname'];?></h4></td>
		
		
		<td><h4 style="padding-top:50px;">Rs.<?php echo $row['price']; ?></h4></td>
		<td><h4 style="padding-top:50px;"><?php echo $row['qty']; ?></h4></td>
		</tr>
			
				
	<?php }	 ?></tbody>
	<?php if(mysql_num_rows($result)!=0)
	{?><tr><td colspan="5" style="text-align: center;"><a href="billform.php"><button  style="margin-top:40px;" class="btn btn-defalut">Buy now</button></a></td></tr><?php }?>

</table>
</div>
</div><br><br><div class="container">
<?php 
include("footer.php"); ?></div>
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
<?php 
}
else
{
	header("location:login.php");
}?>
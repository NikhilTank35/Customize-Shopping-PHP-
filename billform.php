<?php session_start(); ?><!DOCTYPE html>
<?php $abc=0;include("conn.php");
/*if (isset($_SESSION['uid'])) {
if (isset($_POST['ok'])) {
		$pid=$_POST['pro1'];
		 $q=$_POST['q'];
		$id=$_POST['id'];
		$p=$_POST['p'];
		$a=$q*$p;
		$res1=mysql_query("select * from product where pid=$pid");
		$ans1=mysql_fetch_array($res1);
		$temp=$ans1['nproducts']-$q;
			if ($temp>=0) {
				mysql_query("update product set nproducts=$temp where pid=$pid");
						mysql_query("update carts set net_amount=$a,qty=$q where cartid='$id'");
					   	}
			else
			{
						$abc=1;				
			}

	}*/	

?>

<html>
<head>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="css/ken-burns.css" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--select-->

<style>
.row{
float:left;

}
</style>
<script>
var states = new Array();

states['gujrat'] = new Array('jamnagar','rajkot','ahemdabad');
states['maharastra'] = new Array('mumbai','Chihuahua','Jalisco');
states['United States'] = new Array('California','Florida','New York');


function setStates() {
  cntrySel = document.getElementById('country');
  stateList = states[cntrySel.value];
  changeSelect('state', stateList, stateList);
  setCities();
}

function setCities() {
  cntrySel = document.getElementById('country');
  stateSel = document.getElementById('state');
  cityList = cities[cntrySel.value][stateSel.value];
  changeSelect('city', cityList, cityList);
}

function changeSelect(fieldID, newOptions, newValues) {
  selectField = document.getElementById(fieldID);
  selectField.options.length = 0;
  for (i=0; i<newOptions.length; i++) {
    selectField.options[selectField.length] = new Option(newOptions[i], newValues[i]);
  }
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

addLoadEvent(function() {
  setStates();
});
</script>
<style type="text/css">
  .btn:hover{
    background:#ff5d56;
    color:white;
  }
  .well
  {
    background:#ff5d56;
    color:white; 
  }
</style>
<!--select-->
	<title></title>
	
</head>
<body >
<img src="image1/final.png" style="margin:10px 600px;" />
<br><?php 
$uid=$_SESSION['uid'];

$res=mysql_query("select * from login where uid='$uid'");
$qq=mysql_fetch_row($res);
?>
<div class="container" >

<div class="col-md-5" >
<form role="form" action="billg.php" method="post" ><input type="hidden" name="pid" value="<?php echo $pid; ?>">
<div class="form-group">
<div class="well">Enter Your Detail</div>
<label for="name">First Name</label>
<input type="text" class="form-control" id="name" value="<?php echo $qq[1];?>" name="fname">
</div>
<div class="form-group">
<label for="name">Last Name</label>
<input type="text" class="form-control" id="name"
 value="<?php echo $qq[2]; ?>" name="lname">
</div>
<div class="form-group">
<label for="name">E-mail</label>
<input type="email" class="form-control" id="name"
 value="<?php echo $qq[4]; ?>" name="email" disabled>
</div>
<div class="form-group">
<label for="name">Mobile</label>
<input type="text" class="form-control" id="name"
  value="<?php echo $qq[3]; ?>" name="mno">
</div><?php 
 $code=mysql_query("select promocode,usep from login where uid='$uid'");
$codef=mysql_fetch_row($code);
  if (mysql_num_rows($code)==1) {
    
  
?>
<div class="form-group">
<label for="name">Offer Code</label><input type="text" class="form-control" id="name"
 value="<?php  echo $codef[0]; ?>"  disabled><input type="hidden" class="form-control" id="name"
 value="<?php  echo $codef[0]; ?>" name="co">
</div><?php } ?>
</div>




<div class="col-md-7" >

<div class="form-group">
<div class="well">Payment Details For Cash on Delivery</div>
<div class="form-group">
<label for="name">Shipping address</label>
<textarea class="form-control" id="name" rows="4" 
 placeholder="Enter your Address" name="add"></textarea>
</div>

<div class="form-group">
<label for="name">State</label>
<select name="state" id="country" onchange="setStates();"  class="form-control">
	 <option value="gujrat">gujrat</option>
  <option value="maharastra">maharastra</option>
</select>
</div>
<div class="form-group">
<label for="name">City</label>
<select name="city" id="state" onchange="setCities();" class="form-control">
  <option value="">Please select a Country</option>
</select>
</div>
<?php if (mysql_num_rows($code)==1) {
    ?>
<div class="form-group" >
<label for="name">Enter your Offer  Code</label>
<input  type="text" class="form-control" id="name" name="ecode">
</div><?php } ?>
</div>
<input type="submit" value="BUY  >>"   name="buy" class="btn btn-defalut">
</form></div></div>
</body>
</html>
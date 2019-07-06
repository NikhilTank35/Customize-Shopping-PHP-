<?php
session_start();
ob_start();
include("conn.php");
if(isset($_SESSION['uid'])  && isset($_POST['buy']))
{   
echo $uid=$_SESSION['uid'];
$res1=mysql_query("select * from carts where uid='$uid'");
$num=mysql_num_rows($res1);
 $sid=session_id();

	
	echo $fname=$_POST['fname'];
	echo $lname=$_POST['lname'];
	

	
	echo $address=$_POST['add'];
	echo $city=$_POST['city'];$mno=$_POST['mno'];
	echo $state=$_POST['state'];
	
	if(isset($_POST['co'])){  
	echo $code=$_POST['co'];
	echo $ecode=$_POST['ecode'];
	
	if($ecode==$code)
	{		
		
		$_SESSION['promo']=$code;
			}}

for($i=0;$i<$num;$i++)
{$cart=mysql_fetch_array($res1);
	$pid[$i]=$cart['pid'];
	$sp1[$i]=$cart['spid1'];
	$sp2[$i]=$cart['spid2'];
	$pname[$i]=$cart['pname'];
	$price[$i]=$cart['price'];
	$net[$i]=$cart['net_amount'];
	$qty[$i]=$cart['qty'];
	$dt=date("y/m/d");

mysql_query("insert into buy values('',$pid[$i],'$uid','$fname','$lname','$city','$address',$mno,'$pname[$i]',$price[$i],'$net[$i]','$qty[$i]','$dt','$sid',$sp1[$i],$sp2[$i])");
$ssp1=mysql_query("select nparts from parts where spartid=$sp1[$i];");
$ssp2=mysql_query("select nparts from parts where spartid=$sp2[$i];");
$sp1np=mysql_fetch_array($ssp1)[0];
$sp2np=mysql_fetch_array($ssp2)[0];
$sp1np=$sp1np-$qty[$i];
$sp2np=$sp2np-$qty[$i];
mysql_query("update parts set nparts=$sp1np where spartid=$sp1[$i]");
mysql_query("update parts set nparts=$sp2np where spartid=$sp2[$i]");

}
mysql_query("delete from carts where uid='$uid'");

header("location:bill.php");
}
else
{

	header("location:index.php");
}



?>
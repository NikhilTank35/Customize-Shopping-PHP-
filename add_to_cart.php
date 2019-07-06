<?php include("conn.php");
	session_start();
	if (isset($_SESSION['uid'])) {
		
	
	$pid=$_REQUEST["pid"];
 $uid=$_SESSION["uid"];
 $sp1=$_REQUEST["sp1"];
	$sp2=$_REQUEST["sp2"];
	 $q=$_REQUEST['q'];

	if (isset($_POST['wish'])) {
		
	mysql_query("delete from wishlist where pid=$pid and uid='$uid' and spid1=$sp1 and spid2=$sp2");
	}
		
	
	
	echo $dt=date("y/m/d");
	$sid=session_id();
	$res=mysql_query("select price,pname from product where pid=$pid",$con);
	$res1=mysql_query("select * from possibility where spartid1=$sp1 and spartid2=$sp2 ",$con);
	$che=mysql_query("select * from carts where spid1=$sp1 and spid2=$sp2 and uid='$uid'");
		$row=mysql_fetch_row($res);

	$price=$row[0];
	if(mysql_num_rows($che)==0)
	{
	$row1=mysql_fetch_row($res1);
	//echo $_SESSION['fi']=$row1[1];
	
	$net=$price*$q;
	$che1=mysql_fetch_array($che);

	$ans=mysql_query("insert into carts values('','$uid',$pid,'$dt','$sid',$q,$price,$net,$sp1,$sp2,'$row1[4]',$row1[1],'$row[1]')",$con);
	if($ans)
		//echo "success";
			header("location:cart.php");
	else
		echo "not";

}
else

{
			$net=$price*$q;

		mysql_query("update carts set qty=$q,net_amount=$net where spid1=$sp1 and spid2=$sp2");
	header("location:cart.php");
}

	}else{header("location:login.php");}
?>
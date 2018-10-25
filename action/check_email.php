<?php 
include_once("../inc/connection.php");
$obj=new connection();
$obj->connect();
if(isset($_REQUEST["q"]))
{
	$q=$_REQUEST["q"];

	$obj->query="select * from registration where email='".$q."'";
	$obj->select($obj->query);
	if(mysqli_num_rows($obj->result)>0)
	{
		echo "<font color='#FF0000'>Email already registered!</font>";
	}
}
if(isset($_REQUEST["p"]))
{
	$q=$_REQUEST["p"];

	$obj->query="select * from registration where mobile='".$q."'";
	$obj->select($obj->query);
	if(mysqli_num_rows($obj->result)>0)
	{
		echo "<font color='#FF0000'>Mobile already registered!</font>";
	}
}

if(isset($_REQUEST["r"]))
{
	$r=$_REQUEST["r"];
	$obj->query="select * from registration where reg_id !='".$_REQUEST["reg_id"]."' and email='".$r."'";
	$obj->select($obj->query);
	if(mysqli_num_rows($obj->result)>0)
	{
		echo "<font color='#FF0000'>Email already registered!</font>";
	}
}
if(isset($_REQUEST["s"]))
{
	$s=$_REQUEST["s"];

	$obj->query="select * from registration where reg_id !='".$_REQUEST["reg_id"]."' and mobile='".$s."'";
	$obj->select($obj->query);
	if(mysqli_num_rows($obj->result)>0)
	{
		echo "<font color='#FF0000'>Mobile already registered!</font>";
	}
}
?>
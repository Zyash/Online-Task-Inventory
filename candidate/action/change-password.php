<?php 
session_start();
include("../../inc/connection.php");
$obj=new connection();
$obj->connect();
if(isset($_SESSION["id"]))
{
	if(isset($_POST["btnchange"]))
	{
		$password=$_POST["txtpass1"];
		$obj->query="update login_details set password=md5('".$password."') where reg_id=".$_SESSION["id"];
		$obj->insert_update_delete($obj->query);
?>
		<script>
			alert("password sucessfully updated");
			window.location="../index.php";
		</script>
<?php
	}
	else
	{
		header("../index.php?page=change-password.php");
	}
}else
{
?>
<script>
	alert("Please Login first!");
	window.location="../../index.php?page=login.php";
</script>
<?php
}
?>
<?php 
session_start();
if(!isset($_SESSION["id"]))
{
?>
	<script>
		alert("please! login first!");
		window.location="../../index.php?page=login.php";
	</script>
<?php
}else
{
	include_once("../../inc/connection.php");

	if(isset($_POST["submit"]))
	{
		$obj=new connection();
		$obj->connect();
		extract($_POST);
		
		$obj->query="update registration set name='".$txtfname."',email='".$txtemail."',mobile='".$txtphone."',
		address='".$txtaddress."',state_id='".$drpstate."',city_id='".$drpcity."',sec_que_id='".$drpque."',sec_answer='".$txtsec_ans."' 
		where reg_id=".$_SESSION["id"];
		$obj->insert_update_delete($obj->query);
		
		$obj->query="update login_details set username='".$txtemail."' where reg_id=".$_SESSION["id"];
		$obj->insert_update_delete($obj->query);
		
?>
		<script>
			alert("information updated successfully");
			window.location="../index.php";
		</script>
<?php
	}
}
?>
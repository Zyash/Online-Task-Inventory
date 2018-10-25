<?php
session_start();
if(!isset($_SESSION["admin_id"]))
{
?>
	<script>
		alert("Please! Login First...");
        window.location="../../index.php?page=login.php";
    </script>
<?php 
}else
{
	echo "Please wait.....";
	include_once("../../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	if(isset($_POST["btnupdate"]))
	{
		$paper_name=$_POST["txtpname"];
		$obj->query="update paperset set paper_name='".$paper_name."' where paper_id=".$_POST["hdnpid"];
		$obj->insert_update_delete($obj->query);
?>
		<script>
        	alert("paperset updated secessfully");
			window.location="../add-paperset.php";
        </script>
<?php
	}else
	{
		header("location:../add-paperset.php");
	}
	
}
?>
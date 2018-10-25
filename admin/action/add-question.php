<?php
session_start();
if(!isset($_SESSION["admin_id"]))
{
?>
	<script>alert("Please! Login First...");
        window.location="../../index.php?page=login.php";
    </script>
<?php 
}
else
{
	include_once("../../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	if(isset($_POST["btnnext"]))
	{
		extract($_POST);
		$obj->query="insert into que_master(`question`,`marks`,`paper_id`) values('".$txtquestion."',".$txtmarks.",".$drppaper.")";
		$obj->insert_update_delete($obj->query);
		
		$obj->query="select max(que_id)'que_id' from que_master";
		$obj->select($obj->query);
		$row=mysqli_fetch_assoc($obj->result);
		$que_id=$row["que_id"];
		
		$obj->query="insert into ans_master (`que_id`,`que_option`) values (".$que_id.",'".$txtop1."'),(".$que_id.",'".$txtop2."'),(".$que_id.",'".$txtop3."'),(".$que_id.",'".$txtop4."')";
		$obj->insert_update_delete($obj->query);
		
		header("location:../choose-answer.php?q=".$que_id);
	}
	if(isset($_POST["save"]))
	{
		extract($_POST);
		
		$obj->query="update que_master set correct_op_id=".$rdoanswer." where que_id=".$hdnqid;
		$obj->insert_update_delete($obj->query);
?>
		<script>
			alert("Question sucessfully added.");
        	window.location="../add-question.php";
   		</script>
<?php
	}
}
?>
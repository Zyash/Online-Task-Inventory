<?php 
include_once("../../inc/connection.php");
$obj=new connection();
$obj->connect();
if(isset($_POST["btnapprove"]))
{
	$query_id=$_POST["hdnl_id"];
	$obj->query="update query_details set status='approve' where q_id=".$query_id;
	$obj->insert_update_delete($obj->query);
	
	header("location:../view_query.php");
}
else
if(isset($_POST["btndecline"]))
{
	$query_id=$_POST["hdnl_id"];
	$obj->query="update query_details set status='Decline' where q_id=".$query_id;
	$obj->insert_update_delete($obj->query);
	header("location:../view_query.php");
}


?>
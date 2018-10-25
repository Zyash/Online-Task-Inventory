<?php 
include_once("../../inc/connection.php");
$obj=new connection();
$obj->connect();
if(isset($_POST["btnapprove"]))
{
	$leave_id=$_POST["hdnl_id"];
	$obj->query="update leave_details set status='approve' where l_id=".$leave_id;
	$obj->insert_update_delete($obj->query);
	header("location:../pending-leave.php");
}
else
if(isset($_POST["btndecline"]))
{
	$leave_id=$_POST["hdnl_id"];
	$obj->query="update leave_details set status='Decline' where l_id=".$leave_id;
	$obj->insert_update_delete($obj->query);
	header("location:../pending-leave.php");
}


?>
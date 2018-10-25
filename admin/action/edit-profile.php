<?php 
session_start();
if(isset($_POST["btnsave"]))
{
	echo "<h4>Please wait.....</h4>";
	include("../../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	extract($_POST);
	$admin_id=$_SESSION["admin_id"];
	
	
	$obj->query="UPDATE registration SET name = '".$_REQUEST["txtname"]."', email = '".$_REQUEST["txtemail"]."', mobile = '".$_REQUEST["txtphone"]."', address = '".$_REQUEST["txtaddress"]."', gender = '".$_REQUEST["rdogender"]."', dob = '".$_REQUEST["txtdate"]."', state_id = '".$_REQUEST["drpstate"]."', city_id = '".$_REQUEST["drpcity"]."' where reg_id = ".$admin_id."";
	$obj->insert_update_delete($obj->query);

	
	// if(isset($hdnreg_id))
	// {
	// 	$obj->query="update cnd_call set status=1 where reg_id='".$hdnreg_id."' ";
	// 	$obj->insert_update_delete($obj->query);
	
	// }
?>
	<script>
		alert("record added!");
		window.location="../admin_editprofile.php";
	</script>
<?php 
	
}
else
{
?>
	<script>
		alert("Something went wrong please try again!");
		window.location="../admin_editprofile.php";
	</script>
<?php 
}
?>
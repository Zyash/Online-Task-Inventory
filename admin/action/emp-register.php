<?php 
if(isset($_POST["btnregister"]))
{
	echo "<h4>Please wait.....</h4>";
	include("../../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	extract($_POST);
	
	$obj->query="insert into registration 
	(`name`,`email`,`mobile`,`address`,`gender`,`dob`,`state_id`,`city_id`)
	values ('".$txtname."','".$txtemail."',".$txtphone.",'".$txtaddress."','".$rdogender."','".$txtdate."','".$drpstate."','".$drpcity."')";
	$obj->insert_update_delete($obj->query);
	
	if(isset($hdnreg_id))
	{
		$obj->query="update cnd_call set status=1 where reg_id=".$hdnreg_id;
		$obj->insert_update_delete($obj->query);
	
	}
?>
	<script>
		alert("record added!");
		window.location="../emp_registration.php";
	</script>
<?php 
	
}
else
{
?>
	<script>
		alert("Something went wrong please try again!");
		window.location="../emp_registration.php";
	</script>
<?php 
}
?>
<?php 
include("../../inc/connection.php");
	$obj=new connection();
	$obj->connect();
$obj->query="SELECT * FROM login_details";
$obj->select($obj->query);
$row=mysqli_fetch_array($obj->result);
if(isset($_POST["btnregister"]))
{
	
	
	extract($_POST);
	if($row['password']== $_REQUEST["txtopass"] && $_REQUEST["txtnpass"]== $_REQUEST["txtcpass"])
   	{
	$obj->query="UPDATE login_details SET password='".$_REQUEST["txtnpass"]."' where password='".$_REQUEST["txtopass"]."'";
	$obj->insert_update_delete($obj->query);
	echo "<script>alert('Data Updated');document.location='../admin_changepwd.php';</script>";

	}
	else
	{
		echo "<script>alert('Invalid Username And Password');</script>";
	}
	
	/*if(isset($hdnreg_id))
	{
		$obj->query="update cnd_call set status=1 where reg_id=".$hdnreg_id;
		$obj->insert_update_delete($obj->query);

	
	}*/
?>

<?php 
	
}
else
{
?>
	<script>
		alert("Something went wrong please try again!");
		window.location="../admin_changepwd.php";
	</script>
<?php 
}
?>
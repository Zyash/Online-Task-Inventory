<?php 
if(isset($_POST["register"]))
{
	echo "<h4>Please wait.....</h4>";
	include("../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	extract($_POST);
	
	switch($drpexperience)
	{
		case 1: $experience="Fresher";
		break;
		case 2: $experience="less than 2 years";
		break;
		case 3: $experience="5 years";
		break;
		case 4: $experience="more than 5 years";
		break;
	}
	$path=$txtfname."-".$_FILES["fimg"]["name"];
	if(move_uploaded_file($_FILES["fimg"]["tmp_name"],"../candidate/resume/".$path))
	{
	$obj->query="insert into registration 
	(`name`,`email`,`mobile`,`address`,`gender`,`dob`,`state_id`,`city_id`,`resume`,`yr_of_exp`,`sec_que_id`,`sec_answer`)
	 values ('".$txtfname." ".$txtlname."','".$txtemail."',".$txtphone.",'".$txtaddress."','".$rdogender."','".$txtdate."','".$drpstate."','".$drpcity."','".$path."','".$experience."','".$drpque."','".$txtsec_ans."')";
	$obj->insert_update_delete($obj->query);
	$obj->query="select max(reg_id)'reg_id' from registration";
	$obj->select($obj->query);
	$row=mysqli_fetch_assoc($obj->result);
	$reg_id=$row["reg_id"];
	
	$obj->query="insert into login_details (`reg_id`,`username`,`password`,`type`,`status`) values (".$reg_id.",'".$txtemail."','".$txtpassword."','CD',1)";
	$obj->insert_update_delete($obj->query);
	
	$obj->query="insert into paper_stat (`reg_id`,`paper_status`) VALUES (".$reg_id.",0)";
	echo $obj->query;
	$obj->insert_update_delete($obj->query);
?>
	<script>
		alert("registered sucessfully");
		window.location="../index.php?page=login.php";
	</script>    
<?php
	}else
	{
?>
<script>
			alert("error while uploading resume please try again!");
			window.location="../../index.php?page=registration.php";
		</script>
<?php
	}
}
else
{
?>
	<script>
		window.location="index.php?page=registration.php";
	</script>
<?php 
}
?>
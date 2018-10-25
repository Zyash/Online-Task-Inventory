<?php 
include_once("../inc/connection.php");
$obj=new connection();
$obj->connect();
$con=new connection();
$con->connect();

if(isset($_REQUEST["q"]))
{
	$q=$_REQUEST["q"];

	$obj->query="select sec_que_id from registration where email='".$q."'";
	$obj->select($obj->query);
	$row=mysqli_fetch_assoc($obj->result);
 
	$con->query="select * from sec_que";
	$con->select($con->query);
	?><option value="0">--select security question--</option><?php
	while($row1=mysqli_fetch_assoc($con->result))
	{
		if($row1['sec_que_id']== $row['sec_que_id'])
		{
	?>
		<option value="<?php echo $row1["sec_que_id"];?>" selected="selected"><?php echo $row1["sec_question"];?></option>
	<?php
		}else{
	?>
		<option value="<?php echo $row1["sec_que_id"];?>"><?php echo $row1["sec_question"];?></option>
	<?php
		}
	}
}
?>
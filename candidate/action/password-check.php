<?php 
session_start();
include("../../inc/connection.php");
$obj=new connection();
$obj->connect();
if(isset($_SESSION["id"]))
{
	if(isset($_POST["btnnext"]))
	{
		$obj->query="select * from login_details where reg_id=".$_SESSION["id"];
		//echo $obj->query;
		$obj->select($obj->query);
		$row=mysqli_fetch_assoc($obj->result);
		if($row["password"]==md5($_POST["txtpassword"]))
		{
			header("location:../index.php?page=reset-password.php");
		}
		else
		{
?>
		<script>
			alert("please input correct password!");
			window.location="../index.php?page=change-password.php";
		</script>
<?php			
		}
	}else
	{
?>
	<script>
        alert("first input your old password!");
        window.location="../index.php?page=change-password.php";
    </script>
<?php			
	}
}else
{
?>
<script>
        alert("login first!");
        window.location="../index.php?page=login.php";
</script>
<?php
}
?>

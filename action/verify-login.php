<?php
	session_start();
	include_once("../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	 
if(isset($_POST["btnlogin"]))
{
	extract($_POST);
	$obj->query="select * from login_details where username='".$txtusername."' and password='".$txtpassword."'";
	$obj->select($obj->query);
	$no=mysqli_num_rows($obj->result);
	$row=mysqli_fetch_assoc($obj->result);
	if($no>0)
	{
		if($row["status"]==1)
		{
		/*echo "<script>alert('Login Successfully');</script>";*/
			$type=$row['type'];
			echo $type;
			if($type=="CD")
			{
				$_SESSION["user_id"]=$row["reg_id"];
				/*$_SESSION["paper_id"]=1;*/
				
				$obj->query="select * from paperset ORDER BY rand() limit 0,1";
				$obj->select($obj->query);
				$rowp=mysqli_fetch_assoc($obj->result);
				$_SESSION["paper_id"]=$rowp["paper_id"];
				
				header("location:../candidate/index.php");
				
			}else 
			if($type=="manager")
			{
				$_SESSION["admin_id"]=$row["reg_id"];
				header("location:../manager/index.php");
			}else
			if($type=="SD")
			{
				$_SESSION["emp_id"]=$row["reg_id"];
				header("location:../emp/index.php");
			}
			else
			if($type=="admin")
			{
				$_SESSION["admin_id"]=$row["reg_id"];
				header("location:../admin/index.php");
			}

		}else
		{
		?>
        <script>
        	alert("sorry! your account has been deactivated..please contact to administrative department!");
			window.location="../index.php?page=login.php";
        </script>
        <?php
		}
	
	}else
	{
?>
	<script>
		alert('wrong username or password');
		window.location="../index.php?page=login.php";
	</script>
<?php
	}
}
?>
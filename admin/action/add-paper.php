<?php 
session_start();
if(!isset($_SESSION["admin_id"]))
{
?>
	<script>alert("Please! Login First...");
        window.location="../index.php?page=login.php";
    </script>
<?php 
}else
{
	if(isset($_POST["submit"]))
	{
		$paper_name=strtoupper($_POST["txtpname"]);
		$flag=0;
		include_once("../../inc/connection.php");
		$obj=new connection();
		$obj->connect();
		$obj->query="select * from paperset";
		$obj->select($obj->query);
		while($row=mysqli_fetch_assoc($obj->result))
		{
			if($row["paper_name"]==$paper_name)
			{
				$flag=1;
?>
				<script>
                	alert("paper already exists!");
					window.location="../add-paperset.php";
                </script>
<?php
			break;
			}
			
		}
		if($flag==0)
		{
			$obj->query="insert into paperset (`paper_name`) VALUES ('".$paper_name."')";
			$obj->insert_update_delete($obj->query);
			header("Location:../add-paperset.php");
		}
		
	}
}
?>
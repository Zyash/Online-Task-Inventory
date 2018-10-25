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
	include_once("../inc/connection.php");
	$obj=new connection();
	$obj->connect();
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>WORKFLOW | Leave Management</title>
    <link href="../css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	
	<body>
	<?php 
		$admin_id=$_SESSION["admin_id"];
		$obj->query="select * from registration where reg_id=".$admin_id;
		$obj->select($obj->query);
		$row=mysqli_fetch_assoc($obj->result);
		$admin_name=$row["name"];
	?>
  <!--header -->
    <div id="wrapper">
  <?php include_once("inc/header.php");?>
  <!--/header -->
  <div id="containerHolder">
    <div id="container">
     
      <!-- h2 stays for breadcrumbs -->
        <h2>Leave Management &raquo; <a href="#" class="active"> Pending leaves</a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
        
          	<br />
          	<div class="dasboard_text">
            <?php 
              	$obj->query="select * from leave_details where status='pending'";
				//echo $obj->query;
				$obj->select($obj->query);
				if(mysqli_num_rows($obj->result)>0)
				{
					while($row=mysqli_fetch_assoc($obj->result))
					{
				?>
                		<div class="pull-right"><small><i>
                        <?php 
						$applied_day=$row["date_apply"];
						$today=date("Y-m-d");
						$diff=abs(strtotime($today)-strtotime($applied_day));
						$years=floor($diff/(365*60*60*24));
						$months=floor(($diff-$years*365*60*60*24)/(30*60*60*24));
						$days=floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24));
						if(strtotime($applied_day)==$today)
						{
							echo "today";
						}
						?>
                        
                        </i></small></div>
						<fieldset>
						<legend><?php echo strtoupper($row["leave_type"]);?></legend>
						<li><h3><?php echo $row["emp_name"];?></h3></li>
                        <ul>
							<li class="pull-right"><?php echo $days."day(s) ago";?></li>
                            <li>START: <?php echo $row["start_date"]?></li>
							<li>END:<?php echo $row["end_date"];?></li>
                            <li>Reason: <?php echo $row["reason"]?></li>
                            <li>
                            <form name="frm" method="post" action="action/leave-status.php">
                            <input type="hidden" name="hdnl_id" value="<?php echo $row["l_id"]?>" />
                            <!-- <button type="submit" name="btnapprove" value="approve" class="button-submit">
                            	<i class="fa fa-check"></i> Approve
                            </button> -->
                            </form>
                            </li>
                            <li>
                            <form name="frm" method="post" action="action/leave-status.php">
                            <input type="hidden" name="hdnl_id" value="<?php echo $row["l_id"]?>" />
                            <!-- <button type="submit" name="btndecline" value="decline" class="button-decline">
                            	<i class="fa fa-close"></i> Decline
                            </button> -->
                            </form>
                           	 </li>
						</ul>
						</fieldset>
                 <?php
					}
				}else
				{
					echo "No pending leaves....";
				}
              ?>
            </div>
        </div>
        <!-- end of content-->
        
      <div class="clear"></div>
    </div>
  </div>
  <?php //include "footer.php" ?>
</div>
    
	<!-- <center>
		<a href="index.php">Home</a>&nbsp;&nbsp;
		<a href="index.php?page=questions.php">Questions</a>&nbsp;&nbsp;
		<a href="../action/logout.php" onClick="return conformation()">Logout</a>&nbsp;&nbsp;
    </center>
 -->    <script>
    	function conformation()
		{
			if(confirm("are you sure you want to logout?"))
			{
				return true;
			}else
				return false;
		}
    </script>
	<?php 
	if(isset($_REQUEST["page"]))
	{
		include($_REQUEST["page"]);
	}
	else
	{
		include("home.php");
	}
	?>
	</body>
	</html>
<?php 
}
?>
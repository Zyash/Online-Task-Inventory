<?php 

	$file_array = explode("/",$_SERVER['SCRIPT_NAME']);
	
	$file_name = $file_array[count($file_array)-1];
	
?>

<a href="#" style="text-decoration:none;"><h3 class="logo_inner_mar">WORKFLOW</h3></a>

<p style="float:right; font-size:12px; font-weight:bold; margin-top:-10px; color:#E7F1FD;"> Welcome
	<?php echo $_SESSION["admin_id"];?> <span style="color: #fff;"></span> </p>
  <br/>
<!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->

<ul id="mainNav">

	<?php 
  	if($file_name=="index.php"||  $file_name=="admin_changepwd.php" || $file_name=="admin_editprofile.php") 
	{ 
	?>
  		<li> <a href="index.php" class="active"><i class="fa fa-user"></i> Accounts</a></li>
	<?php 
	} 
	else{ 
	?>
  		<li> <a href="index.php" ><i class="fa fa-user"></i> Accounts</a> </li>
	<?php } ?>
  
	<?php 
	if($file_name=="view_leave.php" || $file_name=="pending-leave.php") 
	{ 
	?>
		<li> <a href="view_leave.php" class="active"><i class="fa fa-send"></i> Leave management</a></li>
	<?php 
	}
	else { 
	?>
		<li> <a href="view_leave.php"><i class="fa fa-send"></i> Leave management</a> </li>
	<?php } ?>
  
	<!-- <?php 
	if($file_name=="call.php" || $file_name=="first-call.php") 
	{ 
	?>
		<li> <a href="call.php" class="active"><i class="fa fa-mortar-board"></i> Call of candidate</a></li>
	<?php 
	}
	else { 
	?>
		<li> <a href="call.php" ><i class="fa fa-mortar-board"></i> Call of candidate</a> </li>
	<?php } ?>
  
	<?php 
	if($file_name=="data_manage.php" || $file_name=="add-paperset.php" || $file_name=="add-question.php" || $file_name=="choose-answer.php" || $file_name == "view-question.php") 
	{ 
	?>
		<li> <a href="data_manage.php" class="active"><i class="fa fa-database"></i> Data management</a></li>
	<?php 
	}
	else { 
	?>
		<li> <a href="data_manage.php" ><i class="fa fa-database"></i> Data management</a> </li>
	<?php } ?> -->
  
	<?php 
	if($file_name=="view_query.php" || $file_name=="pending-query.php") 
	{ 
	?>
		<li> <a href="view_query.php" class="active"><i class="fa fa-send"></i> Query management</a></li>
	<?php 
	}
	else { 
	?>
		<li> <a href="view_query.php"><i class="fa fa-send"></i> Query management</a> </li>
	<?php } ?>
	<?php 
	if($file_name=="payslip.php") 
	{ 
	?>
		<li> <a href="payslip-gen.php" class="active"><i class="fa fa-send"></i> Payslip </a></li>
	<?php 
	}else { 
	?>
		<li> <a href="payslip-gen.php" ><i class="fa fa-send"></i> Payslip</a> </li>
	<?php } ?>

	<?php 
	if($file_name=="event.php" || $file_name=="event-add.php"|| $file_name=="view-event.php") 
	{ 
	?>
		<li> <a href="event.php" class="active"><i class="fa fa-comments"></i> Event</a></li>
	<?php 
	}else { 
	?>
		<li> <a href="event.php" ><i class="fa fa-comments"></i> Event </a> </li>
	<?php } ?>
    <?php 
	if($file_name=="feedback_view.php") 
	{ 
	?>
		<li> <a href="feedback_view.php" class="active"><i class="fa fa-comments"></i> Feedbacks</a></li>
	<?php 
	}else { 
	?>
		<li> <a href="feedback_view.php" ><i class="fa fa-comments"></i> Feedbacks</a> </li>
	<?php } ?>
  
		<li class="logout"><a href="../action/logout.php?add=y" onClick="return check();"><i class="fa fa-sign-out"></i> Logout</a></li>        
</ul>
<script>
function check()
{
	if(confirm("you sure you want to logout?"))
	{
		return true;
	}else
	{
		return false;
	}
}
</script>
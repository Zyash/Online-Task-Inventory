<?php
	$file_array = explode("/",$_SERVER['SCRIPT_NAME']);
	$file_name = $file_array[count($file_array)-1];
?>
<div id="sidebar">
  <ul class="sideNav">
<? /****************************************** Dashboard **********************************/ ?> 	  
       <?php if($file_name == "index.php") { ?>
            <li><a class="active" href="index.php">Dashboard</a></li>
            <li><a href="emp_registration.php">New Employee</a></li>
            <li><a href="admin_changepwd.php">Change Password</a></li>
            <li><a  href="admin_editprofile.php">Edit Profile</a></li>
    	<?php } else if($file_name=="emp_registration.php") { ?>
            <li><a  href="index.php">Dashboard</a></li>
            <li><a class="active" href="emp_registration.php">New Employee</a></li>
            <li><a href="admin_changepwd.php">Change Password</a></li>
            <li><a  href="admin_editprofile.php">Edit Profile</a></li>
		<?php } else if($file_name == "admin_changepwd.php") { ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="emp_registration.php">New Employee</a></li>
            <li><a class="active" href="admin_changepwd.php">Change Password</a></li>
            <li><a  href="admin_editprofile.php">Edit Profile</a></li>
		<?php } else if( $file_name=="admin_editprofile.php") { ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="emp_registration.php">New Employee</a></li>
            <li><a  href="admin_changepwd.php">Change Password</a></li>
            <li><a  class="active" href="admin_editprofile.php">Edit Profile</a></li>
        
        
<? /****************************************** data management **********************************/ ?> 
        <?php }else if($file_name=="data_manage.php"){ ?>
        	<li><a href="data_manage.php" class="active">Data</a></li>
            <li><a href="add-paperset.php">Add paperset</a></li>
            <li><a href="add-question.php">Add Questions</a></li>
            <li><a href="view-question.php">View Questions</a></li>
        <?php }else if($file_name=="add-paperset.php"){ ?>
        	<li><a href="data_manage.php">Data</a></li>
            <li><a href="add-paperset.php" class="active">Add paperset</a></li>
            <li><a href="add-question.php">Add Questions</a></li>
            <li><a href="view-question.php">View Questions</a></li>
        <?php }else if($file_name=="add-question.php" || $file_name=="choose-answer.php"){ ?>
        	<li><a href="data_manage.php">Data</a></li>
            <li><a href="add-paperset.php">Add paperset</a></li>
            <li><a href="add-question.php" class="active">Add Questions</a></li>
            <li><a href="view-question.php">View Questions</a></li>
        <?php }else if($file_name=="view-question.php"){ ?>
        	<li><a href="data_manage.php">Data</a></li>
            <li><a href="add-paperset.php">Add paperset</a></li>
            <li><a href="add-question.php">Add Questions</a></li>
            <li><a href="view-question.php" class="active">View Questions</a></li>    
<? /****************************************** Leave management **********************************/ ?> 
        <?php }else if($file_name=="view_leave.php"){ ?>
        	<li><a href="view_leave.php" class="active">Leave</a></li>
            <li><a href="pending-leave.php">Pending Leaves</a></li>
        <?php }else if($file_name=="pending-leave.php"){ ?>
        	<li><a href="view_leave.php">Leaves</a></li>
            <li><a href="pending-leave.php" class="active">Pending Leaveas</a></li>  
 
<? /****************************************** Leave management **********************************/ ?> 
        <?php }else if($file_name=="call.php"){ ?>
        	<li><a href="call.php" class="active">Call Home</a></li>
            <li><a href="first-call.php">First Call</a></li>
            <li><a href="second-call.php">Second Call</a></li>
        <?php }else if($file_name=="first-call.php"){ ?>
        	<li><a href="call.php">Call Home</a></li>
            <li><a href="first-call.php" class="active">First Call</a></li>  
            <li><a href="second-call.php">Second Call</a></li>
		<?php }else if($file_name=="second-call.php"){ ?>
        	<li><a href="call.php">Call Home</a></li>
            <li><a href="first-call.php">First Call</a></li>
            <li><a href="second-call.php" class="active">Second Call</a></li>
      	<?php } ?> 
     </ul>
</div>

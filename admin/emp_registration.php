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
	
	$con=new connection();
	$con->connect();
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Registration | WORKFLOW</title>
    <link href="../css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- AJAX script -->
	<script src="../js/AJAX.js" language="javascript" type="text/javascript"></script>
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
      <div id="sidebar">
        <?php include "inc/column_left.php" ?>
      </div>
      <!-- h2 stays for breadcrumbs -->
        <h2>Accounts &raquo; <a href="#" class="active"> Employee Registration</a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
        
          	<br />
          	<div class="dasboard_text">
            <form name="empreg" id="empreg" method="post" action="action/emp-register.php" onMouseOver="check_emp_email(document.getElementById('txtemail').value);" onMouseOut=" check_emp_phone(document.getElementById('txtphone').value);">
			<table class="table">
            <?php 
			if(isset($_REQUEST["q"]))
			{
				$reg_id=$_REQUEST["q"];
				$obj->query="select * from registration where reg_id=".$reg_id;
				$obj->select($obj->query);
				$row=mysqli_fetch_assoc($obj->result);
			?>
            <input type="hidden" name="hdnreg_id" value="<?php echo $reg_id;?>" />
            <tr>
            	<th>Name</th>
                <td><input type="text" name="txtname" value="<?php echo $row["name"];?>"/></td>
            </tr>
            <tr>
            	<th>Email Address</th>
                <td><input type="email" name="txtemail" id="txtemail" value="<?php echo $row["email"];?>" onChange="check_emp_email(this.value)" onKeyUp="check_emp_email(this.value)"/> <span id="hint"></span></td>
            </tr>
            <tr>
            	<th>Mobile</th>
                <td><input type="number" name="txtphone" id="txtphone" value="<?php echo $row["mobile"];?>" onChange="check_emp_phone(this.value)" onKeyUp="check_emp_phone(this.value)"/> <span id="phone_hint"></span></td>
            </tr>
            <tr>
            	<th>Address</th>
                <td><textarea name="txtaddress" rows="3" cols="25"><?php echo $row["address"];?></textarea></td>
            </tr>
            <tr>
            	<th>Gender</th>
                <td><?php $gender=$row["gender"];?>
                <?php if($gender=="Male" || $gender=="male") {?>
                <input type="radio" name="rdogender" value="Male" checked="checked"/>Male
                <input type="radio" name="rdogender" value="Female" />Female
                <?php }else{ ?>
                <input type="radio" name="rdogender" value="Male"/>Male
                <input type="radio" name="rdogender" value="Female" checked="checked"/>Female
                <?php } ?>
                </td>
            </tr>
            <tr>
            	<th>Date Of birth</th>
                <td><input type="Date" name="txtdate" value="<?php echo $row["dob"];?>"/></td>
            </tr>
            <tr>
              <th>State</th>
              <td>
              <select name="drpstate" id="drpstate" onChange="show_city(this.value)">
                <option value="0">--select state--</option>
                <?php 
                    $obj->query="select * from states order by state_name";
                    $obj->select($obj->query);
                    while($row=mysqli_fetch_assoc($obj->result))
                    {
                ?>
                        <option value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
                <?php 
                    }
                ?>
                </select>
              </td>
            </tr>
            <tr>
                <th>City</th>
                <td>
                <select name="drpcity" id="drpcity">
                    <option value="0">--select city--</option>
                </select>
                </td>
            </tr>
            <tr>
            	<th>Designation</th>
                <td>
                <select name="drpdes">
                	<option value="">--select--</option>
                    <option value="1" selected="selected">Trainee</option>
                    <option value="2">Devloper</option>
                    <option value="3">Senior developer</option>
                </select>
                </td>
            </tr>
            
            <?php
			}
			else
			{
			?>
            <tr>
            	<th>Name</th>
                <td><input type="text" name="txtname" placeholder="name of employee" /></td>
            </tr>
            <tr>
            	<th>Email Address</th>
                <td><input type="email" name="txtemail" placeholder="Email" onChange="check_emp_email(this.value)" onKeyUp="check_emp_email(this.value)"/> <span id="hint"></span></td>
            </tr>
            <tr>
            	<th>Mobile</th>
                <td><input type="number" name="txtphone" placeholder="Mobile number" onChange="check_emp_phone(this.value)" onKeyUp="check_emp_phone(this.value)"/> <span id="phone_hint"></span></td>
            </tr>
            <tr>
            	<th>Address</th>
                <td><textarea name="txtaddress" placeholder="Address" rows="3" cols="25"></textarea></td>
            </tr>
            <tr>
            	<th>Gender</th>
                <td>
                <input type="radio" name="rdogender" value="Male" />Male
                <input type="radio" name="rdogender" value="Female" />Female
                </td>
            </tr>
            <tr>
            	<th>Date Of birth</th>
                <td><input type="text" name="txtdate" placeholder="Dob(yyyy-mm-dd)" /></td>
            </tr>
            <tr>
              <th>State</th>
              <td>
              <select name="drpstate" id="drpstate" onChange="show_emp_city(this.value)">
                <option value="0">--select state--</option>
                <?php 
                    $obj->query="select * from states order by state_name";
                    $obj->select($obj->query);
                    while($row=mysqli_fetch_assoc($obj->result))
                    {
                ?>
                        <option value="<?php echo $row["state_id"];?>"><?php echo $row["state_name"];?></option>
                <?php 
                    }
                ?>
                </select>
              </td>
            </tr>
            <tr>
                <th>City</th>
                <td>
                <select name="drpcity" id="drpcity">
                    <option value="0">--select city--</option>
                </select>
                </td>
            </tr>
            <tr>
            	<th>Designation</th>
                <td>
                <select name="drpdes">
                	<option value="">--select--</option>
                    <option value="1">Trainee</option>
                    <option value="2">Devloper</option>
                    <option value="3">Senior developer</option>
                </select>
                </td>
            </tr>
            
            <?php 
			}
			?>
            <tr>
            	<td colspan="2" align="center">
                	<input type="submit" name="btnregister" value="Register" class="button-submit" />
                </td>
            </tr>
            </table>
            </form>
            </div>
        </div>
        <!-- end of content-->
        
      <div class="clear"></div>
    </div>
  </div>
  <?php //include "footer.php" ?>
</div>
    
	<center>
		<a href="index.php">Home</a>&nbsp;&nbsp;
		<a href="index.php?page=questions.php">Questions</a>&nbsp;&nbsp;
		<a href="../action/logout.php" onClick="return conformation()">Logout</a>&nbsp;&nbsp;
    </center>
    <script>
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
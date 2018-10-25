<?php
session_start();
if(!isset($_SESSION["admin_id"]))
{
?><script>
    alert("Please! login first.");
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
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> PAYSLIP | WORKFLOW </title>
    
    <link href="../css/transdmin.css" rel="stylesheet" type="text/css" media="screen">
    <!-- jQuery -->
    
    <!-- Bvalidator Style -->
    <!-- <link href="../bvalidation/themes/bvalidator.theme.bootstrap.rc.css" rel="stylesheet">
  <!- Bvalidator Script -->
 <!--  <script src="../bvalidation/jquery.bvalidator.js"></script>
    <script src="../bvalidation/jquery.bvalidator-yc.js"></script> -->
     
    <!-- <script type="text/javascript">            
        var $j = jQuery.noConflict()
        var optionsBootstrap = {
            classNamePrefix: 'bvalidator_bootstraprc_',
            position: {x:'right', y:'center'},
            offset:     {x:15, y:0},
            template: '<div class="{errMsgClass}"><div class="bvalidator_bootstraprc_arrow"></div><div class="bvalidator_bootstraprc_cont1"><small>{message}</small></div></div>',    
            templateCloseIcon: '<div style="display:table"><div style="display:table-cell">{message}</div><div style="display:table-cell"><div class="{closeIconClass}">&#215;</div></div></div>'
        };
        
        $j(document).ready(function () {
            $j('#frmleaveapply').bValidator(optionsBootstrap);
        });
    </script> -->
</head>
<body>
<div id="wrapper">  
<?php include_once("inc/header.php");?>
<!-- page content -->
        <div id="containerHolder">
          <div id="container">
            <div id="sidebar">
              <?php include "inc/column_left.php" ?>
              </div>
                <h3> Payslip </h3>
            <!-- h2 stays for breadcrumbs -->
        <h2>Payslip &raquo; <a href="#" class="active" >Payslip Generation</a></h2><br />  <!-- content of page-->
        <div id="main">
        
            <br />
            <div class="dasboard_text">
            <form name="payslipgen" id="payslipgen" method="post" action="" enctype="multipart/form-data">
      <table class="table">

            <tr>
              <th>Emp_name</th>
                <td><textarea name="txtemp" placeholder="Emp_name" rows="3" cols="25"></textarea></td>
            </tr>
            <tr>
              <th>Emp_name</th>          
                  <td>
                  <select name="drpemp">
                    
                    <option value="0">--SELECT Employee </option>
                     
                     <?php

                      session_start();
                             include_once("connection.php");
                             $obj=new connection();
                              $obj->connect();
                          $employee_id=$_SESSION["emp_id"];
    $obj->sql="select * from registration where reg_id='".$employee_id."'";
                            $obj->select($obj->sql);
                            while($row=mysqli_fetch_array($obj->result)){

                                echo "<option value=".$row[0]." >".$row[1]." </option>";

                            }
                     ?>
                         
                  </select>
                  </td>
            </tr>
  
      
            <tr>
              <th>Designation</th>
                <td><textarea name="txtaddress" placeholder="Designation" rows="3" cols="25"></textarea></td>
            </tr>
            <tr>
              <th>Month-year</th>          
                  <td><input type="text" name="txtsdate" placeholder="MONTH-YEAR" size="25"   data-bvalidator="date[yyyy-mm-dd],required"/>
                  </td>
            </tr>
            <tr>
              <th>Salary</th>          
                  <td><input type="text" name="txtsalary" placeholder="Salary" size="25" />
                  </td>
            </tr>
            <tr>
              <td colspan="2" align="center">
                  <input type="submit" name="btnsubmit" value="Send Payslip to Employee" class="button-submit" />
                   </td>
            </tr>
            </table>
                        <?php 
            if(isset($_REQUEST["btnsubmit"]))
            {
             $obj->query="INSERT INTO payslip (`emp_name`,`designation`,`month_year`,`salary`,`e_id`) values ('".$_REQUEST["txtemp"]."','".$_REQUEST["txtaddress"]."','".$_REQUEST["txtsdate"]."','".$_REQUEST["txtsalary"]."','".$_REQUEST["drpemp"]."')";
              $obj->insert_update_delete($obj->query);
              echo "<script>alert(' Send to Employee');document.location='payslip.php'</script>";
                }
            ?>
               
      
            </form>
            
            </div>
        </div>

        <!-- end of content-->
        
      <div class="clear"></div>
    </div>
  </div>
  <?php //include "footer.php" ?>
</div>
    
 <!--  <center>
    <a href="index.php">Home</a>&nbsp;&nbsp;
    <a href="index.php?page=questions.php">Questions</a>&nbsp;&nbsp;
    <a href="../action/logout.php" onClick="return conformation()">Logout</a>&nbsp;&nbsp;
    </center>
  -->   <script>
      function conformation()
    {
      if(confirm("are you sure you want to logout?"))
      {
        return true;
      }elsesup ;
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
            
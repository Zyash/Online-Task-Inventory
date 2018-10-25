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
  <title>WORKFLOW | Event</title>
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
      <div id="sidebar">
        <?php include "inc/column_left.php" ?>
      </div>
      <!-- h2 stays for breadcrumbs -->
        <h2>Event  &raquo; <a href="#" class="active"></a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
        
            <br />
            <div class="dasboard_text"> Coming Soon..
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
   -->  <script>
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
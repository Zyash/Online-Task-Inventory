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
    <title>Change Password | WORKFLOW</title>
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
        <h2>Accounts &raquo; <a href="#" class="active"> Change Password</a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
        
            <br/>
            <div class="dasboard_text">
            <form name="empreg" id="empreg" method="post" action="action/chagepass.php" onMouseOver="check_emp_email(document.getElementById('txtemail').value);" onMouseOut=" check_emp_phone(document.getElementById('txtphone').value);">
            <table class="table">
            <?php 
            // if(isset($_REQUEST["q"]))
            // {
            //     $reg_id=$_REQUEST["q"];
                $obj->query="select * from registration where reg_id=".$admin_id;

                $obj->select($obj->query);
                $row=mysqli_fetch_assoc($obj->result);
            ?>
            <input type="hidden" name="hdnreg_id" value="<?php echo $reg_id;?>" />
             <tr>
                 <th align="center" colspan="2" >Change Password</th>
             </tr>
             <tr>
                 <td align="left"><input type="text" name="username" value="<?php echo $_SESSION["admin_id"]; ?>"></td>
            <tr>
            <tr>
            <td align="left"><input type="password" name="txtopass" placeholder="Old Password"></td>
            </tr>
             <tr>
                 <td align="left"><input type="password" name="txtnpass" placeholder="New Password"></td>
            </tr>
            <tr>
                <td align="left"><input type="password" name="txtcpass" placeholder="Confirm password"></td>
            </tr>
            <?php 
            //}
            ?>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnregister" value="Update" class="button-submit" />
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
<?php 
session_start();
if(!isset($_SESSION["admin_id"]))
{
?>
	<script>
		alert("Please! Login First...");
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
	<title>WORKFLOW | Add paperset</title>
    <link href="../css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
	<!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bvalidator Style -->
    <link href="../bvalidation/themes/bvalidator.theme.bootstrap.rc.css" rel="stylesheet">
	<!-- Bvalidator script -->
	<script src="../bvalidation/jquery.bvalidator.js"></script>
    <script  src="../bvalidation/jquery.bvalidator-yc.js"></script>
    
    <script type="text/javascript">            
        var $j = jQuery.noConflict()
        var optionsBootstrap = {
            classNamePrefix: 'bvalidator_bootstraprc_',
            position: {x:'right', y:'center'},
            offset:     {x:15, y:0},
            template: '<div class="{errMsgClass}"><div class="bvalidator_bootstraprc_arrow"></div><div class="bvalidator_bootstraprc_cont1">{message}</div></div>',    
            templateCloseIcon: '<div style="display:table"><div style="display:table-cell">{message}</div><div style="display:table-cell"><div class="{closeIconClass}">&#215;</div></div></div>'
        };
        
        $j(document).ready(function () {
            $j('#frmadd').bValidator(optionsBootstrap);
        });
        
		$j(document).ready(function () {
            $j('#frmupdate').bValidator(optionsBootstrap);
        });
        
    </script>
    </head>
	
	<body>
	<?php 
	
	/*code block for deleting paperset*/
	if(isset($_REQUEST["dltid"]))
	{
		$obj->query="delete from paperset where paper_id=".$_REQUEST["dltid"];
		$obj->insert_update_delete($obj->query);
		
		$obj->query="delete from ans_master where que_id in (select que_id from que_master where paper_id=".$_REQUEST["dltid"].")";
		$obj->insert_update_delete($obj->query);
		
		$obj->query="delete from que_master where paper_id=".$_REQUEST["dltid"];
		$obj->insert_update_delete($obj->query);
	?>
    	<script>
        	alert("paperset deleted sucessufully");
        </script>
    <?php
	}
	/*end of code block for deleting paperset*/
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
        <h2>Data Management &raquo; <a href="#" class="active"> Add paperset</a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
          	<br />
            <div class="dasboard_text">
            
            <?php 
			if(isset($_REQUEST["epid"]))
			{
				$obj->query="select * from paperset where paper_id=".$_REQUEST["epid"];
				$obj->select($obj->query);
				$record=mysqli_fetch_assoc($obj->result);
			?>
            	<form name="frmupdate" id="frmupdate" action="action/update-paper.php" method="post">
                <table class="table">
                	<tr>
                    	<td>Paperset Name</td>
                        <td><input type="text" name="txtpname" value="<?php echo $record["paper_name"];?>" data-bvalidator="alpha,required"/></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><input type="submit" name="btnupdate" value="Update" class="button-submit" /></td>
                    </tr>
                </table>
                <input type="hidden" name="hdnpid" value="<?php echo $record["paper_id"];?>" />
                </form>
            <?php
			}else
			{
			?>
				<form id="frmadd" name="frmadd" method="post" action="action/add-paper.php">
            <table class="table">
                <tr>
                    <td>Paperset Name</td>
                    <td><input type="text" name="txtpname" placeholder="name of paperset" required="required"/></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" class="button-submit" name="submit" value="Add paperset" /></td>
                </tr>
            </table>
            </form>
			<?php 
			}
			include("grid_paperset.php") ?>
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
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
	<title>WORKFLOW | Data management</title>
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
        <h2>Data Management &raquo; <a href="#" class="active"> Add Question</a></h2><br />  
        
        <!-- content of page-->
        <div id="main">
        
          	<br />
          	<div class="dasboard_text">
            <form name="frm" method="post" action="">
            <table class="table">
                <tr>
                    <th>Select Paperset</th>
                    <td>
                    <?php 
                    $obj->query="select * from paperset";
                    $obj->select($obj->query);
                    ?>
                    <select name="drppaper" class="combo" onChange="this.form.submit()">
                        <option value="0">--select--</option>
                    <?php 
                    while($row=mysqli_fetch_assoc($obj->result))
                    {
                        echo "<option value=".$row["paper_id"].">".$row["paper_name"]."</option>"; 
                    }
                    ?>
                    </select>
                    </td>
                </tr>
            </table>
            </form>
            <?php 
            if(isset($_POST["drppaper"]))
            {
				echo "<hr>";
                $obj->query="select * from paperset where paper_id=".$_POST["drppaper"];
                $obj->select($obj->query);
                $row=mysqli_fetch_assoc($obj->result);
                echo "<center><h3>Paperset:".$row["paper_name"]."</h3></center>";
                
                $obj->query="select * from que_master where paper_id=".$_POST["drppaper"];
                $obj->select($obj->query);
                if(mysqli_num_rows($obj->result)==0)
                {
                    echo "you have not added any questions in this paperset..<br>";
                    echo "<a href='add-question.php'>click here to add them...</a>";
                }
                else
                {
                    while($row=mysqli_fetch_assoc($obj->result))
                    {
                        $question_id=$row["que_id"];
                        $right_ans=$row["correct_op_id"];
            ?>
                  <div >
            <?php
                        echo "<li><h3>Question: ".$row["question"]."</h3></li>";
                        $con->query="select * from ans_master where que_id=".$question_id;
                        $con->select($con->query);
                    
            ?>
                        <ol type="1">
            <?php
						$i=1;
                        while($row1=mysqli_fetch_assoc($con->result))
                        {
							
                            if($row1["op_id"]==$right_ans)
                            {
                                echo "<li style='color:#0F0'>$i. ".$row1["que_option"]."</li>";
                            }else
                            {
                                echo "<li>$i. ".$row1["que_option"]."</li>";
                            }
                            $i++;
                        }
            ?>
                    	</ol>
                    </div>
            <?php 
                    }			
                }
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<?php 
$con=new connection();
$con->connect();
?>
<body>
<br />
<form name="frm" method="post" action="">
<table align="center" border="1" cellpadding="5" width="70%">
	<tr>
    	<th>Select Paperset</th>
        <td>
        <?php 
		$obj->query="select * from paperset";
		$obj->select($obj->query);
		?>
        <select name="drppaper" onchange="this.form.submit()">
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
	$obj->query="select * from paperset where paper_id=".$_POST["drppaper"];
	$obj->select($obj->query);
	$row=mysqli_fetch_assoc($obj->result);
	echo "<center><h3>Paperset:".$row["paper_name"]."</h3></center>";
	
	$obj->query="select * from que_master where paper_id=".$_POST["drppaper"];
	$obj->select($obj->query);
	if(mysqli_num_rows($obj->result)==0)
	{
		echo "<h3>you have not added any questions in this paperset..</h3>";
		echo "<a href='index.php?page=add-question.php'>click here to add them...</a>";
	}
	else
	{
		while($row=mysqli_fetch_assoc($obj->result))
		{
			$question_id=$row["que_id"];
			$right_ans=$row["correct_op_id"];
?>
			<div style="margin-left:25%">
<?php
			echo "<h3>Question: ".$row["question"]."</h3>";
			$con->query="select * from ans_master where que_id=".$question_id;
			$con->select($con->query);
		
?>
			<ol>
<?php
			while($row1=mysqli_fetch_assoc($con->result))
			{
				if($row1["op_id"]==$right_ans)
				{
					echo "<li style='color:#0F0'>".$row1["que_option"]."</li>";
				}else
				{
					echo "<li>".$row1["que_option"]."</li>";
				}
				
			}
?>
		</ol>
        </div>
<?php 
		}			
	}
}
?>
</body>
</html>
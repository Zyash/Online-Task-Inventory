<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<br />
<?php 
$que_id=$_REQUEST["q"];

$obj->query="select question from que_master where que_id=".$que_id;
$obj->select($obj->query);
$row=mysqli_fetch_assoc($obj->result);
$question=$row["question"];
$obj->query="select * from ans_master where que_id=".$que_id;
$obj->select($obj->query);
?>
<center><h2>Choose correct answer</h2></center>
<form name="frm" method="post" action="action/add-question.php">
<table width="50%" align="center" border="1" cellpadding="5">
<tr>
	<td>Question: <?php echo $question;?></td>
</tr>
<tr>
<td>
<?php
while($row=mysqli_fetch_assoc($obj->result))
{
?>
  	<input type="radio" name="rdoanswer" value="<?php echo $row["op_id"];?>" /><?php echo $row["que_option"];?><br /><br /> 
<?php
}
?>
	<input type="hidden" name="hdnqid" value="<?php echo $que_id;?>" />
 </td>
 </tr>
 <tr>
 	<td align="center"><input type="submit" name="save" value="Save" /></td>
 </tr>
 </table>
</form>
</body>
</html>
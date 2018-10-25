<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Workflow | Add Paper </title>
</head>

<body>
<br />

<form id="frm" name="frm" method="post" action="action/add-paper.php">
<table align="center" border="1" width="50%" cellpadding="5">
	<tr>
    	<th>Paperset Name</th>
    	<td><input type="text" name="txtpname" placeholder="name of paperset" required="required"/></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><input type="submit" name="submit" value="Add paperset" /></td>
    </tr>
</table>
</form>
<?php 
$obj->query="select * from paperset";
$obj->select($obj->query);
if(mysqli_num_rows($obj->result)>0)
{
?>
	<table align="center" border="1" width="50%" cellpadding="5">
	<thead>
    <tr>
        <th>Paper id</th>
        <th>paperset</th>
    </tr>
    </thead>
    <tbody>
<?php 
while($row=mysqli_fetch_assoc($obj->result))
{
?>
	<tr>
    	<td><?php echo $row["paper_id"];?></td>
        <td><?php echo $row["paper_name"];?></td>
    </tr>
<?php
}
?>	
	</tbody>
    </table>
<?php
}
?>

</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
<br />
<form name="frm" method="post" action="action/add-question.php">
<table align="center" border="1" width="60%" cellpadding="5">
	<tr>
    	<th width="40%">Paperset</th>
        <td>
        <?php 
		$obj->query="select * from paperset";
		$obj->select($obj->query);
		?>
        <select name="drppaper">
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
    <tr>
    	<th>Question</th>
        <td><textarea name="txtquestion" placeholder="Question" cols="50" rows="3" required="required"></textarea></td>
    </tr>
    <tr>
    	<th>Options</th>
    	<td><br />
        	A. <input type="text" name="txtop1" required="required"/><br /><br />
            B. <input type="text" name="txtop2" required="required"/><br /><br />
            C. <input type="text" name="txtop3" required="required"/><br /><br />
            D. <input type="text" name="txtop4" required="required"/><br /><br />
        </td>
    </tr>
    <tr>
    	<th>Marks</th>
        <td><input type="number" name="txtmarks" required="required" /></td>
    </tr>
    <tr>
    	<td colspan="2" align="center"><input type="submit" name="btnnext" value="Next" /></td>
    </tr>
</table>
</form>
</body>
</html>
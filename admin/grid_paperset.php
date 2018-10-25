<?php
	echo "<br><hr><br>";

	$file_array = explode("/",$_SERVER['SCRIPT_NAME']);
	$file_name = $file_array[count($file_array)-1];
?>
<?php 
include_once("../inc/connection.php");
$obj=new connection();
$obj->connect();
?>

<?php
/*changing flag of the paper */
if(isset($_POST["hdnpid"]))
{
	$paperid=$_POST["hdnpid"];
	$obj->query="update paperset set flag=".$_POST["drptype"]." where paper_id=".$paperid;
	$obj->insert_update_delete($obj->query);
}
/*end of changing flag of the paper */
	
	$rowsPerPage=3;
	$PageNum=1;
	if(isset($_REQUEST["pagec"]))
	 {
	  $PageNum = $_REQUEST["pagec"];
	 }
	
		$offset = ($PageNum - 1) * $rowsPerPage; 
		$obj->query="select * from paperset LIMIT $offset, $rowsPerPage";
		$obj->select($obj->query);
		if(mysqli_num_rows($obj->result)>0)
		{
?>
			<fieldset>
            <legend>Papersets</legend>
			<table class="table">
			<thead>
            <tr>
				<td width="20%" align="center" class="firstrow">Paper id</td>
				<td width="20%" align="center" class="firstrow">paperset</td>
                <td width="40%" align="center" class="firstrow">active/passive</td>
                <td width="10%" align="center" class="firstrow">Edit</td>
                <td width="10%" align="center" class="firstrow">Delete</td>
			</tr>
            </thead>
            <tbody>
<?php 
			while($row=mysqli_fetch_assoc($obj->result))
			{
?>
			<tr>
				<td align="center"><?php echo $row["paper_id"];?></td>
				<td align="center"><?php echo $row["paper_name"];?></td>
                <td align="center">
                <form name="frm" action="" method="post">
                <input type="hidden" name="hdnpid" value="<?php echo $row["paper_id"];?>" />
				<select name="drptype" onChange="this.form.submit()">
				<?php 
					if($row["flag"]==1)
					{
				?>
                        <option value="1" selected>active</option>
                        <option value="0">passive</option>
                <?php		
						
					}else
					{
				?>
                        <option value="1">active</option>
                        <option value="0" selected>passive</option>
                <?php		
					}
				?>
                </select>
                </form>
                </td>
                <td align="center">
                   <a href="<?php echo $file_name;?>?epid=<?php echo $row["paper_id"];?>"><i class="fa fa-pencil"></i> Edit </a>
                    <!--<a href="#?pid=<?php echo $row["paper_id"];?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit </a>-->
                </td>
                <td><a href="<?php echo $file_name;?>?dltid=<?php echo $row["paper_id"];?>" onClick="return confirmation();"><i class="fa fa-trash-o"></i> Delete </a></td>
			</tr>
<?php
			}
		}
		
		$obj->query="select count(*)'numrows' from paperset";
		$obj->select($obj->query);
		$row=mysqli_fetch_assoc($obj->result);
		$numrows = $row['numrows'];
		
		$maxPage = ceil($numrows/$rowsPerPage);
     	$nav  = '';
		for($pagec = 1; $pagec <= $maxPage; $pagec++)
		 {
		  if ($pagec == $PageNum)
		   {
		   $nav .= "<a href=''> $pagec </a>"; // no need to create a link to current page
		   }
		 else
		  {
		   $nav .= " <a href='".$file_name."?pagec=$pagec'>$pagec</a> ";
		  } 
		}
	
		if ($PageNum > 1)
		 {
		  $pagec  = $PageNum - 1;
		  $prev  = " <a href='".$file_name."?pagec=$pagec'>Prev</a> ";
		  $first = " <a href='".$file_name."?pagec=1'>First</a> ";
		 }  
	   else
		{
		 $prev  = '&nbsp;'; // we're on page one, don't print previous link
		 $first = '&nbsp;'; // nor the first page link
		}
	
	  if ($PageNum < $maxPage)
	   {
		$pagec = $PageNum + 1;
		$next = " <a href='".$file_name."?pagec=$pagec'>Next</a> ";
		$last = " <a href='".$file_name."?pagec=$maxPage'>Last</a> ";
	   } 
	  else
	   {
	   $next = '&nbsp;'; // we're on the last page, don't print next link
	   $last = '&nbsp;'; // nor the last page link
	  }
	  
	  echo "<tr><td colspan='5' align='center'>".$first ." ". $prev ." ". $nav ." ". $next ." ". $last."</td></tr>";
?>
		</tbody>
	</table>
    <script>
    function confirmation()
	{
		if(confirm("questions on the paperset will also deleted,press okk to continue?"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    </script>
     </fieldset>
<?php	
if(isset($_POST["hdnpid"]))
{
	if($_POST["drptype"]==0)
	{
?>
		<script>
        	alert("paperset has been set passive");
        </script>
<?php		
		
	}else
	{
?>
		<script>
        	alert("paperset has been set active");
        </script>
<?php		
	}
}
?>

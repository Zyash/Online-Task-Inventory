<?php
	$file_array = explode("/",$_SERVER['SCRIPT_NAME']);
	$file_name = $file_array[count($file_array)-1];
?>
<?php 
include_once("../inc/connection.php");
$obj=new connection();
$obj->connect();
$con=new connection();
$con->connect();

$paperid=$_REQUEST["vpid"];
$obj->query="select * from paperset where paper_id=".$paperid;
$obj->select($obj->query);
$row=mysqli_fetch_assoc($obj->result);
$paper_name=$row["paper_name"];
?>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
    	<div class="x_title">
            <h2>Paperset : <?php echo $paper_name;?></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
      <div class="x_content">

<?php
	
	$rowsPerPage=10;
	$PageNum=1;
	if(isset($_REQUEST["pagev"]))
	 {
	  $PageNum = $_REQUEST["pagev"];
	 }
	
		$offset = ($PageNum - 1) * $rowsPerPage; 
		
		$obj->query="select * from que_master where paper_id=".$paperid." LIMIT $offset, $rowsPerPage";
		$obj->select($obj->query);
		if(mysqli_num_rows($obj->result)==0)
		{
			echo "<h4>you have not added any questions in this paperset..</h4>";
			echo "<a href='index.php?page=add-question.php'>click here to add them...</a>";
		}
		else
		{
			while($row=mysqli_fetch_assoc($obj->result))
			{
				$question_id=$row["que_id"];
				$right_ans=$row["correct_op_id"];
	?>
				<div>
	<?php
				echo "<h4><strong>Question:</strong> ".$row["question"]."</h4>";
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
		
		$obj->query="select count(*)'numrows' from paperset";
		$obj->select($obj->query);
		$row=mysqli_fetch_assoc($obj->result);
		$numrows = $row['numrows'];
		
		$maxPage = ceil($numrows/$rowsPerPage);
     	$nav  = '';
		
		echo "<div class='pull-right'>";
		for($pagev = 1; $pagev <= $maxPage; $pagev++)
		 {
		  if ($pagev == $PageNum)
		   {
		   $nav .= "<a href='' class='btn btn-round btn-primary'> $pagev </a>"; // no need to create a link to current page
		   }
		 else
		  {
		   $nav .= " <a class='btn btn-round btn-info' href='".$file_name."?pagev=$pagev&vpid=$paperid'>$pagev</a> ";
		  } 
		}
	
		if ($PageNum > 1)
		 {
		  $pagev  = $PageNum - 1;
		  $prev  = " <a class='btn btn-round btn-success' href='".$file_name."?pagev=$pagev&vpid=$paperid'>Prev</a> ";
		  $first = " <a class='btn btn-round btn-success' href='".$file_name."?pagev=1&vpid=$paperid'>First Page</a> ";
		 }  
	   else
		{
		 $prev  = '&nbsp;'; // we're on page one, don't print previous link
		 $first = '&nbsp;'; // nor the first page link
		}
	
	  if ($PageNum < $maxPage)
	   {
		$pagev = $PageNum + 1;
		$next = " <a class='btn btn-round btn-success' href='".$file_name."?pagev=$pagev&vpid=$paperid'>Next</a> ";
		$last = " <a class='btn btn-round btn-success' href='".$file_name."?pagev=$maxPage&vpid=$paperid'>Last Page</a> ";
	   } 
	  else
	   {
	   $next = '&nbsp;'; // we're on the last page, don't print next link
	   $last = '&nbsp;'; // nor the last page link
	  }
	  
	  echo $first . $prev . $nav . $next . $last;
	  echo "</div>";
?>

      </div>
    </div>
  </div>
</div>


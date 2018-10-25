<!DOCTYPE HTML>
<html>
<head>
<title>OAS</title>

<?php 
	session_start();
?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/boot.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="assets/css/style_common.css">
<link rel="stylesheet" type="text/css" href="assets/css/style1.css">
<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic'>
<script src="assets/js/modernizr.custom.69142.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>
<script src="assets/js/bootstrap.min.js" ></script>
</head>
<body>
	<?php 
  include_once("inc/connection.php");
  $obj=new connection();
  $obj->connect();
?>
<div id="page-top" class="index">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <a class="navbar-brand page-scroll" href="#page-top">OAS</a></div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="page-scroll" href="index.php">Home</a></li>
          <li><a class="page-scroll" href="login.php">Login</a></li>
          <li><a class="page-scroll" href="registration.php">Register</a></li>
          <!-- <li><a class="page-scroll" href="#services">Service</a></li> -->
          <li><a class="page-scroll" href="#about">About us</a></li>
          <li><a class="page-scroll" href="#contact">Contact us</a></li>
        </ul>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <!-- Header --><!--  photo header section-->
  
</div>
<section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:#3680C1">Forgot Password</h2>
       
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12s">
<form action="" method="post" name="frm" style="margin:20px 300px;">


		<div class="form-group">
			<div class="col-sm-8">
              <label class="control-label" for="email">Username:</label>
              <input type="email" class="form-control" name="txtusername" placeholder="Email">
            </div>
        </div>
            <div class="form-group">
            	<div class="col-sm-8">
              <label class="control-label" for="Question">Security Question</label>
              <!-- <input type="password" class="form-control" name="txtpassword" placeholder="Enter password"> -->
              <select name="drpque" id="drpque" class="form-control">
			<option value="">--select security question--</option>
                  <?php 
                                        $obj->query="select * from sec_que";
                                        $obj->select($obj->query);
                                        while($row=mysqli_fetch_assoc($obj->result))
                                        {
                                    ?>
                                      <option value="<?php echo $row["sec_que_id"];?>"><?php echo $row["sec_question"];?></option>
                                    <?php 
                                        }
                                    ?>
		</select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-8">
                <label class="control-label" for="email">Your Answer:</label>
              <input type="text" class="form-control" name="txtanswer" placeholder="Answer">
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="btnlogin" class="btn btn-default" value="submit" align="center" >
              </div>
            </div>

<!-- <table width="50%" border="1" align="center" cellpadding="5">
  <tr>
    <td width="36%">Username</td>
    <td width="64%">
      <input type="email" name="txtusername" placeholder="Email" onchange="select_que(this.value)" onkeyup="select_que(this.value)"/>
    </td>
  </tr>
  <tr>
    <td>Security Question</td>
    <td>
		<select name="drpque" id="drpque">
			<option value="">--select security question--</option>
                  <?php 
                                        $obj->query="select * from sec_que";
                                        $obj->select($obj->query);
                                        while($row=mysqli_fetch_assoc($obj->result))
                                        {
                                    ?>
                                      <option value="<?php echo $row["sec_que_id"];?>"><?php echo $row["sec_question"];?></option>
                                    <?php 
                                        }
                                    ?>
		</select>
	 </td>
  </tr>
  <tr>
	<td>Your Answer</td>
	<td>
		<input type="text" name="txtanswer" placeholder="Answer" />
	</td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnlogin" value="Submit" /></td>
    </tr>
</table> -->
</form>


<?php
	if(isset($_POST['btnlogin']))
	{
		$obj->query="select * from registration where email='".$_POST['txtusername']."' and sec_answer='".$_POST['txtanswer']."'";
		$obj->select($obj->query);
		if(mysqli_num_rows($obj->result)>0)
		{
			
			//echo $pass;
			$obj->query="update login_details set password='".$_POST['$pass']."' where username='".$_POST['txtusername']."'";
			echo $obj->query;
			$obj->insert_update_delete($obj->query);
?>
			<script>
				alert("new password is:<?php echo $pass;?>");
				window.location="index.php?page=login.php";
			</script>

<?php
		}
		else
		{
?>
			<script>
				alert('Please enter correct answer');
				window.location="index.php?page=forgot-password.php";
			</script>
<?php
		}
	}

?>
</div>
</div>
</div>
</section>

<footer style="background-color: #000000;">
  <div class="container">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4 col-md-offset-">
        <ul class="list-inline social-buttons">
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <h3 style="color:#3680C1">Thank You For Visiting Our OAS</h3>
        <h3 style="color:#3680C1">Copyright &copy; 2016 All Rights Reserved</h3>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</footer>
</body>
</html>

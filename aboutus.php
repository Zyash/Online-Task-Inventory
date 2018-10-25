<!DOCTYPE HTML>
<html>
<head>
<title>OAS</title>
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
<div id="page-top" class="index">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        <!-- <a class="navbar-brand page-scroll" href="#page-top">OAS</a> -->
        <img src="images1/OAS_logo1.png" height="50" width="100">
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a class="page-scroll" href="#page-top">Home</a></li>
          <li><a class="page-scroll" href="login.php">Login</a></li>
          <li><a class="page-scroll" href="registration.php">Register</a></li>
          <!-- <li><a class="page-scroll" href="#services">Service</a></li> -->
          <li><a class="page-scroll" href="aboutus.php">About us</a></li>
          <li><a class="page-scroll" href="#contact">Contact us</a></li>
        </ul>
      </div>
    </div><!-- /.container-fluid -->
  </nav>
  <!-- Header --><!--  photo header section-->
  <header>
    <div class="container">
  <div class="row">
    <div class="col-md-12">
    <img class="img-responsive" src="images1/5559.jpg">
    </div>
  
  <br><br>
  
  </div>
</div>

    <?php include'slider.php';?>
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in"><!-- Welcome To Our Studio! --></div>
        <div class="intro-heading"><!-- It's Nice To Meet You --></div>
        <!-- <a href="#services" class="page-scroll btn btn-primary">Tell Me More</a> --></div>
    </div>
  </header>
</div>

<!-- ===== services ===== -->
 <section id="services"> 
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h2 class="section-heading" style="color:#000000" align="center">About Us</h2>
        <h3 class="section-subheading text-muted">
          Activity Scheduler is a   developed to maintain the detailed activity of employees working in organization. It maintains the information about the personal details of their employees, also the details about the payroll system which enable to generate the payslip/Salary. The application is actually a suite of applications developed using PHP MySQL. It can be used by anyone who is not even familiar with simple employees system. It is user friendly and just asks the user to follow step by step operations by giving him few options. The Website is very user friendly.The package contains different modules like Employee details. This version of the Website has multi-user approach. For further enhancement or development of the package,user’s  feedback  will  be  considered.You can also  call  this  project  as universal  activity  scheduler  or an  Activity  information  system.  Project will   allow admin to add new employees after proper authentication. Admin can also add new departments and posts. It can allocate employees to different departments at different posts. Database should store all personal details of employees such as date of birth full name etc. and his educational background, work experience, skill sets, current and past projects in different tables with proper relations.</h3>
      </div>
    </div>
    <div class="row text-center">
     
    </div>
  </div>
</section>
 <!-- ===== Team Section =====-->
<!-- <section id="port" class="bg-danger">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:#3680C1">Register</h2>
        <h3 class="section-subheading text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3>
      </div>
    </div>
    <div id="grid" class="main">
      <div class="view">
        <div class="view-back"><span data-icon="A">566</span><span data-icon="B">124</span><a href="#">&rarr;</a></div>
        <img src="assets/img/Beautiful-girl-listen-music-so-happy.png" alt=""></div>
      <div class="view">
        <div class="view-back"><span data-icon="A">210</span><span data-icon="B">102</span><a href="#">&rarr;</a></div>
        <img src="assets/img/2.jpg" alt=""></div>
      <div class="view">
        <div class="view-back"><span data-icon="A">690</span><span data-icon="B">361</span><a href="#">&rarr;</a></div>
        <img src="assets/img/lz2prlf1tbf.png" alt=""></div>
      <div class="view">
        <div class="view-back"><span data-icon="A">987</span><span data-icon="B">130</span><a href="#">&rarr;</a></div>
        <img src="assets/img/4.jpg" alt=""></div>
      <div class="view">
        <div class="view-back"><span data-icon="A">566</span><span data-icon="B">124</span><a href="#">&rarr;</a></div>
        <img src="assets/img/1.jpg" alt=""></div>
      <div class="view">
        <div class="view-back"><span data-icon="A">210</span><span data-icon="B">102</span><a href="#">&rarr;</a></div>
        <img src="assets/img/beautiful-girl-hat-wallpaper-43323-44368-hd-wallpapers.png" alt=""></div>
    </div>
  </div>
</section> -->
<!-- <script>	
Modernizr.load({
    test: Modernizr.csstransforms3d && Modernizr.csstransitions,
    yep: ['assets/js/jquery-1.10.1.min.js', 'assets/js/jquery.hoverfold.js'],
    nope: '',
    callback: function(url, result, key) {
        if (url === 'assets/js/jquery.hoverfold.js') {
            $('#grid').hoverfold();
        }
    }
});
</script> --> 
<!-- About Section -->
<!-- <section id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:#3680C1">Service</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">
          <li>
            <div class="timeline-image"><img class="img-circle img-responsive" src="assets/img/a-new-beginning.png" alt=""></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 style="color:#3680C1">2010-2012</h4>
                <h4 class="subheading" style="color:#3680C1">Our Humble Beginnings</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image"><img class="img-circle img-responsive" src="assets/img/airplane-take-off-at-sunset-hd-wallpaper.png" alt=""></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 style="color:#3680C1">APRIL 2013</h4>
                <h4 class="subheading" style="color:#3680C1">An Agency is Born</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
              </div>
            </div>
          </li>
          <li>
            <div class="timeline-image"><img class="img-circle img-responsive" src="assets/img/xperia-z4-tablet-black-1240x840-a07acf270af4d6789d0e83aea747b064.png" alt=""></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 style="color:#3680C1">JANUARY 2014</h4>
                <h4 class="subheading" style="color:#3680C1">Transition to Full Service</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image"><img class="img-circle img-responsive" src="assets/img/IMG_0195.png" alt=""></div>
            <div class="timeline-panel">
              <div class="timeline-heading">
                <h4 style="color:#3680C1">FEBRUARY 2015</h4>
                <h4 class="subheading" style="color:#3680C1">Phase Two Expansion</h4>
              </div>
              <div class="timeline-body">
                <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged! 
              </div>
            </div>
          </li>
          <li class="timeline-inverted">
            <div class="timeline-image">
              <h4>Be Part<br>
                Of Our<br>
                WORK!</h4>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section> -->
<!-- ===== Team Section ===== --><!-- ABOT US SECTION-->
<!-- <section id="team" class="bg-success">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:#3680C1">About Us</h2>
        <h3 class="section-subheading text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3> 
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <div class="team-member"><img src="assets/img/Alexandra-M-Team-Leader.png" class="img-responsive img-circle" alt="">
          <h4 style="color:#3680C1">Easton Garland</h4>
          <p class="text-muted">Team Leader</p>
          <ul class="list-inline social-buttons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member"><img src="assets/img/Zac-Efron-7-1600.png" class="img-responsive img-circle" alt="">
          <h4 style="color:#3680C1">Ellis Smith</h4>
          <p class="text-muted">Lead Developer</p>
          <ul class="list-inline social-buttons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="team-member"><img src="assets/img/beautiful-smile-girl.png" class="img-responsive img-circle" alt="">
          <h4 style="color:#3680C1">Spring Ross</h4>
          <p class="text-muted">Lead Designer</p>
          <ul class="list-inline social-buttons">
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section> -->
<!-- ===== Contact Us ===== -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading" style="color:#3680C1">Contact Us</h2>
        <!-- <h3 class="section-subheading text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h3> -->
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form action="#" method="post" name="sentMessage" id="contactForm" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name *" id="name" required>
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email *" id="email" required>
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" placeholder="Your Message *" id="message" required></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<footer>
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
        <h3 style="color:#3680C1">Thank You For Visiting Our Online Activity Schedular</h3>
        <!-- <h3 style="color:#3680C1">Copyright &copy; 2016 All Rights Reserved</h3> -->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</footer>
</body>
</html>
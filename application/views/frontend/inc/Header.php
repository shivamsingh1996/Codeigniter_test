<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.konnectplugins.com/edu-course/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 31 Jan 2019 08:14:31 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<!-- Favicon -->
<link href="img/fav.png" rel="shortcut icon" type="image/x-icon"/>

<!-- Title -->
<title><?=$title?></title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>public/frontend/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Custom icon Fonts -->
<link href="<?=base_url()?>public/frontend/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Konnect Slider -->
<link href="<?=base_url()?>public/frontend/css/konnect-slider.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>public/frontend/css/animate.css" media="all" rel="stylesheet" type="text/css" />

<!-- Main CSS -->
<link href="<?=base_url()?>public/frontend/css/theme.css" rel="stylesheet">
<link href="<?=base_url()?>public/frontend/css/green.css" rel="stylesheet" id="style_theme">


</head>

<!-- Body -->
<body>
<!-- Pre Loader -->
<div class="loading">
  <div class="loader"></div>
</div>
<!-- Scroll to Top --> 
<a id="scroll-up" ><i class="fa fa-angle-up"></i></a> 
<!-- Color Changer -->
<div class="konnect-info" style="padding:8px 0px 4px 0px!important">
  <div class="container-fluid">
    <div class="row"> 
      <!-- Top bar Left -->
      <div class="col-md-1">
        <b>IMPORTANT:-</b>
      </div>
      <!-- Top bar Right -->
      <div class="col-md-11">
        <?php
        $CI=&get_instance();
        $notice = $CI->db->query("select * from notice where status = 1");
        $notice_str = '';
        $i = 1;
        foreach($notice->result() as $row) 
        { 
          $notice_str .= $i.'.&nbsp;'.$row->notice.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
          $i++;
        }
        echo '<marquee>'.$notice_str.'</marquee>';
        ?>
      </div>
    </div>
  </div>
</div>
<!-- Main Navigation + LOGO Area -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header"> 
      <!-- Responsive Menu -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <img src="img/icons/menu.png" alt="menu" width="40"> </button>
      <!-- Logo --> 
      <a class="navbar-brand" href="index-2.html" style="font-size:30px;margin-top:20px">UPSCPRE</a> </div>
    
    <!-- Menu Items -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="index-2.html">Home</a></li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">About<i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
            <li><a href="#">What is UPSC?</a></li>
            <li><a href="#">UPSC syllabus</a></li>
            <li><a href="#">UPSC exam date</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Current affairs<i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
            <li><a href="#">Daily Current affairs</a></li>
            <li><a href="#">Monthly Current affairs</a></li>
            <li><a href="#">Daily Quiz</a></li>
            <li><a href="#">Monthly Quiz</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Downloads</a>
        </li>
        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog </a>
        </li>
        <li class="dropdown"><a href="contact.html" class="dropdown-toggle" data-toggle="dropdown">Contact <i class="fa fa-angle-down" aria-hidden="true"></i></a>
          <ul class="dropdown-menu">
            <li><a href="contact-one.html">Contact Us</a></li>
            <li><a href="contact-two.html">Faq's</a></li>
            <li><a href="contact-two.html">Feedback</a></li>
          </ul>
        </li>
        <li class="search-icon"><a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
          <div class="search-form">
            <form class="navbar-form" role="search">
              <div class="input-group add-on">
                <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
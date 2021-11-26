<?php

include_once 'database/dbConn.php';
session_start();

?>
<!DOCTYPE html>


<html lang="en">
<head>

  <meta charset="utf-8"/>


  <title>TUT ONLINE BUS BOOOKING</title>


  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css"/>

  <link rel="stylesheet" href="css/styles.css"/>

  <link rel="stylesheet" href="css/font-awesome.min.css"/>

  <link href="css/component.css" rel="stylesheet">

  <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen">
  <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen">

  <link rel="stylesheet" href="css/style.css"/>

  <link rel="stylesheet" type="text/css" href="css/green.css" media="screen" id="color-opt" />



</head>

<body >

  <div class="animationload">
    <div class="loader">
        Please Wait....
    </div>
  </div>



  <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">

      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Bus Online Booking</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.html">Home</a></li>
          <li><a href="login.php">Sign in</a></li>


        </ul>
      </div>
    </div>
  </nav>

    <section class="main-home" id="home">
      <div class="home-page-photo"></div>
      <div class="home__header-content">
        <div id="main-home-carousel" class="owl-carousel">

        </div>
      </div>
    </section>


    <div class="container">
            <div class="row">
          <div class="col-md-5 mx-auto">
          <div id="first">
            <div class="myform form ">
              <br>
              <br>
              <br>
              <br>
               <div class="logo mb-3">
                 <div class="col-md-12 text-center">
                  <h3>Create Account</h3>
                  <?php

                    if (isset($_SESSION['message'])): ?>
                    <div class="alert alert-<?=$_SESSION['msg_type']?>">

                      <?php
                          echo $_SESSION['message'];
                          unset($_SESSION['message']);
                      ?>
                  </div>
                <?php endif ?>
                 </div>

              </div>

              <form action="userSignup.php" method="post">
                               <div class="form-group mb-3">
                                   <input id="inputEmail" name="name" type="text" placeholder="Name"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>
                               <div class="form-group mb-3">
                                   <input id="inputEmail" name="surname" type="text" placeholder="Surname"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>
                               <div class="form-group mb-3">
                                   <input id ="studnum" onchange="validate()" name="studNo" type="text" placeholder="Student Number"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>
                               <div class="form-group mb-3">
                                   <input id="e" name="email" type="email" placeholder="Student Email"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>
                               <div class="form-group mb-3">
                                   <select class="form-control rounded-pill border-0 shadow-sm px-4" style="border-radius: 50px;"  name="gender">
                                             <option  value="">Select Gender</option>
                                             <option value="Female">Female</option>
                                             <option value="Male">Male</option>
                                  </select>
                               </div>
                               <div class="form-group mb-3">
                                 <select class="form-control rounded-pill border-0 shadow-sm px-4"  style="border-radius: 50px;"  name="cmpus">
                                           <option  value="">Select Campus</option>
                                           <option value="Arcadia Campus">Arcadia Campus</option>
                                           <option value="Arts Campus">Arts Campus</option>
                                           <option value="Em​alahleni Campus">Em​alahleni Campus</option>
                                           <option value="Ga-Rankuwa Campus">Ga-Rankuwa Campus</option>
                                           <option value="Mbombela Campus">Mbombela Campus</option>
                                           <option value="Polokwane Campus">Polokwane Campus</option>
                                           <option value="Pretoria Campus">Pretoria Campus</option>
                                           <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                                           <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                                       </select>
                               </div>
                               <div class="form-group mb-3">
                                 <select class="form-control rounded-pill border-0 shadow-sm px-4" style="border-radius: 50px;"  name="faculty">
                                           <option  value="">Select Faculty</option>
                                           <option value="Faculty of Arts and Design">Faculty of Arts and Design</option>
                                           <option value="Faculty of Science">Faculty of Science</option>
                                           <option value="Faculty of Engineering and the Built Environment">Faculty of Engineering and the Built Environment</option>
                                           <option value="Faculty of Information and Communication Technology">Faculty of Information and Communication Technology</option>
                                           <option value="Faculty of Humanities">Faculty of Humanities</option>
                                           <option value="Faculty of Economics and Finance">Faculty of Economics and Finance</option>
                                           <option value="Faculty of Management Sciences">Faculty of Management Sciences</option>
                                       </select>
                               </div>
                               <div class="form-group mb-3">
                                   <input id="inputEmail" name="password" type="password" placeholder="Password"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>
                               <div class="form-group mb-3">
                                   <input id="inputEmail" name="cPassword" type="password" placeholder="Corfirm Passsword"  autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                               </div>

                               <button type="submit" name="register" class="btn btn-custom">Register</button>
                               <div class="text-center d-flex justify-content-between mt-4">

                               </div>
                           </form>
                          <br>
                          <br>
                          <br>
                          <br>
            </div>
          </div>

          </div>
        </div>
          </div>



          <script type="text/javascript">
                                     function validate() {

                                             var stud = document.getElementById('studnum').value;
                                             if (stud != "")
                                             {
                                                   document.getElementById('e').value = stud+"@tut4life.ac.za";
                                             }
                                             else
                                             {
                                               document.getElementById('e').value = "";
                                             }
                                     }
            </script>



    <footer id="footer">
      <div class="footer-widgets-wrap">
        <div class="container text-center">
          <div class="row">
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>KEEP IN TOUCH</h4>
                <div class="footer-socials">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                </div>
              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">

                <h4>ADDRESS</h4>
                <p>2 Aubrey Matlakala St<br>
                Soshanguve - K, Soshanguve, 0001</p>
                <p>+0 123-456-7890<br>
                <a href="https://www.tut.ac.za/">www.tut.ac.za</a><br>

              </div>
            </div>
            <div class="col-sm-4 col-md-4">
              <div class="footer-content">
                <h4>Campus Location</h4>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14399.784036214123!2d28.0968938!3d-25.5401753!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e2de5e61f9e48e7!2sTshwane%20University%20of%20Technology%20-%20Soshanguve%20South%20Campus%20-%20TUT!5e0!3m2!1sen!2sza!4v1637605086542!5m2!1sen!2sza" width="500" height="150" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom text-center">

        <p>©2021 TUT. copyright </p>
      </div>
    </footer>

    <a href="#" class="back-to-top"> <i class="fa fa-chevron-up"> </i> </a>



    <div id="style-switcher" style="left: 0px;">
        <div>
            <h3>Select your color</h3>
            <ul class="pattern">
                <li><a class="color1" href="#"></a></li>
                <li><a class="color2" href="#"></a></li>
                <li><a class="color3" href="#"></a></li>
                <li><a class="color4" href="#"></a></li>
                <li><a class="color5" href="#"></a></li>
                <li><a class="color6" href="#"></a></li>
                <li><a class="color7" href="#"></a></li>
                <li><a class="color8" href="#"></a></li>
                <li><a class="color9" href="#"></a></li>
                <li><a class="color10" href="#"></a></li>
                <li><a class="color11" href="#"></a></li>
                <li><a class="color12" href="#"></a></li>
            </ul>
        </div>
        <div class="bottom">
            <a href="#" class="settings"><i class="fa fa-refresh fa-spin"></i></a>
        </div>
    </div>

     <script src="js/jquery.min.js"></script>

     <script src="js/jquery.easing.min.js"></script>

     <script src="js/bootstrap.min.js"></script>

     <script src="js/classie.js"></script>
     <script src="js/modalEffects.js"></script>

     <script src="js/waypoints.min.js" type="text/javascript"></script>
     <script src="js/jquery.counterup.min.js" type="text/javascript"></script>

     <script src="js/SmoothScroll.js"></script>

     <script src="js/jquery.stellar.min.js"></script>

     <script src="js/jquery.nav.js"></script>

     <script type="text/javascript" src="js/owl.carousel.min.js"></script>

     <script src="js/app.js"></script>


    <script type="text/javascript" src="js/switcher.js"></script>


  </body>
</html>

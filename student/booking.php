<?php
include_once '../database/dbConn.php';
session_start();

$studEmail =$_SESSION['studEmail'];
$studId =$_SESSION['studid'];
$studCamp =$_SESSION['campus'];


if (isset($_POST['book'])&&isset($_SESSION['studid'])&&isset($_SESSION['studEmail']))
{

        $frmCampus = $_POST['fromCampus'];
        $toCampus = $_POST['toCampus'];
        $time = $_POST['time'];


        if (!empty($frmCampus))
        {
            if (!empty($toCampus))
            {
                    if (!empty($time))
                    {
                        if ($time>="06:00"&& $time<"21:30")
                        {
                              if ($frmCampus!= $toCampus)
                              {
                                    $trip = $frmCampus." to ".$toCampus;

                                    $sql = "SELECT* FROM tripbook WHERE  tripTime = '$time' AND studID = '$studId';";
                                    $result = mysqli_query($conn,$sql);
                                    $num = mysqli_num_rows($result);


                                    if ($num>0)
                                    {
                                      $_SESSION['message'] = "You have Already book another trip for that time";
                                      $_SESSION['msg_type'] = "danger";

                                      echo "<script>location.replace('booking.php');</script>";
                                      exit();
                                    }
                                    else
                                    {

                                            $sql = "INSERT INTO tripbook(tripName,tripTime,studID)
                                                    VALUES('$trip','$time','$studId')";
                                            mysqli_query($conn,$sql);

                                            $_SESSION['message'] = "You have Successfully book trip";
                                            $_SESSION['msg_type'] = "success";
                                            echo "<script>location.replace('mybooking.php');</script>";
                                            exit();

                                    }

                              }
                              else
                              {
                                $_SESSION['message'] = "You can not select same campus for travel";
                                $_SESSION['msg_type'] = "danger";

                               echo "<script>location.replace('booking.php');</script>";
                               exit();
                              }
                        }
                    }
                    else
                    {
                      $_SESSION['message'] = "Please select time";
                      $_SESSION['msg_type'] = "danger";

                     echo "<script>location.replace('booking.php');</script>";
                     exit();
                    }
            }
            else
            {
              $_SESSION['message'] = "Select you going to which campus";
              $_SESSION['msg_type'] = "danger";

             echo "<script>location.replace('booking.php');</script>";
             exit();
            }
        }
        else
        {
          $_SESSION['message'] = "Select you from which campus";
          $_SESSION['msg_type'] = "danger";

         echo "<script>location.replace('booking.php');</script>";
         exit();
        }



}

?>
<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8"/>


  <title>TUT ONLINE BUS BOOOKING</title>


  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>


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

<body data-spy="scroll" data-offset="80">


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
          <li><a href="index.php">Home</a></li>
          <li><a href="booking.php">Book BUS</a></li>
          <li><a href="mybooking.php">See Bookings</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="logout.php">Logout</a></li>

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
                    <div class="col-lg-10 col-xl-7 mx-auto">
                        <h3 class="text-center">Make Booking</h3>

                        <form action="booking.php" method="post">
                            <div class="form-group mb-3">
                              <select class="form-control"   name="fromCampus" style="border-radius: 50px;">
                              <option  value="">From Campus</option>
                              <option value="Arcadia Campus">Arcadia Campus</option>
                              <option value="Pretoria Campus">Pretoria Campus</option>
                              <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                              <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                          </select>
                            </div>
                            <div class="form-group mb-3">
                              <select class="form-control"  name="toCampus" style="border-radius: 50px;">
                                <option  value="">To Campus</option>
                                <option value="Arcadia Campus">Arcadia Campus</option>
                                <option value="Pretoria Campus">Pretoria Campus</option>
                                <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                                <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                            </select>
                            </div>
                            <div class="form-group mb-3">
                              <select class="form-control" style="border-radius: 50px;"  name="time">
                                  <option  value="">Time</option>
                                  <option value="06:00">06:00</option>
                                  <option value="06:30">06:30</option>
                                  <option value="07:00">07:00</option>
                                  <option value="07:30">07:30</option>
                                  <option value="08:00">08:00</option>
                                  <option value="08:30">08:30</option>
                                  <option value="09:00">09:00</option>
                                  <option value="09:30">09:30</option>
                                  <option value="10:00">10:00</option>
                                  <option value="10:30">10:30</option>
                                  <option value="11:00">11:00</option>
                                  <option value="11:30">11:30</option>
                                  <option value="12:00">12:00</option>
                                  <option value="12:30">12:30</option>
                                  <option value="13:00">13:00</option>
                                  <option value="13:30">13:30</option>
                                  <option value="14:00">14:00</option>
                                  <option value="14:30">14:30</option>
                                  <option value="15:00">15:00</option>
                                  <option value="15:30">15:30</option>
                                  <option value="16:00">16:00</option>
                                  <option value="16:30">16:30</option>
                                  <option value="17:00">17:00</option>
                                  <option value="17:30">17:30</option>
                                  <option value="18:00">18:00</option>
                                  <option value="18:30">18:30</option>
                                  <option value="19:00">19:00</option>
                                  <option value="19:30">19:30</option>
                                  <option value="20:00">20:00</option>
                                  <option value="20:30">20:30</option>
                                  <option value="21:00">21:00</option>
                                  <option value="21:30">21:30</option>
                              </select>

                            </div>
                            <div class="custom-control custom-checkbox mb-3">
                                <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                <label for="customCheck1" class="custom-control-label">Agree</label>
                            </div>
                            <button type="submit" name="book" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                            <div class="text-center d-flex justify-content-between mt-4"></div>
                        </form>
                    </div>
                </div>
            </div>






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
            </div> <
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

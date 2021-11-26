<?php
include_once 'database/dbConn.php';
session_start();



?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tshwane University of Technology</title>

       <link rel="stylesheet" href="css/bootstrap.min.css">

       <link rel="stylesheet" href="css/main.css">

       <link rel="stylesheet" href="css/responsive.css">

       <link rel="stylesheet" href="css/custom.css">

       <link rel="stylesheet" href="css/popper.min">
       <link rel="stylesheet" href="css/popper.min">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="shortcut icon" href="image/fast1.ico" type="image/x-icon">
   <link rel="apple-touch-icon" href="image/fast.png">
   <style media="screen">
          body{
              background-color: white;
          }
   </style>
  </head>
  <body>


  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid" >


                <a class="btn btn-primary" href="index.html"><p class="text-center">Home</p></a>


              <span class="navbar-toggler-icon"></span>
              </button>

        </div>

  </nav>
















<figure>
  <div class="fixed-wrap">
    <div id="fixed">

    </div>
  </div>
</figure>

<hr>


<section id="team" data-stellar-background-ratio="0.5">
  <div class="container">
  <div class="row ">
    <div class="col-lg-12 text-center rounded border light my-5">
      <h4>Total student Bookings</h4>
      <br>
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
<div class="col-lg-9">
<table class="table">
<thead class="text-center">
<tr>

<th scope="col" style="text-align:center">FROM</th>
<th scope="col" style="text-align:center">TO</th>
<th scope="col" style="text-align:center">TIME</th>
<th scope="col" style="text-align:center">Total Students</th>





<th scope="col"></th>


</tr>
</thead>
<tbody class="text-center">
  <?php

  $sql = "SELECT tripID, tripName, tripTime ,COUNT(*) as 'count'
          FROM tripbook
          GROUP BY tripName, tripTime order by tripTime Desc";
  $result = mysqli_query($conn,$sql);
  $num = mysqli_num_rows($result);

          if ($num >0)
          {


            while ($row = mysqli_fetch_assoc($result))
            {


                $t = $row['tripTime'];
                $combo = $row['tripName'];
                $toCampus = substr($combo,
                             3+strpos($combo," to "));
                $frmCampus = substr($combo,0,
                                   strpos($combo," to "));
                $count = $row['count'];


                  echo "
                  <tr>

                  <td>
                      $frmCampus
                  </td>
                  <td>
                      $toCampus
                  </td>
                  <td>
                      $t
                  </td>
                  <td>
                      $count
                  </td>





                  </tr>";
            }
          }
          else
          {
                             echo "<td colspan='9'>No boking found</td>";
          }


  ?>

</tbody>
</table>


</div>

  </div>
</div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr>



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

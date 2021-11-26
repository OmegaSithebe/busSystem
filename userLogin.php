<?php
include_once 'database/dbConn.php';
session_start();


if (isset($_POST['btnLogin']))
{

        $email = $_POST['email'];
        $pwd = $_POST['password'];


        if (!empty($email))
        {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                      if (!empty($pwd))
                      {
                              $sql = "SELECT* FROM student WHERE studEmail = '$email';";
                              $result = mysqli_query($conn,$sql);

                              $num = mysqli_num_rows($result);

                              if ($num == 1)
                              {

                                  $row = mysqli_fetch_assoc($result);
                                  if (password_verify ($pwd,$row['studPassword']))
                                  {

                                    $_SESSION['studEmail'] = $row['studEmail'];
                                    $_SESSION['studid'] = $row['studID'];
                                    $_SESSION['campus'] = $row['campusName'];

                                    echo "<script>location.replace('student/index.php');</script>";
                                    exit();
                                  }
                                  else
                                  {
                                    $_SESSION['message'] = "Password does not match";
                                    $_SESSION['msg_type'] = "danger";


                                   $_SESSION['em'] = $email;
                                   echo "<script>location.replace('login.php');</script>";
                                   exit();
                                  }

                              }
                              else
                              {
                                $_SESSION['message'] = "Student is not registered";
                                $_SESSION['msg_type'] = "danger";


                               $_SESSION['em'] = $email;
                               echo "<script>location.replace('login.php');</script>";
                               exit();
                              }
                      }
                      else
                      {
                        $_SESSION['message'] = "Password is empty";
                        $_SESSION['msg_type'] = "danger";


                       $_SESSION['em'] = $email;
                       echo "<script>location.replace('login.php');</script>";
                       exit();
                      }
                }
                else
                {
                  $_SESSION['message'] = "Email is invalid";
                  $_SESSION['msg_type'] = "danger";


                 $_SESSION['em'] = $email;
                 echo "<script>location.replace('login.php');</script>";
                 exit();
                }
        }
        else
        {
          $_SESSION['message'] = "Email field is empty";
          $_SESSION['msg_type'] = "danger";


         $_SESSION['em'] = $email;
         echo "<script>location.replace('login.php');</script>";
         exit();
        }

}

 ?>

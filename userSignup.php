<?php
include_once 'database/dbConn.php';
session_start();

  if (isset($_POST['register']))
  {
          $name  = mysqli_real_escape_string($conn,ucwords($_POST['name']));
          $surname  = mysqli_real_escape_string($conn,ucwords($_POST['surname']));
          $studNo  = mysqli_real_escape_string($conn,$_POST['studNo']);
          $email = mysqli_real_escape_string($conn,$_POST['email']);
          $gender = mysqli_real_escape_string($conn,$_POST['gender']);
          $campus  = mysqli_real_escape_string($conn,$_POST['cmpus']);
          $faculty = mysqli_real_escape_string($conn,$_POST['faculty']);
          $password = mysqli_real_escape_string($conn,$_POST['password']);
          $cPassword = mysqli_real_escape_string($conn,$_POST['cPassword']);




          if (!empty($name))
          {
                if (preg_match("/^[a-zA-Z\s]+$/",$name))
                {
                        if (!empty($surname))
                        {
                                if (preg_match("/^[a-zA-Z]+$/",$surname))
                                {
                                      if (!empty($studNo))
                                      {
                                            if (preg_match("/^[0-9]+$/",$studNo))
                                            {
                                                    if (substr($studNo,0,1) == "2")
                                                    {
                                                            $year = "20".substr($studNo,1,2);

                                                            $y = date("Y") ;

                                                            if (strlen($studNo) == 9)
                                                            {
                                                                      if ($year <= $y)
                                                                      {
                                                                              if (!empty($gender))
                                                                              {
                                                                                          if (!empty($campus))
                                                                                          {
                                                                                                    if (!empty($faculty))
                                                                                                    {
                                                                                                              if (!empty($password)&&!empty($cPassword))
                                                                                                              {
                                                                                                                        if ($password == $cPassword)
                                                                                                                        {
                                                                                                                                  $sql = "SELECT* FROM student WHERE studNo = '$studNo'";
                                                                                                                                  $result = mysqli_query($conn,$sql);
                                                                                                                                  $num = mysqli_num_rows($result);

                                                                                                                                  if ($num>0)
                                                                                                                                  {
                                                                                                                                    $_SESSION['message'] = "Student Number Already have account";
                                                                                                                                    $_SESSION['msg_type'] = "danger";

                                                                                                                                   $_SESSION['n'] = $name;
                                                                                                                                   $_SESSION['sur'] = $surname;
                                                                                                                                   $_SESSION['studnum'] = $studNo;
                                                                                                                                   $_SESSION['em'] = $email;
                                                                                                                                   $_SESSION['gender'] = $gender;
                                                                                                                                   $_SESSION['camp'] =   $campus;
                                                                                                                                   $_SESSION['fal'] = $faculty;

                                                                                                                                   echo "<script>location.replace('signup.php');</script>";
                                                                                                                                   exit();
                                                                                                                                  }
                                                                                                                                  else
                                                                                                                                  {

                                                                                                                                          $newPwd = password_hash($cPassword, PASSWORD_DEFAULT);
                                                                                                                                          $sql = "INSERT INTO student(studName, studSurname, studNo, studEmail, studGender, studPassword, campusName, facultyName)
                                                                                                                                                  VALUES('$name', '$surname', '$studNo', '$email', '$gender', '$newPwd', '$campus', '$faculty')";

                                                                                                                                          mysqli_query($conn,$sql);

                                                                                                                                          echo '<script>alert("Student Successfully registered")</script>';
                                                                                                                                          echo "<script>location.replace('login.php');</script>";


                                                                                                                                  }

                                                                                                                        }
                                                                                                                        else
                                                                                                                        {
                                                                                                                          $_SESSION['message'] = "Password does not match";
                                                                                                                          $_SESSION['msg_type'] = "danger";

                                                                                                                         $_SESSION['n'] = $name;
                                                                                                                         $_SESSION['sur'] = $surname;
                                                                                                                         $_SESSION['studnum'] = $studNo;
                                                                                                                         $_SESSION['em'] = $email;
                                                                                                                         $_SESSION['gender'] = $gender;
                                                                                                                         $_SESSION['camp'] =   $campus;
                                                                                                                         $_SESSION['fal'] = $faculty;

                                                                                                                         echo "<script>location.replace('signup.php');</script>";
                                                                                                                         exit();
                                                                                                                        }
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                $_SESSION['message'] = "Password is empty";
                                                                                                                $_SESSION['msg_type'] = "danger";

                                                                                                               $_SESSION['n'] = $name;
                                                                                                               $_SESSION['sur'] = $surname;
                                                                                                               $_SESSION['studnum'] = $studNo;
                                                                                                               $_SESSION['em'] = $email;
                                                                                                               $_SESSION['gender'] = $gender;
                                                                                                               $_SESSION['camp'] =   $campus;
                                                                                                               $_SESSION['fal'] = $faculty;
                                                                                                               
                                                                                                               echo "<script>location.replace('signup.php');</script>";
                                                                                                               exit();
                                                                                                              }
                                                                                                    }
                                                                                                    else
                                                                                                    {
                                                                                                      $_SESSION['message'] = "Select Faculty";
                                                                                                      $_SESSION['msg_type'] = "danger";

                                                                                                     $_SESSION['n'] = $name;
                                                                                                     $_SESSION['sur'] = $surname;
                                                                                                     $_SESSION['studnum'] = $studNo;
                                                                                                     $_SESSION['em'] = $email;
                                                                                                     $_SESSION['gender'] = $gender;
                                                                                                     $_SESSION['camp'] =   $campus;
                                                                                                     $_SESSION['fal'] = $faculty;

                                                                                                     echo "<script>location.replace('signup.php');</script>";
                                                                                                     exit();
                                                                                                    }
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                            $_SESSION['message'] = "Select Campus";
                                                                                            $_SESSION['msg_type'] = "danger";

                                                                                           $_SESSION['n'] = $name;
                                                                                           $_SESSION['sur'] = $surname;
                                                                                           $_SESSION['studnum'] = $studNo;
                                                                                           $_SESSION['em'] = $email;
                                                                                           $_SESSION['gender'] = $gender;
                                                                                           $_SESSION['camp'] =   $campus;
                                                                                           $_SESSION['fal'] = $faculty;

                                                                                           echo "<script>location.replace('signup.php');</script>";
                                                                                           exit();
                                                                                          }
                                                                              }
                                                                              else
                                                                              {
                                                                                $_SESSION['message'] = "Select Gender";
                                                                                $_SESSION['msg_type'] = "danger";

                                                                               $_SESSION['n'] = $name;
                                                                               $_SESSION['sur'] = $surname;
                                                                               $_SESSION['studnum'] = $studNo;
                                                                               $_SESSION['em'] = $email;
                                                                               $_SESSION['gender'] = $gender;
                                                                               $_SESSION['camp'] =   $campus;
                                                                               $_SESSION['fal'] = $faculty;

                                                                               echo "<script>location.replace('signup.php');</script>";
                                                                               exit();
                                                                              }
                                                                      }
                                                                      else
                                                                      {
                                                                        $_SESSION['message'] = "Student number  must less 2022 ";
                                                                        $_SESSION['msg_type'] = "danger";

                                                                       $_SESSION['n'] = $name;
                                                                       $_SESSION['sur'] = $surname;
                                                                       $_SESSION['studnum'] = $studNo;
                                                                       $_SESSION['em'] = $email;
                                                                       $_SESSION['gender'] = $gender;
                                                                       $_SESSION['camp'] =   $campus;
                                                                       $_SESSION['fal'] = $faculty;

                                                                       echo "<script>location.replace('signup.php');</script>";
                                                                       exit();
                                                                      }
                                                            }
                                                            else
                                                            {
                                                              $_SESSION['message'] = "Student number  must 9 numbers only(216599390)";
                                                              $_SESSION['msg_type'] = "danger";

                                                             $_SESSION['n'] = $name;
                                                             $_SESSION['sur'] = $surname;
                                                             $_SESSION['studnum'] = $studNo;
                                                             $_SESSION['em'] = $email;
                                                             $_SESSION['gender'] = $gender;
                                                             $_SESSION['camp'] =   $campus;
                                                             $_SESSION['fal'] = $faculty;

                                                             echo "<script>location.replace('signup.php');</script>";
                                                             exit();
                                                            }



                                                    }
                                                    else
                                                    {
                                                      $_SESSION['message'] = "Student number must begin with 2";
                                                      $_SESSION['msg_type'] = "danger";

                                                     $_SESSION['n'] = $name;
                                                     $_SESSION['sur'] = $surname;
                                                     $_SESSION['studnum'] = $studNo;
                                                     $_SESSION['em'] = $email;
                                                     $_SESSION['gender'] = $gender;
                                                     $_SESSION['camp'] =   $campus;
                                                     $_SESSION['fal'] = $faculty;

                                                     echo "<script>location.replace('signup.php');</script>";
                                                     exit();
                                                    }

                                            }
                                            else
                                            {
                                              $_SESSION['message'] = "Student number field must be numbers only";
                                              $_SESSION['msg_type'] = "danger";

                                             $_SESSION['n'] = $name;
                                             $_SESSION['sur'] = $surname;
                                             $_SESSION['studnum'] = $studNo;
                                             $_SESSION['em'] = $email;
                                             $_SESSION['gender'] = $gender;
                                             $_SESSION['camp'] =   $campus;
                                             $_SESSION['fal'] = $faculty;

                                             echo "<script>location.replace('signup.php');</script>";
                                             exit();
                                            }
                                      }
                                      else
                                      {
                                        $_SESSION['message'] = "Student number field is empty";
                                        $_SESSION['msg_type'] = "danger";

                                       $_SESSION['n'] = $name;
                                       $_SESSION['sur'] = $surname;
                                       $_SESSION['studnum'] = $studNo;
                                       $_SESSION['em'] = $email;
                                       $_SESSION['gender'] = $gender;
                                       $_SESSION['camp'] =   $campus;
                                       $_SESSION['fal'] = $faculty;

                                       echo "<script>location.replace('signup.php');</script>";
                                       exit();
                                      }
                                }
                                else
                                {
                                    $_SESSION['message'] = "Surname field must be characters";
                                    $_SESSION['msg_type'] = "danger";

                                   $_SESSION['n'] = $name;
                                   $_SESSION['sur'] = $surname;
                                   $_SESSION['studnum'] = $studNo;
                                   $_SESSION['em'] = $email;
                                   $_SESSION['gender'] = $gender;
                                   $_SESSION['camp'] =   $campus;
                                   $_SESSION['fal'] = $faculty;

                                   echo "<script>location.replace('signup.php');</script>";
                                   exit();
                                }
                        }
                        else
                        {
                          $_SESSION['message'] = "Surname field is empty";
                          $_SESSION['msg_type'] = "danger";

                           $_SESSION['n'] = $name;
                           $_SESSION['sur'] = $surname;
                           $_SESSION['studnum'] = $studNo;
                           $_SESSION['em'] = $email;
                           $_SESSION['gender'] = $gender;
                           $_SESSION['camp'] =   $campus;
                           $_SESSION['fal'] = $faculty;

                           echo "<script>location.replace('signup.php');</script>";
                           exit();
                        }
                }
                else
                {
                      $_SESSION['message'] = "Name field must be characters";
                      $_SESSION['msg_type'] = "danger";

                       $_SESSION['n'] = $name;
                       $_SESSION['sur'] = $surname;
                       $_SESSION['studnum'] = $studNo;
                       $_SESSION['em'] = $email;
                       $_SESSION['gender'] = $gender;
                       $_SESSION['camp'] =   $campus;
                       $_SESSION['fal'] = $faculty;

                 echo "<script>location.replace('signup.php');</script>";
                 exit();
                }
          }
          else
          {
            $_SESSION['message'] = "Name field is empty";
            $_SESSION['msg_type'] = "danger";

           $_SESSION['n'] = $name;
           $_SESSION['sur'] = $surname;
           $_SESSION['studnum'] = $studNo;
           $_SESSION['em'] = $email;
           $_SESSION['gender'] = $gender;
           $_SESSION['camp'] =   $campus;
           $_SESSION['fal'] = $faculty;

           echo "<script>location.replace('signup.php');</script>";
           exit();
          }




  }
 ?>

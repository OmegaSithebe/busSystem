<?php

      session_start();

        unset($_SESSION['studEmail']);
        unset($_SESSION['studid']);
        unset($_SESSION['campus']);
        session_destroy();
        echo "<script>location.replace('../login.php');</script>";



?>

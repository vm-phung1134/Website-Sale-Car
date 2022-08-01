<?php
    include('config/connect.php');
    session_destroy();
    header('location:../NewWS_Technology/login.php');
?>
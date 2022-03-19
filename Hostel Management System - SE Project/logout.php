<?php
    session_start();
    session_destroy();
    header("Location: http://localhost/Hospital Management System - SE Project/login.php");
?>
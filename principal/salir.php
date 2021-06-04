<?php
session_start();
session_name('universidad');
session_destroy();
header('location:../index.php');
?>
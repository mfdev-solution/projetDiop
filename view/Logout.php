<?php
session_start();
unset($_SESSION['valid']);
unset($_SESSION['user']);
// unset($_SESSION['valid']);
header('Location:../index.php');
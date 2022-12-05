<?php
session_start();
unset($_SESSION['users_test']);
unset($_SESSION['users_test_admin']);
header('Location: ../index.php');
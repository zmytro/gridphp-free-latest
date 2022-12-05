<?php

    session_start();
    require_once 'connect.php';

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users_test` WHERE `login` = '$login' AND `password` = '$password'");
    $check_admin = mysqli_query($connect, "SELECT * FROM `users_test` WHERE `login` = '$login' AND `password` = '$password' AND `ADMIN_FLAG` like ('1')");
    session_start();
    if(mysqli_num_rows($check_user) > 0 && mysqli_num_rows($check_admin) > 0){
        $user = mysqli_fetch_assoc($check_user);
         session_start();
        $_SESSION['users_test_admin'] = [
            "full_name" => $user['full_name'],
            "login" => $user['login'],
            "email" => $user['email'],
            "FLAG" => $user['ADMIN_FLAG'],
            "id" => $user['id']
        ];

        header('Location: ../adm-page.php');
    }
    else if(mysqli_num_rows($check_user) > 0 && mysqli_num_rows($check_admin) < 1){
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['users_test'] = [
            "full_name" => $user['full_name'],
            "login" => $user['login'],
            "email" => $user['email'],
            "email" => $user['ADMIN_FLAG'],
            "id" => $user['id']
        ];

        header('Location: ../usr-page.php');
    }
    else if(mysqli_num_rows($check_user) < 1 && mysqli_num_rows($check_admin) < 1){
        header('Location: ../index.php');
    }
    ?>

<pre>
    <?php
    print_r($check_admin);
    print_r($user);
    ?>
</pre>
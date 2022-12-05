<?php

    $connect = mysqli_connect('localhost', 'root', '', 'grid_test');

    if (!$connect) {
        die('Error connect to DataBase');
    }
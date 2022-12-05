<?php
session_start();
if (isset($_POST["input-field"]) ) {
    echo 'in da code';
    $conn = new mysqli("localhost", "root", "", "grid_test");
    if($conn->connect_error){
        die("Ошибка: tut" . $conn->connect_error);
    }
    if($_SESSION['users_test_admin']['full_name'] == null){
        $name = $conn->real_escape_string($_SESSION['users_test']['full_name']);
        $id = $conn->real_escape_string($_SESSION['users_test']['id']);
    }else  $name = $conn->real_escape_string($_SESSION['users_test_admin']['full_name']);


    //$name = $conn->real_escape_string($_SESSION['users_test_admin']['full_name']);
    $post_id = $conn->real_escape_string(idate("U"));
    //$email = $conn->real_escape_string($_SESSION['users_test_admin']['email']);
    $time = $conn->real_escape_string(date("H:i:s"));
    $date = $conn->real_escape_string(date("d/m/y"));
    $text = $conn->real_escape_string($_POST["input-field"]);

    //$sql = "INSERT INTO 'user' ('post_id', 'ID', 'name', 'text', 'email', 'time', 'date')  VALUES ('$name', '$post_id','$text','$email','$time','$date')";
    $sql = "INSERT INTO `alerts`(`post_id`,`empl_id`, `notes`, `status`) VALUES (null,$id,'$text','new');";
    //$sql = "SELECT * FROM user";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: tam " . $conn->error;
    }
    $conn->close();
    //session_destroy();
    $redicet = $_SERVER['HTTP_REFERER'];
    @header ("Location: $redicet");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Yanone+Kaffeesatz&display=swap"
    rel="stylesheet" />


  <link rel="stylesheet" href="vendor/style2.css" />
</head>
<body>

<header>
        <div class="wrap-logo">
            <p class="header-p">Intelligent IT Management System</p>
        </div>
        
        <nav>
            <input type="button" class="reg2" value="Logout" onclick="location.href='vendor/logout.php'"></input>
        </nav>
</header>
    <?php

//запрос на выборку данных из счетчика посетителей
session_start();
$mysqli = new mysqli("localhost", "root", "", "grid_test");

$query1 = "SELECT * from employees e JOIN employees_pc pc ON e.employee_id = pc.emp_id where e.employee_id =".$_SESSION['users_test']['id'];
$result1 = $mysqli->query($query1); 




//echo 'Просмотров: '.$arr['counter'].' <br><br>';

//вывод данных из бд
//var_dump($query1);
echo '<div class = "gb">';
while ($row = $result1->fetch_assoc()) {
//echo '<b>Автор:</b>'.$row["name"].' <b>Отзыв:</b>'.$row["text"].' <b>Время:</b>'.$row["time"].' <b>Дата:</b>'.$row["date"];
echo '<br>';

echo '<div id="gb-entries">
<div class="gb-row">
  <div class="gb-datetime">Пользователь: '."". $row["first_name"] .' '. $row["last_name"] .'</div>
  <div class="gb-na">
    <span class="gb-name-b">PC'.' ID: '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["pc_id"].'</span><br>
    <span class="gb-name-b">PC'.' Name: '."&nbsp;&nbsp;&nbsp;&nbsp;".$row["pc_name"].'</span><br>
    <span class="gb-name-b">PC'.' Core: '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["core"].'</span><br>
    <span class="gb-name-b">HDD'.' Size: '."&nbsp;&nbsp;&nbsp;&nbsp;".$row["hdd_size"].'</span><br>  
    <span class="gb-name-b">RAM'.' Size: '."&nbsp;&nbsp;&nbsp;".$row["ram_size"].'</span><br> 
  </div>
  <div class="gb-user>
  <span class="gb-name-c> --------------------------------------</span><br>
    <span class="gb-name-c">EMP'.' ID: '."&nbsp;&nbsp;&nbsp;&nbsp;".$row["employee_id"].'</span><br>
    <span class="gb-name-c">Room'.' No: '."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row["room"].'</span><br>
    <span class="gb-name-c">Department'.' Name: '."&nbsp;&nbsp;&nbsp;&nbsp;".$row["department"].'</span><br>  
  </div>
</div>';
    
}
echo '</div>';
$mysqli->close();
?>
<form action="add-comm.php" method="POST">
        <div class="comment-form">
            <div class="input-div">
                <input type="text" class="input" name="input-field" placeholder="Enter some comments" required></input>
                <input type="submit" class="add-comm" value="Submit"></input>
                
            </div>
        </div>
    </form>
</body>
</html>
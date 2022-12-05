<?php

//запрос на выборку данных из счетчика посетителей
session_start();
$mysqli = new mysqli("localhost", "root", "", "grid_test");

$query1 = "SELECT * from employees e JOIN employees_pc pc ON e.employee_id = pc.emp_id where e.employee_id =".$_SESSION['users_test']['id'];
$result1 = $mysqli->query($query1); 




//echo 'Просмотров: '.$arr['counter'].' <br><br>';

//вывод данных из бд
var_dump($query1);
echo '<div class = "gb">';
while ($row = $result1->fetch_assoc()) {
//echo '<b>Автор:</b>'.$row["name"].' <b>Отзыв:</b>'.$row["text"].' <b>Время:</b>'.$row["time"].' <b>Дата:</b>'.$row["date"];
//echo '<br>';
echo $row["employee_id"];
echo '<div id="gb-entries">
<div class="gb-row">
  <div class="gb-datetime">'. $row["first_name"] .','. $row["time"] .'</div>
  <div class="gb-name">
    <span class="gb-name-a">'.$row["name"].'</span>
    <span class="gb-name-b">пишет:</span>
  </div>
  <div class="gb-comment">'.$row["text"].'</div>
</div>';
    
}
echo '</div>';
$mysqli->close();
?>
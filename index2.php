<?php
session_start();


if (!isset($_SESSION['users_test_admin']) && isset($_SESSION['users_test'])) {
    header('Location: index.php');
}
    if (isset($_SESSION['users_test_admin']) && !isset($_SESSION['users_test'])) {
      header('Location: adm-page.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=0.7, maximum-scale=1.0, user-scalable=no" />
  <title>Регистрация</title>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Yanone+Kaffeesatz&display=swap"
    rel="stylesheet" />


  <link rel="stylesheet" href="vendor/style.css" />
  <style>
    .dark-mode-form {
      color: white;

      background: #11182a;
      width: auto;
      height: auto;
      border: 20px solid #11182a;
      border-radius: 10px;
      top: 50%;
      left: 50%;
      box-shadow: 0 0 4px whitesmoke;
      /* Параметры тени */
    }
  </style>
  <script>
    function darkmode() {
      var element = document.body;
      var form = document.getElementById("login_form");
      element.classList.toggle("dark-mode");
      form.classList.toggle("dark-mode-form");
    }
  </script>
</head>

<body>
  <div class="container">
    <p class="dark">
      dark mode
      <input onclick="darkmode()" type="checkbox" id="checkbox" />
    </p>
    <div id="login_form" class="login_form">
      <form name="form" action="vendor/signin.php" method="POST">
        <legend align="center">Login form</legend>
        <p class="regform">Пожалуйста, введите логин и пароль.</p>
        <p>
          <input type="text" name="login"
            title="Не менее 5 символов(цифры,верхний и нижний регистры)" class="login" placeholder="Логин"
            autocomplete="off" />
        </p>
        <p>
          <input type="password" name="password"
            title="Не менее 8 символов(цифры,верхний и нижний регистры)" class="pass" placeholder="Пароль"
            autocomplete="off" />
        </p>
        <input class="submit-btn" type="submit" value="Войти" />
        <p class="notifications">
          Еще не зарегестрированы?<br/>
          <a href="register.php">зарегистрируйтесь</a>
        </p>

      </form>
    </div>
  </div>
  </div>

</body>

</html>
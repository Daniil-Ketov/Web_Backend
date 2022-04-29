<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Задание 5</title>
</head>
<body>
  <main>
<?php

/**
 * Файл login.php для не авторизованного пользователя выводит форму логина.
 * При отправке формы проверяет логин/пароль и создает сессию,
 * записывает в нее логин и id пользователя.
 * После авторизации пользователь перенаправляется на главную страницу
 * для изменения ранее введенных данных.
 **/

// Отправляем браузеру правильную кодировку,
// файл login.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// Начинаем сессию.
session_start();

// В суперглобальном массиве $_SESSION хранятся переменные сессии.
// Будем сохранять туда логин после успешной авторизации.
if (!empty($_SESSION['login'])) {
  // Если есть логин в сессии, то пользователь уже авторизован.
  // TODO: Сделать выход (окончание сессии вызовом session_destroy()
  //при нажатии на кнопку Выход).
  // Делаем перенаправление на форму.
  session_destroy();
  header('Location: ./');
}

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (array_key_exists('login_error', $_GET) && $_GET['login_error']) {
    print("<div>Неверный логин</div>");
  }
  if (array_key_exists('pass_error', $_GET) && $_GET['pass_error']) {
    print("<div>Неверный пароль</div>");
  }
?>

<form action="" method="post">
  <ul style="list-style: none;">
    <li>
      <label class="field-name">
        Логин <br>
      </label>
      <input type="text" name="login" />
    </li>
    <li>
      <label class="field-name">
        Пароль <br>
      </label>
      <input type="text" name="pass" />
    </li>
  </ul>
  <input type="submit" class="submit" value="Войти" />
</form>

<?php
}
// Иначе, если запрос был методом POST, т.е. нужно сделать авторизацию с записью логина в сессию.
else {
  $user = 'u47477';
  $pass_db = '5680591';
  $db = new PDO('mysql:host=localhost;dbname=u47477', $user, $pass_db, array(PDO::ATTR_PERSISTENT => true));
  $stmt1 = $db->prepare("SELECT * from users WHERE login = ?");
  $stmt1->execute([$_POST['login']]);
  $userdata = $stmt1->fetch(PDO::FETCH_ASSOC);
  if (empty($userdata)) {
    header('Location: ?login_error=1');
    exit();
  }
  if ($userdata['pass'] != md5($_POST['pass'])) {
    header('Location: ?pass_error=1');
    exit();
  }

  // Если все ок, то авторизуем пользователя.
  $_SESSION['login'] = $_POST['login'];
  // Записываем ID пользователя.
  $_SESSION['uid'] = $userdata['id'];

  // Делаем перенаправление.
  header('Location: ./');
}

?>
</main>
<footer>
  (c) Даниил Кетов 2022
</footer>
</body>
</html>
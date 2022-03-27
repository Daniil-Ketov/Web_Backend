<?php
// Отправляем браузеру правильную кодировку,
// файл index.php должен быть в кодировке UTF-8 без BOM.
header('Content-Type: text/html; charset=UTF-8');

// В суперглобальном массиве $_SERVER PHP сохраняет некторые заголовки запроса HTTP
// и другие сведения о клиненте и сервере, например метод текущего запроса $_SERVER['REQUEST_METHOD'].
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // В суперглобальном массиве $_GET PHP хранит все параметры, переданные в текущем запросе через URL.
  if (!empty($_GET['save'])) {
    // Если есть параметр save, то выводим сообщение пользователю.
    print('Спасибо, результаты сохранены.');
  }
  // Включаем содержимое файла form.php.
  include('form.php');
  // Завершаем работу скрипта.
  exit();
}
// Иначе, если запрос был методом POST, т.е. нужно проверить данные и сохранить их в XML-файл.

// Проверяем ошибки.
$errors = FALSE;
if (empty($_POST['name'])) {
  print('Заполните имя.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['e-mail'])) {
  print('Заполните e-mail.<br/>');
  $errors = TRUE;
}
else if (!preg_match("/[a-z0-9]+@[a-z0-9]+\.[a-z]+/i", $_POST['e-mail'])) {
  print('Введите корректный e-mail.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['bdate'])) {
  print('Заполните дату рождения.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['gender'])) {
  print('Заполните пол.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['limbs'])) {
  print('Заполните число конечностей.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['bio'])) {
  print('Заполните биографию.<br/>');
  $errors = TRUE;
}
else if (empty($_POST['checkbox'])) {
  print('Согласитесь с контрактом.<br/>');
  $errors = TRUE;
}

if ($errors) {
  // При наличии ошибок завершаем работу скрипта.
  exit();
}

// Сохранение в базу данных.
$name = $_POST['name'];
$email = strtolower($_POST['e-mail']);
$bdate = $_POST['bdate'];
$gender = $_POST['gender'];
$limbs = $_POST['limbs'];
$superpowers = implode(',', $_POST['superpower']);
$bio = $_POST['bio'];
$check = $_POST['checkbox'];


$user = 'u47477';
$pass = '5680591';
$db = new PDO('mysql:host=localhost;dbname=u47477', $user, $pass, array(PDO::ATTR_PERSISTENT => true));

// Подготовленный запрос. Не именованные метки.
try {
  $stmt = $db->prepare("INSERT INTO form SET name = ?, email = ?, bdate = ?, gender = ?, limbs = ?, superpowers = ?, bio = ?");
  $stmt -> execute(array($name, $email, $bdate, $gender, $limbs, $superpowers, $bio));
  $id = $db->lastInsertId();
  echo "Данные успешно сохранены." . $id;
}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}

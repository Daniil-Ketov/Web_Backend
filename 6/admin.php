<?php

if (empty($_SERVER['PHP_AUTH_USER']) ||
    empty($_SERVER['PHP_AUTH_PW']) ||
    !empty($_GET['logout'])) {
  header('HTTP/1.1 401 Unanthorized');
  header('WWW-Authenticate: Basic realm="Authorization error"');
  print('<h1>401 Требуется авторизация</h1>');
  exit();
}

  $user = 'u47477';
  $pass_db = '5680591';
  $db = new PDO('mysql:host=localhost;dbname=u47477', $user, $pass_db, array(PDO::ATTR_PERSISTENT => true));
  $stmt1 = $db->prepare("SELECT * from admins WHERE login = ?");
  $stmt1->execute([$_SERVER['PHP_AUTH_USER']]);
  $admindata = $stmt1->fetch(PDO::FETCH_ASSOC);
  if (empty($admindata) || $admindata['pass'] != md5($_SERVER['PHP_AUTH_PW'])) {
    header('HTTP/1.1 401 Unanthorized');
    header('WWW-Authenticate: Basic realm="Authorization error"');
    print('<h1>401 Неверные данные входа</h1>');
    exit();
  }

print('Вы успешно авторизовались и видите защищенные паролем данные.');
?>
<br>
<form>
  <a href="./?logout=1">Выйти</a>
</form>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $stmtc = $db->prepare("SELECT ability, count(s.id) AS count FROM super AS s GROUP BY s.ability");
    $stmtc->execute();
    while($r = $stmtc->fetch(PDO::FETCH_ASSOC)) {
      print($r['ability'] . " " . $r['count'] . "<br>");
    }
    $stmt1 = $db->prepare("SELECT * from form");
    $stmt1->execute();
    while($r = $stmt1->fetch(PDO::FETCH_ASSOC)) {
        print();
        $stmt2 = $db->prepare("SELECT ability from super WHERE id = ?");
        $stmt2->execute([$r['id']);
        while($userdata = $stmt2->fetch(PDO::FETCH_ASSOC)) {
            $superpowers.array_push($userdata['ability']);
        }
    }
    
    }
  }
?>

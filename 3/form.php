<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>Задание 3</title>
</head>
<body>
  <main>
    <form action="" method="POST">
      <ul style="list-style: none;">
        <li>
          <label class="field-name">
            Имя <br>
          </label>
          <input name="name" type="text" />
        </li>
        <li>
          <label class="field-name">
            e-mail <br>
          </label>
          <input name="e-mail" type="text" />
        </li>
        <li>      
          <label class="field-name">
            Год рождения <br>
          </label>
          <select name="bdate[]" class="select-dropdown">
          <?php
            $options = array();
            for ($i = 1900; $i <= 2022; $i++) {
              $options[] = $i;
            }
            foreach ($options as $option) {
            ?>
              <option value=<?php echo $option;?>>
                <?php echo $option;?>
              </option>
            <?php
            }
            ?>
          </select>
        </li>
        <li>
          <label class="field-name">
            Пол <br>
          </label>
          <input type="radio" name="gender" value="m">
          <label>
            Мужской
          </label>
          <input type="radio" name="gender" value="w">
          <label>
            Женский
          </label>
        </li>
        <li>
          <label class="field-name">
            Количество конечностей <br>
          </label>
          <input type="radio" name="limbs" value=0>
          <label>0</label>
          <input type="radio" name="limbs" value=1>
          <label>1</label>
          <input type="radio" name="limbs" value=2>
          <label>2</label>
          <input type="radio" name="limbs" value=3>
          <label>3</label>
          <input type="radio" name="limbs" value=4>
          <label>4</label>
          <input type="radio" name="limbs" value=5>
          <label>5+</label>
        </li>
        <li>
          <label class="field-name">
            Сверхспособности <br>
          </label>
          <select multiple="true" name="superpower[]" class="select-list">
              <option value="Бессмертие">Бессмертие</option>
              <option value="Прохождение сквозь стены">Прохождение сквозь стены</option>
              <option value="Левитация">Левитация</option>
          </select>
        </li>
        <li>
          <label class="field-name">
            Биография <br>
          </label>
          <textarea name="bio" cols="30" rows="10" style="resize: none;"></textarea>
        </li>
        <li>
          <input type="checkbox" name="checkbox">
          <label>
            С контрактом ознакомлен
          </label>
        </li>
        <li>
          <input type="submit" class="submit" value="Отправить" />
        </li>
      </ul>
    </form>
  </main>
  <footer>
		(c) Даниил Кетов 2022
	</footer>
</body>
</html>


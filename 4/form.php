<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Задание 4</title>
</head>
<body>
  <main>
    <?php
      if (!empty($messages)) {
        print('<div id="messages">');
        // Выводим все сообщения.
        foreach ($messages as $message) {
          print($message);
        }
        print('</div>');
      }
      
      // Далее выводим форму отмечая элементы с ошибками классом error
      // и задавая начальные значения элементов ранее сохраненными.
    ?>
    <div class="popup-success"></div>
    <form action="" method="POST">
      <ul style="list-style: none;">
        <li>
          <label class="field-name">
            Имя <br>
          </label>
          <input name="name" type="text" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php print $values['name']; ?>" />
        </li>
        <li>
          <label class="field-name">
            e-mail <br>
          </label>
          <input name="email" type="text" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" />
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
			<p <?php if ($errors['gender']) {print 'class="error"';} ?> > <?php print $values['gender']; ?> </p>
          </label>
          <input type="radio" name="gender" value="m" <?php if ($errors['gender']) {print 'class="error"';} ?> >
          <label>
            Мужской
          </label>
          <input type="radio" name="gender" value="w" <?php if ($errors['gender']) {print 'class="error"';} ?> >
          <label>
            Женский
          </label>
        </li>
        <li>
          <label class="field-name">
            Количество конечностей <br>
			<p <?php if ($errors['limbs']) {print 'class="error"';} ?> > <?php print $values['limbs']; ?> </p>
          </label>
          <input type="radio" name="limbs" value=0 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>0</label>
          <input type="radio" name="limbs" value=1 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>1</label>
          <input type="radio" name="limbs" value=2 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>2</label>
          <input type="radio" name="limbs" value=3 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>3</label>
          <input type="radio" name="limbs" value=4 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>4</label>
          <input type="radio" name="limbs" value=5 <?php if ($errors['limbs']) {print 'class="error"';} ?> >
          <label>5+</label>
        </li>
        <li>
          <label class="field-name">
            Сверхспособности <br>
          </label>
          <select multiple="true" name="superpowers[]" class="select-list">
              <option value="Бессмертие">Бессмертие</option>
              <option value="Прохождение сквозь стены">Прохождение сквозь стены</option>
              <option value="Левитация">Левитация</option>
          </select>
        </li>
        <li>
          <label class="field-name">
            Биография <br>
          </label>
          <textarea name="bio" cols="30" rows="10" style="resize: none;" <?php if ($errors['bio']) {print 'class="error"';} ?> value="<?php print $values['bio']; ?>"></textarea>
        </li>
        <li>
		  <p <?php if ($errors['checkbox']) {print 'class="error"';} ?> > <?php print $values['checkbox']; ?> </p>
          <input type="checkbox" name="checkbox" <?php if ($errors['checkbox']) {print 'class="error"';} ?> >
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
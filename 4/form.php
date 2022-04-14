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
    <div class="popup-success"></div>
    <form action="" method="POST">
      <ul style="list-style: none;">
        <li>
          <label class="field-name">
            Имя <br>
          </label>
          <input name="name" type="text" <?php if ($errors['name']) {print 'class="error"';} ?> value="<?php print $errors['name'] ? $messages['name'] : $values['name']; ?>" />
        </li>
        <li>
          <label class="field-name">
            e-mail <br>
          </label>
          <input name="email" type="text" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $errors['email'] ? $messages['email'] : $values['email']; ?>" />
        </li>
        <li>      
          <label class="field-name">
            Год рождения <br>
            <p <?php if ($errors['bdate']) {print 'class="error"';} ?> > <?php if ($messages['bdate']) print $messages['bdate']; ?> </p>
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
			      <p <?php if ($errors['gender']) {print 'class="error"';} ?> > <?php if ($messages['gender']) print $messages['gender']; ?> </p>
          </label>
          <input type="radio" name="gender" value="m" <?php if ($errors['gender']) {print 'class="error"';} else if ($values['gender']) {print 'checked';} ?> >
          <label>
            Мужской
          </label>
          <input type="radio" name="gender" value="w" <?php if ($errors['gender']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>
            Женский
          </label>
        </li>
        <li>
          <label class="field-name">
            Количество конечностей <br>
			      <p <?php if ($errors['limbs']) {print 'class="error"';} ?> > <?php if ($messages['limbs']) print $messages['limbs']; ?> </p>
          </label>
          <input type="radio" name="limbs" value=0 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>0</label>
          <input type="radio" name="limbs" value=1 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>1</label>
          <input type="radio" name="limbs" value=2 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>2</label>
          <input type="radio" name="limbs" value=3 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>3</label>
          <input type="radio" name="limbs" value=4 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>4</label>
          <input type="radio" name="limbs" value=5 <?php if ($errors['limbs']) {print 'class="error"';} else if ($values['limbs']) {print 'checked';} ?> >
          <label>5+</label>
        </li>
        <li>
          <label class="field-name">
            Сверхспособности <br>
            <p <?php if ($errors['superpowers']) {print 'class="error"';} ?> > <?php if ($messages['superpowers']) print $messages['superpowers']; ?> </p>
          </label>
          <select multiple="true" name="superpowers[]" class="select-list">
              <option value="Бессмертие" <?php if (in_array("Бессмертие", $superpowers)) {print 'checked';} ?> >Бессмертие</option>
              <option value="Прохождение сквозь стены" <?php if (in_array("Прохождение сквозь стены", $superpowers)) {print 'checked';} ?> >Прохождение сквозь стены</option>
              <option value="Левитация" <?php if (in_array("Левитация", $superpowers)) {print 'checked';} ?> >Левитация</option>
          </select>
        </li>
        <li>
          <label class="field-name">
            Биография <br>
          </label>
          <textarea name="bio" cols="30" rows="10" style="resize: none;" <?php if ($errors['bio']) {print 'class="error"';} ?> value="<?php print $messages['bio']; ?>"></textarea>
        </li>
        <li>
		      <p <?php if ($errors['checkbox']) {print 'class="error"';} ?> > <?php if ($messages['checkbox']) print $messages['checkbox']; ?> </p>
          <input type="checkbox" name="checkbox" <?php if ($errors['checkbox']) {print 'class="error"';} ?> >
          <label>
            С контрактом ознакомлен
          </label>
        </li>
        <li>
          <input type="submit" class="submit" value="Отправить" />
          <p><?php if ($messages['save']) print $messages['save']; ?></p>
        </li>
      </ul>
    </form>
  </main>
  <footer>
		(c) Даниил Кетов 2022
	</footer>
</body>
</html>

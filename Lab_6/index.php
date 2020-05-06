<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>PerezhoginFV 191-322 Лабораторная работа 2</title>
</head>

<body style="<? if ($_POST['cange'] == 'print') echo 'background: #fff; border: solid #000; width: calc(100% - 50px); height: calc(100% - 50px); margin-top: 25px'?>">
	<header style="<? if ($_POST['cange'] == 'print') echo 'background: #fff;'?>">
		<div class="container">
			<div class="header__wrap">
				<img class="logo" src="img/<? if ($_POST['cange'] == 'print') echo 'logo-black.png'; else echo 'logo-white.png'?>" alt="Логотип">
			</div>
		</div>
	</header>
	<main>
		<div class="container">
			<?
				if(!$_POST['submit']) {
				print ('<form action="#" method="POST">
					<fieldset class="test">
					<legend>Введите ваши данные</legend>');
						echo '<label><span>Номер группы<span style="color: red;"> *</span></span>
						<input required type="text" name="group" placeholder="Введите номер группы" value="'.$_GET['G'].'"></label>';
					echo '<label><span>ФИО<span style="color: red;"> *</span></span>';
						echo '<input required type="text" name="fio" placeholder="Введите ФИО" value="'.$_GET['F'].'"></label>';
					print ('
					<label><span>Информация о себе</span>
						<textarea placeholder="Расскажите о себе" name="about" id=""></textarea>
					</label></fieldset>
					<fieldset class="test">
					<legend>Даны А, Б, В, решите исходя из задачи.</legend>');
					echo '<label><span>Значение А</span>';
						echo '<input type="text" name="A" placeholder="Введите значение А" value="'.(rand(0,10000)/100).'"></label>';
					echo '<label><span>Значение Б</span>';
						echo '<input type="text" name="B" placeholder="Введите значение Б" value="'.(rand(0,10000)/100).'"></label>';
					echo '<label><span>Значение В</span>';
						echo '<input type="text" name="C" placeholder="Введите значение В" value="'.(rand(0,10000)/100).'"></label>';
					print ('<label><span>Ваш ответ</span>
						<input type="text" name="answer" placeholder="Введите ваш ответ">
					</label>
				</fieldset>
				<fieldset class="row">
					<legend>Выберите задачу<span style="color: red;"> *</span></legend>
					<div class="wrap-inputs">
						<label>Площадь треугольника
							<input required type="radio" name="task" value="s-triangle">
						</label>
						<label>Периметр треугольника
							<input required type="radio" name="task" value="p-triangle">
						</label>
						<label>Объем параллепипеда
							<input required type="radio" name="task" value="v-parallepiped">
						</label>
						<label>Среднее арифметическое
							<input required type="radio" name="task" value="mean">
						</label>
					</div>
					<div class="wrap-inputs">
						<label>Максимальное значение
							<input required type="radio" name="task" value="max">
						</label>
						<label>Минимальное значение
							<input required type="radio" name="task" value="min">
						</label>
						<label>Факториал
							<input required type="radio" name="task" value="factorial">
						</label>
						<label>Дискриминант
							<input required type="radio" name="task" value="dis">
						</label>
					</div>
				</fieldset>
				<fieldset>
					<label class="check">Отправить результат теста по e-mail');
					print ('<input name="checkbox" type="checkbox" onClick="isActive()"></label>
					 <label class="n-active"><span>Ваш e-mail</span>
						<input type="text" name="mail" placeholder="Введите ваш e-mail">
					</label>
				</fieldset>
				<fieldset class="clear">
					<legend>Выберите как предоставить отчет<span style="color: red;"> *</span></legend>
					<label><span>Версия для просмотра в браузере</span>
						<input required type="radio" name="cange" value="browser">
					</label>
					<label><span>Версия для печати</span>
						<input required type="radio" name="cange" value="print">
					</label>
				</fieldset>
				<input type="submit" name="submit" value="Проверить">
				<div style="font-size: .9rem; margin-top: 20px"><span style="color: red; font-size: 1.2rem;">"*"</span><span> — обязательные для заполнения поля.</span></div>
			</form>');
			}
				if (isset($_POST['A'])) {
					//ПЕРИМЕТР ТРЕУГОЛЬНИКА
					if ($_POST['task'] == 'p-triangle')
						$result = $_POST['A'] + $_POST['B'] + $_POST['C'];
					//ПЛОЩАДЬ ТРЕУГОЛЬНИКА
					else if ($_POST['task'] == 's-triangle') {
						$p = ($_POST['A'] + $_POST['B'] + $_POST['C'])/2;
						$result = round(sqrt($p * ($p - $_POST['A']) * ($p - $_POST['B']) * ($p - $_POST['C'])), 2);
					}
					//ОБЪЕМ ПАРАЛЛЕПИПЕДА
					else if ($_POST['task'] == 'v-parallepiped')
						$result = round(($_POST['A'] * $_POST['B'] * $_POST['C']), 2);
					//СРЕДНЕЕ АРИФМЕТИЧЕСКОЕ
					else if ($_POST['task'] == 'mean')
						$result = round(($_POST['A'] + $_POST['B'] + $_POST['C'])/3,2);
					//МАКСИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'max')
						$result = max($_POST['A'], $_POST['B'], $_POST['C']);
					//МИНИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'min')
						$result = min($_POST['A'], $_POST['B'], $_POST['C']);
					//ФАКТОРИЛ
					else if ($_POST['task'] == 'factorial') {
						$fA = 1;
						$fB = 1;
						$fC = 1;
						if ($_POST['A'] != '') {
							for ($i = 1; $i <= $_POST['A']; $i++)
								$fA = $fA * $i;
						}
						if ($_POST['B'] != '') {
							for ($i = 1; $i <= $_POST['B']; $i++)
								$fB = $fB * $i;
						}
						if ($_POST['C'] != '') {
							for ($i = 1; $i <= $_POST['C']; $i++)
								$fC = $fC * $i;
						}
						$result = [$fA,$fB,$fC];
					}
					//ДИСКРИМИНАНТ
					else if ($_POST['task'] == 'dis')
						$result = $_POST['B']**2 - 4 * $_POST['A'] * $_POST['C'];
				}
				if (isset($result) && $_POST['cange'] == 'browser') {
					echo '<div class="browser-report">';
					$out='<p class="browser-report__text">ФИО: <span>'.$_POST['fio'].'</span></p>';
					$out.='<p class="browser-report__text">Группа: <span>'.$_POST['group'].'</span></p>';
					if($_POST['about'])
						$out.='<p class="browser-report__text">О себе: </span>'.$_POST['about'].'</span></p>';
					$out.='<p class="browser-report__text">Решаемая задача: <span>';
					//ПЕРИМЕТР ТРЕУГОЛЬНИКА
					if ($_POST['task'] == 'p-triangle')
						$out .='Периметр Треугольника</span></p>';
					//ПЛОЩАДЬ ТРЕУГОЛЬНИКА
					else if ($_POST['task'] == 's-triangle')
						$out .= 'Площадь треугольника</span></p>';
					//ОБЪЕМ ПАРАЛЛЕПИПЕДА
					else if ($_POST['task'] == 'v-parallepiped')
						$out .= 'Объем параллепипеда</span></p>';
					//СРЕДНЕЕ АРИФМЕТИЧЕСКОЕ
					else if ($_POST['task'] == 'mean')
						$out .= 'Среднее арифметическое</span></p>';
					//МАКСИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'max')
						$out .= 'Максимальное значение</span></p>';
					//МИНИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'min')
						$out .= 'Минимальное значение</span></p>';
					//ФАКТОРИЛ
					else if ($_POST['task'] == 'factorial')
						$out .= 'Факториал</span></p>';
					//ДИСКРИМИНАНТ
					else if ($_POST['task'] == 'dis')
						$out .= 'Дискриминант</span></p>';
						if ($_POST['task'] == 'factorial') {
							$out .= '<p class="browser-report__text">Входные параметры: </p>';
							$out .= '<p class="browser-report__text">А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$check = explode(',', $_POST['answer']);
							for ($i = 0; $i < count($result); $i++) {
								$out .= '<p class="browser-report__text">Ваш ответ: <span>'.$check[$i].'</span></p>';
								$out .= '<p class="browser-report__text">Правильный ответ: <span>'.$result[$i].'</span></p>';
								if ($result[$i] == $check[$i])
									$out .= '<p class="browser-report__true">Верно</p>';
								else
									$out .= '<p class="browser-report__false">Не верно!</p>';
							}
						}
						else if($result == str_replace(',', '.', $_POST['answer'])) {
							$out .= '<p class="browser-report__text">Входные параметры: </p>';
							$out .= '<p class="browser-report__text"> А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$out .= '<p class="browser-report__text">Ваш ответ: <span>'.$_POST['answer'].'</span></p>';
							$out .= '<p class="browser-report__text">Правильный ответ: <span>'.$result.'</span></p>';
							$out .= '<p class="browser-report__passed">Тест пройден!</p>';
						}
						else {
							$out .= '<p class="browser-report__text">Входные параметры: </p>';
							$out .= '<p class="browser-report__text"> А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$out .= '<p class="browser-report__text">Ваш ответ: <span>'.$_POST['answer'].'</span></p>';
							$out .= '<p class="browser-report__text">Правильный ответ: <span>'.$result.'</span></p>';
							$out .= '<p class="browser-report__failed">ОШИБКА: Тест не пройден!</p>';
						}
					echo $out;
					echo '<a href="?F='.$_POST['fio'].'&G='.$_POST['group'].'" class="back_button">Повторить тест</a>';
				}

				else if(isset($result) && $_POST['cange'] == 'print') {
					echo '<div class="print-report">';
					$out='<p class="print-report__text">ФИО: <span>'.$_POST['fio'].'</span></p>';
					$out.='<p class="print-report__text">Группа: <span>'.$_POST['group'].'</span></p>';
					if($_POST['about'])
						$out.='<p class="print-report__text">О себе: </span>'.$_POST['about'].'</span></p>';
					$out.='<p class="print-report__text">Решаемая задача: <span>';
					//ПЕРИМЕТР ТРЕУГОЛЬНИКА
					if ($_POST['task'] == 'p-triangle')
						$out .='Периметр Треугольника</span></p>';
					//ПЛОЩАДЬ ТРЕУГОЛЬНИКА
					else if ($_POST['task'] == 's-triangle')
						$out .= 'Площадь треугольника</span></p>';
					//ОБЪЕМ ПАРАЛЛЕПИПЕДА
					else if ($_POST['task'] == 'v-parallepiped')
						$out .= 'Объем параллепипеда</span></p>';
					//СРЕДНЕЕ АРИФМЕТИЧЕСКОЕ
					else if ($_POST['task'] == 'mean')
						$out .= 'Среднее арифметическое</span></p>';
					//МАКСИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'max')
						$out .= 'Максимальное значение</span></p>';
					//МИНИМАЛЬНОЕ ЗНАЧЕНИЕ
					else if ($_POST['task'] == 'min')
						$out .= 'Минимальное значение</span></p>';
					//ФАКТОРИЛ
					else if ($_POST['task'] == 'factorial')
						$out .= 'Факториал</span></p>';
					//ДИСКРИМИНАНТ
					else if ($_POST['task'] == 'dis')
						$out .= 'Дискриминант</span></p>';
						if ($_POST['task'] == 'factorial') {
							$out .= '<p class="print-report__text">Входные параметры: </p>';
							$out .= '<p class="print-report__text">А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$check = explode(',', $_POST['answer']);
							for ($i = 0; $i < count($result); $i++) {
								$out .= '<p class="print-report__text">Ваш ответ: <span>'.$check[$i].'</span></p>';
								$out .= '<p class="print-report__text">Правильный ответ: <span>'.$result[$i].'</span></p>';
								if ($result[$i] == $check[$i])
									$out .= '<p class="print-report__true">Верно</p>';
								else
									$out .= '<p class="print-report__false">Не верно!</p>';
							}
						}
						else if($result == str_replace(',', '.', $_POST['answer'])) {
							$out .= '<p class="print-report__text">Входные параметры: </p>';
							$out .= '<p class="print-report__text"> А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$out .= '<p class="print-report__text">Ваш ответ: <span>'.$_POST['answer'].'</span></p>';
							$out .= '<p class="print-report__text">Правильный ответ: <span>'.$result.'</span></p>';
							$out .= '<p class="print-report__passed">Тест пройден!</p>';
						}
						else {
							$out .= '<p class="print-report__text">Входные параметры: </p>';
							$out .= '<p class="print-report__text"> А = <span>'.$_POST['A'].'</span> Б = <span>'.$_POST['B'].'</span> В = <span>'.$_POST['C'].'</span></p>';
							$out .= '<p class="print-report__text">Ваш ответ: <span>'.$_POST['answer'].'</span></p>';
							$out .= '<p class="print-report__text">Правильный ответ : <span>'.$result.'</span></p>';
							$out .= '<p class="print-report__failed">ОШИБКА: Тест не пройден!</p>';
						}
					echo $out;
				}
				if (isset($result) && $_POST['answer'] == '')
					echo '<p class="print-report__task">Задача самостоятельно решена не была</p>';
				if($_POST['mail'] != '') {
					mail($_POST['mail'], 'Результат тестирования',
					str_replace('<br>', "\r\n", $out),
					"From: auto@mami.ru\n"."Content-Type: text/plain; charset=utf-8\n");
					echo 'Результаты теста были автоматически отправлены на e-mail '.$_POST['mail'];
				}
				print ('
		</div>
	</main>
	<footer>
		<div class="container"></div>
	</footer>
	<script>let el = document.getElementsByName("checkbox");
	let check = document.querySelector(".check");
	let c = document.querySelector(".n-active");
	if (el[0].checked) {
		c.style.display="flex";
	}
	else
		c.style.display="none";

	function isActive() {
		if(el[0].checked)
			c.style.display="flex";
		else
			c.style.display="none";
	}
</script>
</body>');
?>
</html>
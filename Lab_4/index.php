<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>PerezhoginFV 191-322 Лабораторная работа 4</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="header__wrap">
				<img class="logo" src="img/logo.png" alt="Логотип">
			</div>
		</div>
	</header>
	<main>
		<div class="container">
		<?
			$col = 10;
			$structure = [ 'КарлуКларыукралре#кламуКларауКарлаукралабюджет'
									 , 'И*прыгают*скороговорки,*как*караси*на*сковородке'
									 , 'Четверть*четверики*гороха#без червоточинки'
									 , 'Скреативлен*креатив*не#по-креативному,*нужно*перекреативить!'];

			function getTR($data) {
				global $col;
				$arr = explode('*', $data);
				if (count($arr) > 1 && $col) {
					$ret = '<tr>';
						for($i=0; $i < $col; $i++)
							$ret .= '<td>'.$arr[$i].'</td>';
						return $ret.'</tr>';
				}
			}

			function outTable($structure) {
				global $count;
				$strings = explode('#', $structure);
				if (count($strings) > 1) {
					$datas='';
					for($i=0; $i<count($strings); $i++)
						$datas .= getTR($strings[$i]);
					if($datas)
						echo '<h2>Таблица № '.$count.'</h2><table>'.$datas.'</table>';
					else {
						echo '<div class="error">В таблице нет строк с ячейками</div>';
						$count--;
					}
				}
				else {
					echo '<div class="error">В таблице нет строк</div>';
					$count--;
				}
			}

			if ($col) {
		 	for($i = 0; $i < count($structure); $i++) {
				$count++;
				echo '<div class="wrap-table">';
				outTable($structure[$i]);
				echo '</div>';
			 }
			}
			else
				echo '<div class="error">Введено неправильное число колонок</div>';
			?>
		</div>
	</main>
	<footer>
		<div class="container"></div>
	</footer>
</body>
</html>
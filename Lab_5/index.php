<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>PerezhoginFV 191-322 Лабораторная работа 5</title>
</head>

<body>
	<header>
		<div class="container">
			<img class="logo" src="img/logo.png" alt="Логотип">
			<nav class="nav">
				<?
					echo '<a href="?html_type=TABLE';
					if(isset($_GET['content']))
						echo '&content='.$_GET['content'];
					echo '"';
					if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'TABLE')
						echo ' class="active"';
					echo '>Табличная форма</a>';
					echo '<a href="?html_type=DIV';
					if(isset($_GET['content']))
						echo '&content='.$_GET['content'];
					echo '"';
					if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV')
						echo ' class="active"';
					echo '>Блоковая Форма</a>';
				?>
			</nav>
		</div>
	</header>
	<main>
		<div class="container">
			<aside class="multi-table">
			<?
				echo '<a href="?html_type='.$_GET['html_type'].'"';
				if (!isset($_GET['content']))
					echo ' class="active"';
				echo '>Вся таблица умножения</a>';
					for ($i = 2; $i <= 9; $i++) {
						echo '<a href="?html_type='.$_GET['html_type'].'&content='.$i. '" ';
						if (isset($_GET['html_type']) && $_GET['content'] == $i)
							echo ' class="active"';
					echo '>Таблица умножения на '.$i.'</a>';
				}
			?>
			</aside>
			<div class="wrap">
			<?
				function outDiv() {
					if (!isset($_GET['content'])) {
						for($i=2; $i<10; $i++) {
							echo '<div class="ttRow all-table">';
							outRow( $i );
							echo '</div>';
						}
					}
					else {
						echo '<div class="ttRow col-table">';
						outRow( $_GET['content'] );
						echo '</div>';
					}
				}

				function outTable() {
					if (!isset($_GET['content'])) {
						echo '<table class="all-table">';
						for($i=2; $i<10; $i++) {
							echo '<tr>';
							outCol( $i );
							echo '</tr>';
						}
						echo '</table>';
					}
					else {
						echo '<table class="col-table">';
						echo '<tr>';
						outCol( $_GET['content'] );
						echo '</tr>';
						echo '</table>';
					}
				}

				function outRow ( $n ) {
					for($i = 2; $i <= 9; $i++) {
						echo '<span>';
						echo outLink($n);
						echo 'x';
						echo outLink($i);
						echo ' = ';
						echo outLink($i*$n);
						echo '</span>';
					}
				}

				function outCol ( $n ) {
					for($i = 2; $i <= 9; $i++) {
						echo '<td>';
						echo outLink($n);
						echo 'x';
						echo outLink($i);
						echo ' = ';
						echo outLink($i*$n);
						echo '</td>';
					}
				}

				function outLink( $x ) {
					if($x <= 9)
						echo '<a class="link-on-table" href="?content='.$x.'">'.$x.'</a>';
					else
						echo $x;
				}

				if ($_GET['html_type'] == '' || $_GET['html_type'] == 'TABLE')
					outTable();
				else
					outDiv();
				?>
		</div>
	</main>
	<footer>
		<div class="container">
			<div>
				<?
					if ($_GET['html_type'] == '' || $_GET['html_type'] == 'TABLE')
						$s = '<p>Табличный тип верстки</p>';
					else
						$s = '<p>Блочный тип верстки</p>';
					if(!isset($_GET['content']) || $_GET['content'] == '')
						$s .= '<p>Таблица умножения полностью</p>';
					else
						$s .= '<p>Столбец таблицы умножения на '.$_GET['content'].'</p>';
					echo $s.date('d.Y.M h:i:s');
				?>
			</div>
		</div>
	</footer>
</body>

</html>
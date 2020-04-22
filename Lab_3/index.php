<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>PerezhoginFV 191-322 Лабораторная работа 3</title>
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
			<div class="wrap__key">
				<div class="results">
				<?
				$c = '';
					if(!isset($_GET['store']))
						$_GET['store'] = '';
					if(isset($_GET['key']))
						echo $_GET['store'].= $_GET['key'];
					$_GET['c'].=$_GET['key'].=$_GET['k'];
				?>
				</div>
				<div class="wrap__num">
					<a href="?key=1&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">1</a>
					<a href="?key=2&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">2</a>
					<a href="?key=3&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">3</a>
					<a href="?key=4&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">4</a>
					<a href="?key=5&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">5</a>
					<a href="?key=6&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">6</a>
					<a href="?key=7&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">7</a>
					<a href="?key=8&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">8</a>
					<a href="?key=9&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">9</a>
					<a href="?key=0&store=<?php echo $_GET['store']; ?>&c=<?php echo $_GET['c']; ?>">0</a>
				</div>
				<a class="reset" href="?/&k=.&c=<?php echo $_GET['c']; ?>">СБРОС</a>
			</div>
		</div>
	</main>
	<footer>
		<div class="container">
			<?
			echo 'Число нажатий: '.strlen($_GET['c']);
			?>
		</div>
	</footer>
</body>

</html>
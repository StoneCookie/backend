<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<title>PerezhoginFV 191-322 Лабораторная работа 2 Вариант 8</title>
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
				$type = 'A';
				$x = -10;
				$encounting = 1000;
				$step = 5;
				$start = -53;
				$end = 1000;
				if ( $type == 'B' )
					echo '<ul>';
				if ( $type == 'C' )
					echo '<ol>';
				if ( $type == 'D' )
					echo '<table>
					<tr>
						<td>№</td>
						<td>Значение F(x)</td>
						<td>Значение Y</td>
					</tr>';
				if ( $type == 'E' )
					echo '<div class="type-e__list">';
				for( $i=1; $i < $encounting; $i++, $x += $step )
				{
					if( $x <= 10 )
						$f = 7 * $x + 18;
					else
						if( $x > 10 and $x < 20 )
							$f = ( $x - 17 )/( 8 - $x * 0.5);
					else
						$f = ( $x + 4 ) * ( $x - 7 );
					if ($f < $start or $f > $end)
						break;
					$arr[] = $f;
					if ( $type == 'A' )
						echo 'F( '.$x.' ) = '.round( $f, 3 ).'<br>';
					if ( $type == 'B' or $type == 'C' )
						echo '<li>F( '.$x. ') = '.round( $f, 3 ).'</li>';
					if ( $type == 'D' )
						echo '<tr>
							<td>'.$i.'.</td>
							<td>'.$x.'</td>
							<td>'.round( $f, 3 ).'</td>
						</tr>';
					if ( $type == 'E' )
						echo '<div class="type-e__item">F( '.$x. ') = '.round( $f, 3 ).'</div>';
				}
				$sum = array_sum( $arr );
				$avg = $sum / count( $arr );
				if ( $type == 'B' )
					echo '</ul>';
				if ( $type == 'C' )
					echo '</ol>';
				if ( $type == 'D' )
					echo '</table>';
				if ( $type == 'E' )
					echo '</div>';
				echo '<div class="arr">
								<span>Max: '.round( max( $arr ), 3 ).';</span>
								<span>Min: '.round( min($arr), 3 ).';</span>
								<span>Sum: '.round( $sum, 3 ).';</span>
								<span>Avg: '.round( $avg, 3 ).';</span>
							</div>';
				echo '</div>
							</main>
							<footer>
								<div class="container">';
				if ( $type == 'A' )
					echo 'Простая верстка текстом.';
				if ( $type == 'B' )
					echo 'Маркированный список.';
				if ( $type == 'C' )
					echo 'Нумерованный список.';
				if ( $type == 'D ')
					echo 'Табличная верстка.';
				if ( $type == 'E' )
					echo 'Блочная верстка.';
								'</div>
							</footer>'
	?>

</body>
</html>
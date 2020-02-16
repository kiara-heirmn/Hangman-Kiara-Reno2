<?php 
	session_start(); 
	include '../functionality/hangman.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hangman</title>
	<link rel="stylesheet" type="text/css" href="css/game.css">
</head>
<body>
	<div id="game-box">
		<?php if (isset($_SESSION['start'])): ?> 

			<img src='images/LOGO.png' id='top-hangman-img' alt=''>
			<h1>Game started</h1>

			<?php switch ($_SESSION['currentAttemps']) {
				case 1:
					echo "<img src='images/Fase1.png' class='hangman-img' alt=''>";
					break;
				case 2:
					echo "<img src='images/Fase2.png' class='hangman-img' alt=''>";
					break;
				case 3:
					echo "<img src='images/Fase3.png' class='hangman-img' alt=''>";
					break;
				case 4:
					echo "<img src='images/Fase4.png' class='hangman-img' alt=''>";
					break;
				case 5:
					echo "<img src='images/Fase5.png' class='hangman-img' alt=''>";
					break;
				case 6:
					echo "<img src='images/Fase6.png' class='hangman-img' alt=''>";
					break;
				case 7:
					echo "<img src='images/Fase7.png' class='hangman-img' alt=''>";
					break;
				case 8:
					echo "<img src='images/Fase8.png' class='hangman-img' alt=''>";
					break;
				case 9:
					echo "<img src='images/Fase9.png' class='hangman-img' alt=''>";
					break;
				case 10:
					echo "<img src='images/FullHangman.png' class='hangman-img' alt=''>";
					break;
				
				default:
					echo "<img src='images/Fase0.png' class='hangman-img' alt=''>";
					break;
			} ?>
	
			<form action="IndexHangman.php" method='POST'>
				<div id="letters">
					<?php foreach ($_SESSION['alphabet'] as $key => $value) {
						echo "<input type='submit' class='letter-btn' name='letter-btn' value=" . $key=$value . ">";
					} ?>
				</div>
				
				<h2><?php foreach ($_SESSION['currentSolution'] as $key => $letter) {echo $key=$letter;}; ?></h2>

				<h3>Current Attempts: <?php echo $_SESSION['currentAttemps']; ?></h3>
				
				<input type="submit" class="start-btn" name='hint-btn' value='Ask hint?'>
				<input type="submit" class="start-btn" name='unset-btn' value='Quit game'>

				<?php if (isset($_POST['hint-btn'])) {
					echo $_SESSION['hint'];
				} ?>
			</form>

		<?php else: ?>

			<h1>Hangman</h1>
			<img src="images/LOGO.png" alt="">
			<?php if (isset($_SESSION['message'])) {
				echo "<h3>". $_SESSION['message'] . "</h3>";
			} ?>
			<form action='IndexHangman.php' method='POST'>
				<input type='submit' class="start-btn" name='start-btn' value='Start Game'>
			</form>

		<?php endif; ?> 			
	</div>
	
		
		
		
	
</body>
</html>


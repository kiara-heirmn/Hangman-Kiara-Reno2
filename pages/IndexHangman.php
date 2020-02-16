<?php 
	session_start(); 
	include ("../functionality/hangman.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hangman</title>
	<link rel="stylesheet" type="text/css" href="css/game.css">
</head>
<body>
	<?php if (isset($_SESSION['start'])): ?> 
		<h1>Game started</h1>
		<form action="IndexHangman.php" method='POST'>
			<h2>The word is: <?php foreach ($_SESSION['currentSolution'] as $key => $letter) {echo $key=$letter;}; ?></h2>
			<?php foreach ($_SESSION['alphabet'] as $key => $value) {
				echo "<input type='submit' name='letter-btn' value=" . $key=$value . ">";
			} ?>

			<h2>Current Attempts: <?php echo $_SESSION['currentAttemps']; ?></h2>

			<input type="submit" name='unset-btn' value='Quit game'>
		</form>
	<?php else: ?>
		<h1>Game ended</h1>
		<form action='IndexHangman.php' method='POST'>
			<input type='submit' name='start-btn' value='Start Game'>
		</form>

	<?php endif; ?> 
		
		
		
	
</body>
</html>


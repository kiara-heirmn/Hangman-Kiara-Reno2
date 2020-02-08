<?php 
//DEBUGGING
$debug = false;

//INIT GAME
if (isset($_POST['start-btn'])) {
	$_SESSION['start'] = true;
	$_SESSION['word'] = getRandomWord(); //GETS ARRAY OF RANDOM WORD
	$_SESSION['currentSolution'] = getStripedWord(); //ARRAY OF STRIPED WORD
	$_SESSION['alphabet'] = range('A', 'Z'); //ARRAY WITH ALPHABET
	$_SESSION['currentAttemps'] = 0;
}

//HANDLE GAME
if (isset($_POST['letter-btn'])) {
	$letter = $_POST['letter-btn'];
	check($letter);
}

//QUIT GAME
if (isset($_POST['unset-btn'])) {
	unset($_SESSION['start']);
}

function check($letter) {
	//DELETE LETTER FROM ALPHABET
	$_SESSION['alphabet'] = array_diff($_SESSION['alphabet'], [$letter]);
	//CHECK FOR LETTER AND UPDATE
	if (in_array($letter, $_SESSION['word'])) {
		for ($i=0; $i < count($_SESSION['word']); $i++) {
			if ($letter === $_SESSION['word'][$i]) {
				$_SESSION['currentSolution'][$i] = $letter;
			}
		}
	}
	else {
		$_SESSION['currentAttemps']++;
	}
	//CHECK WHEN GAME IS OVER
	if ($_SESSION['currentAttemps'] === 7)   {
		$message = "Game Over";
		unset($_SESSION['start']);
	}

	if ($_SESSION['word'] == $_SESSION['currentSolution']) {
		$message =  "Congratulations you won!";
		unset($_SESSION['start']);
	}
}

function getRandomWord() {
	$debug = true;
	//OPEN FILE WITH WORDS
	$url = '../functionality/words.txt';
	$wordfile = file_get_contents($url);
	$words = explode(",", $wordfile);

	//SELECT RANDOM WORD
	$randomIndex = rand(0, count($words)-1);
	$selectedWord = $words[$randomIndex];
	if ($debug) {
		echo "Selected word is: " . $selectedWord;
	}

	$answerArray = str_split($selectedWord);
	return $answerArray;
}

function getStripedWord() {
	$debug = false;
	//RENDER HIDDEN WORD ON PAGE
	$hiddenWord = "";
	for ($i=0; $i<count($_SESSION['word']); $i++) {
		$hiddenWord .= "*";
	}

	$hiddenWordArray = str_split($hiddenWord);
	if ($debug) {
		echo print_r($hiddenWordArray);
	}
	return $hiddenWordArray;
}



 ?>
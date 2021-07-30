<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/pure-min.css"></head>

<body style="margin: 0 auto;width:90%;padding:10px;">

	<h2>Sentiment Analysis Review Buku</h2>
    <form class="pure-form" style="width:100%" action="" method="post">
    <p>
    	<img src = "css/book.png" width="200" height="150" style="display:block; margin:auto;" >
    </p>
        <fieldset class="pure-group">
            <textarea name="kalimat" class="pure-input-1-2" placeholder="kalimat (contoh: Indonesia mendapat juara 1 olimpiade bulu tangkis)"></textarea>
        </fieldset>
    
        <button type="submit" name="submit" class="pure-button pure-input-1-2 pure-button-primary">Uji Sentimen Review Buku</button>
    </form>
    <style type="text/css">
    	body 
	{
  	background-color: lightblue;
	}

    </style>
</body>
</html>

<?php
if(isset($_POST['submit'])){
	if (PHP_SAPI != 'cli') {
		echo "<pre>";
	}

	$strings = array(
		1 => $_POST['kalimat'],
	);

	require_once __DIR__ . '/autoload.php';
	$sentiment = new \PHPInsight\Sentiment();

	$i=1;
	foreach ($strings as $string) {

		// calculations:
		$scores = $sentiment->score($string);
		$class = $sentiment->categorise($string);

		// output:
		if (in_array("pos", $scores)) {
		    echo "Got positif";
		}

		echo "\n\nHasil:";
		echo "\nKalimat: <b>$string</b>\n";
		echo "Arah sentimen: <b>$class</b>, nilai: ";
		// var_dump($scores);
		foreach ($scores as $skor) {
			echo $skor;
		}
		echo "\n\n";
		$i++;
	}
}
?>
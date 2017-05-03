<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<h2 style="text-align: center">Your comments:</h2>
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?> 
<?php

$one = [
	'author' => 'Saulius',
	'comment' => 'Hello everyone'
];

$two = [
	'author' => 'Julius',
	'comment' => 'jdzsfc jdejhes fdgdxf fg 222 sjdf'
];
$three = [
	'author' => 'Dalia',
	'comment' => 'gh gjdzsf jdzsfc jdejhes sjdf!!!'
];
$four = [
	'author' => 'Saule',
	'comment' => 'Ha ha ha'
];

$array = [
	$one, $two, $three, $four
];
	
if ($_POST['author']!==""||$_POST['comment']!=="") {
	if (isset($_POST['submit'])) :
		$write = fopen('knyga.csv', 'a');
		fputcsv($write, [$_POST['author'],$_POST['comment']]);
		fclose($write);
	endif;
}
else{
	if (isset($_POST['submit'])){
	require ('404.php');
	}
}
	$filereading = fopen('knyga.csv', 'r');
		while (! feof($filereading)) {
			$array = fgetcsv($filereading);	
		echo "<p>".$array[0].": ".$array[1]."</p>";  	
		}		
	fclose($filereading);


?>
<body style="text-align: center;">
<form  action="index.php" method="post">
<label>Name </label>
<input type="text" name="author" style="margin: 20px; padding: 4px; width: 20%"><br>
<label>Comment </label>
<textarea type="text" name="comment" cols=45 rows=10 style="margin: 10px"></textarea><br>
<input type="submit" name="submit" value="SUBMIT" style="margin: 10px; padding: 4px; background-color: GhostWhite ;">
</form>
</body>
</html>



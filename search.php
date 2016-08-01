<?php

if(isset($_GET['text'])){


$text = $_GET['text'];

$db = new PDO('mysql:host=localhost; dbname=Santevet;charset=utf8', 'root', 'root');
$select = "SELECT * FROM `annonces` WHERE `title` LIKE '%$text' OR `title` LIKE '$text%'";
$request = $db->prepare($select);
$request->execute();
while($data = $request->fetch()){

	echo 'Annonces : '.$data['title']."</br>";
	echo 'Prix : '.$data['price']."€ </br>";
	echo 'Lieu : '.$data['place']."</br>";

}

} else {

	echo 'error';

}


?>
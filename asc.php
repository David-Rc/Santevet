<?php

				$db = new PDO('mysql:host=localhost; dbname=Santevet;charset=utf8', 'root', 'root');
				$select = 'SELECT * FROM annonces
		   				   ORDER BY price ASC';
				$request = $db->prepare($select);
				$request->execute();
				while($data = $request->fetch()){

					echo 'Annonce : '.$data['title'].'</br> Prix : '.$data['price'].'€ </br> Lieu : '.$data['place']."</br>";
	
				}
			?>
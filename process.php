<?php

$page1 = 'https://www.leboncoin.fr/animaux/offres/rhone_alpes/?th=1';
$page2 = 'https://www.leboncoin.fr/animaux/offres/rhone_alpes/?o=2';
$page3 = 'https://www.leboncoin.fr/animaux/offres/rhone_alpes/?o=3';
$return;

function getContent($result){

	
}

function getHTML($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec ($ch);
	curl_close($ch);
	return $result;
}


	$data = new DOMDocument();
	$data->loadHTML(getHTML($page1));
	foreach ($data->getElementsByTagName('section') as $section){
    	if($section->getAttribute('class')=="item_infos"){
        	$return[] = array(
            	"title"=>trim($section->getElementsByTagName("h2")->item(0)->nodeValue),
//            "description1"=>$section->getElementsByTagName("p")->item(0)->nodeValue,
            	"place"=>preg_replace('/\s+/', '',$section->getElementsByTagName("p")->item(1)->nodeValue),
            	"price"=>$section->getElementsByTagName("h3")->item(0)->nodeValue
        	);
    	}
	}

	$data = new DOMDocument();
	$data->loadHTML(getHTML($page2));
	foreach ($data->getElementsByTagName('section') as $section){
    	if($section->getAttribute('class')=="item_infos"){
        	$return[] = array(
            	"title"=>trim($section->getElementsByTagName("h2")->item(0)->nodeValue),
//            "description1"=>$section->getElementsByTagName("p")->item(0)->nodeValue,
            	"place"=>preg_replace('/\s+/', '',$section->getElementsByTagName("p")->item(1)->nodeValue),
            	"price"=>$section->getElementsByTagName("h3")->item(0)->nodeValue
        	);
    	}
	}
	
	$data = new DOMDocument();
	$data->loadHTML(getHTML($page3));
	foreach ($data->getElementsByTagName('section') as $section){
    	if($section->getAttribute('class')=="item_infos"){
        	$return[] = array(
            	"title"=>trim($section->getElementsByTagName("h2")->item(0)->nodeValue),
//            "description1"=>$section->getElementsByTagName("p")->item(0)->nodeValue,
            	"place"=>preg_replace('/\s+/', '',$section->getElementsByTagName("p")->item(1)->nodeValue),
            	"price"=>$section->getElementsByTagName("h3")->item(0)->nodeValue,
        	);
    	}
	}




 foreach($return as $element){
 	if($element['price'] == ""){
 		$element['price'] = 0;
 }
 	$db = new PDO('mysql:host=localhost; dbname=Santevet;charset=utf8', 'root', 'root');
 	$insert = "INSERT INTO annonces VALUES ('', :title, :price, :place)";
 	$request = $db->prepare($insert);
 	$request->bindParam(':title', $element['title'], PDO::PARAM_STR);
 	$request->bindParam(':price', $element['price'], PDO::PARAM_STR);
 	$request->bindParam(':place', $element['place'], PDO::PARAM_STR);
 	$request->execute();

 	}



// echo "<pre>";
// print_r($return);
?>
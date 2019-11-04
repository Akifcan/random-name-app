<?php 
	// $db = new PDO("mysql:host=localhost;dbname=", 'root', '');
	$url = 'https://huseyindemirtas.net/kullanici-adi-listesi-ad-soyad-listesi/';

	$veriler = file_get_contents($url);
	$pattern = '@<td (.*?)>(.*?)</td>@si';
	preg_match_all($pattern, $veriler, $isimler);

	for($i=0; count($isimler); $i++){
		echo $isimler[0][$i];
	}
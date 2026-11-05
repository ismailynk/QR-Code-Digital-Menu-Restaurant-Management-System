	<?php 

$db=null;
      
function conopen(){
	try {
		  $host='localhost';
		$dbname='cafe';
		$user='root';
		$pass='';
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
		
		return $db;
		} catch (Exception $e) {
		echo "Başarısız Bağlantı $e";
	}

	/*try {
		$host='sql205.epizy.com';
		$dbname='epiz_31238850_vipyikama';
		$user='epiz_31238850';
		$pass='mF7Gs5rikx7tR9';
		$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
		
		return $db;
		} catch (Exception $e) {
		echo "Başarısız Bağlantı $e";
	}*/
		

}
	 function conclose(){$db=null;}

 


 ?>
<?php 
	$username = "root";
	$password = "";
	$hostname = "localhost"; 

	//connection to the database
	$dbhandle = mysql_connect($hostname, $username, $password) 
 	or die("Unable to connect to MySQL");
	//echo "Connected to MySQL<br>";

	//select a database to work with
	$selected = mysql_select_db("db_telegram",$dbhandle) 
  	or die("Could not select examples");

	//execute the SQL query and return records
	$result = mysql_query("SELECT `json` FROM `json_data` WHERE 1");

	//fetch tha data from the database 
	while ($row = mysql_fetch_array($result)) {
		//echo "'[";
   		//echo $row{'json'};
   		//echo "]'";
   		$json_data = $row{'json'};
   		//echo "'[".$json_data."]'";
   		$json_data = "[".$row{'json'}."]";
   		//echo $jsondatapetik;
   		//var_dump(json_decode($jsondatapetik,true));

   		$decoded = json_decode($json_data,true);
   		$waktudantanggal = $decoded[0]['result']['date'] + 18000;
   		$date = date_create();

		date_timestamp_set($date, $waktudantanggal);
		//echo date_format($date, 'U = Y-m-d H:i:s'). "\n";

		echo "ID Pesan : ".$decoded[0]['result']['message_id']."||"; 
		echo "First Name : ".$decoded[0]['result']['from']['first_name']."||";
		echo "User Name : ".$decoded[0]['result']['from']['username']."||";
		echo "Chat ID : ".$decoded[0]['result']['chat']['id']."||";
		echo "Waktu : ".date_format($date, 'H:i:s')."||";
		echo "Tanggal : ".date_format($date, 'd-m-Y')."||";
		echo "ISI Pesan : ".$decoded[0]['result']['text'];
	}
	//close the connection
	mysql_close($dbhandle);
?>
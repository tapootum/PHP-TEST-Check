<html>
<title>Check List</title>
<body>
		<table border="1">
	<?php
	$n = count($_POST["program32bit"]);
	$m = $n;
	for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
		if ($_POST["program32bit"]["$i"] == "7-Zip 9.20"){
			$_POST["program32bit"]["$n"] = "7-Zip 9.20 (x64 edition)";
			$m = $m - 1;
		}
	}

	$n = count($_POST["program32bit"]);
	for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
		if ($_POST["program32bit"]["$i"]=="InfraRecorder"){
			$_POST["program32bit"]["$n"] = "InfraRecorder 0.52 (x64 edition)";
			$m = $m - 1;
		}
	}
	for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
		if($_POST["program32bit"]["$i"] != ""){
			echo "Program32bit $i = " . $_POST["program32bit"]["$i"]."<br />";
		}
	}



	$objOpen = opendir("xml");
	while (($file = readdir($objOpen)) !== false)
		{	if (strlen($file) < 5 ){
		}
		else {
			echo "<tr><td>".$file."</td>";
			echo checkTest ($file) . "</td></tr>";
		}
	}		
	function checkTest ($filename){
		$m = global $m;
		$name = "xml/" . $filename;
		$xml = simplexml_load_file($name);
		$n = 0;
		$num = count(global $_POST["program32bit"]);
	#echo $xml->getName() . "<br />";

		foreach($xml->children() as $child){
			for ($i=0; $i < $num ; $i++) { 
				if ($child == (global $_POST["program32bit"]["$i"]){
					$n++;
  				#echo $ProgramList[$i]. "<br />";
				}
			}	
  #echo $child . "<br />";
		}

		echo $filename . "<br />";
		if ($n >= $m ){
			echo "<td>".'<img border="0" src="pass.jpg"/>';
			#echo "Pass";
		}
		else {
			echo "<td>".'<img border="0" src="fail.jpg"/>';
			#echo "Fail";
		}
	}


	?>
</table>
</body>
</html>
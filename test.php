<html>
<head>
	<title>opendir()</title>
</head>
<body>
	<table border="1">
		<?php
		$n = count($_POST["program32bit"]);
		$m = $n;
		$a = 0;
		for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
			if (trim($_POST["program32bit"]["$i"]) == "7-Zip 9.20"){
				$_POST["program32bit"]["$n"] = "7-Zip 9.20 (x64 edition)";
				#$m = $m - 1;
				#$a++;
			}
		}

		$n = count($_POST["program32bit"]);
		for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
			if (trim($_POST["program32bit"]["$i"])=="InfraRecorder"){
				$_POST["program32bit"]["$n"] = "InfraRecorder 0.52 (x64 edition)";
				#$m = $m - 1;
				#$a++;
			}
		}
		$n = count($_POST["program32bit"]);
		for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
			if (trim($_POST["program32bit"]["$i"])=="Microsoft Visual C++ 2008 Redistributable - x86 9.0.30729.17"){
				$_POST["program32bit"]["$n"] = "Microsoft Visual C++ 2008 Redistributable - x64 9.0.30729.17";
				#$m = $m - 1;
				#$a++;
			}
		}
		#if ($a > 0){
		#	$m = $m - 1;
		#}
		/*for ($i=0; $i < count($_POST["program32bit"]) ; $i++) { 
			if($_POST["program32bit"]["$i"] != ""){
				#echo "Program32bit $i = " . $_POST["program32bit"]["$i"]."<br />";
			}
		}*/
		$n = count($_POST["program32bit"]);
		#echo $m;
		$GLOBALS['m'] = $m;
		$GLOBALS['n'] = $n;
		#echo $GLOBALS['m'];
		$GLOBALS['$_POST'] = $_POST["program32bit"];

		#echo "<form action="xml.php" method="get">";
		$objOpen = opendir("xml");
		while (($file = readdir($objOpen)) !== false)
			{	if (strlen($file) < 5 ){
			}
			else {

				echo "<tr><td>".'<a href="xml.php?name='.$file.'">'.$file.'</a>'."</td>";
				echo checkTest ($file) . "</td></tr>";
			}
		}
		#echo "</form>";		
		function checkTest ($filename){
			$name = "xml/" . $filename;
			/*$ProgramList = array("InfraRecorder",
				"Inkscape 0.48.2",
				"Mozilla Thunderbird (8.0)",
				"GIMP 2.6.11",
				"PDFCreator",
				"7-Zip 9.20",
				"Java(TM) 6 Update 29",
				"Microsoft Visual C++ 2008 Redistributable - x86 9.0.30729.17",
				"LibreOffice 3.3",
				"OpenApp",
				"7-Zip 9.20 (x64 edition)",
				"InfraRecorder 0.52 (x64 edition)",
				"Microsoft Visual C++ 2008 Redistributable - x64 9.0.30729.17");
			*/
			$xml = simplexml_load_file($name);
			#echo $filename . "<br />";
			$n=0;
	#echo $xml->getName() . "<br />";
			$list = $GLOBALS['$_POST'];
			$m = $GLOBALS['m'];
			$num = $GLOBALS['n'];
			#echo $m."     ".$num."<br />";
			$n=0;
			for ($i=0; $i < $num; $i++) { 
				$Lists[$i] = trim($list[$i]);
			}
			foreach($xml->children() as $child){
				for ($i=0; $i < $num ; $i++) { 
					if ((strcmp ($child,$Lists[$i])) == 0 ){
						$n++;
				#echo $Lists["$i"] . "<br />";
  				#echo $ProgramList[$i]. "<br />";
					}
					else {
				#echo $child;
				#echo $list["$i"].strcmp ($child,$List[$i])."<br />";
					}
				}	
  #echo $child . "<br />";
			}

			#echo $m;
			if ($n >= $m )
			{
				echo "<td>".'<img border="0" src="pass.jpg"/>';
			echo $n;
			}
			else 
			{
				echo "<td>".'<img border="0" src="fail.jpg"/>';
			echo $n;
			}
		}
		?>
	</table>

	<a href="index.html"><h1>Back</h1></a>
</body>
</html>
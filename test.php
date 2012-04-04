<html>
<head>
	<title>opendir()</title>
</head>
<body>
	<?php
	$objOpen = opendir("xml");
	while (($file = readdir($objOpen)) !== false)
	{	if (strlen($file) < 5 ){
		}
		else {
		checkTest ($file);
		}
	}		
	function checkTest ($filename){
		$name = "xml/" . $filename;
		$ProgramList = array("InfraRecorder",
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

		$xml = simplexml_load_file($name);

		$n=0;
	#echo $xml->getName() . "<br />";

		foreach($xml->children() as $child){
			for ($i=0; $i <= 12; $i++) { 
				if ($child == $ProgramList[$i]){
					$n++;
  				#echo $ProgramList[$i]. "<br />";
				}
			}	
  #echo $child . "<br />";
		}

		echo $filename . "<br />";
		if ($n >= 9 )
		{
			echo '<img border="0" src="pass.jpg"/>'. "<br />";
			#echo "Pass";
		}
		else 
		{
			echo '<img border="0" src="fail.jpg"/>'. "<br />";
			#echo "Fail";
		}
	}
	?>
</body>
</html>
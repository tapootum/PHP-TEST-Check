<html>
<head>
	<title>Test Result</title>
  <style>
    .pass {
      background: #00ef00;
      width: 180px;
      height: 50px;
      display: table;
    }
    .pass p {
      color: white;
      font-size: 50px;
      display: table-cell;
      vertical-align: middle;
      text-align: center;
    }
    .fail {
      background: #ff0000;
      width: 180px;
      height: 50px;
      display: table;
    }
    .fail p {
      color: white;
      font-size: 50px;
      display: table-cell;
      vertical-align: middle;
      text-align: center;
    }
  </style>
</head>
<body>
	<?php
	$objOpen = opendir("xml");
	while (($file = readdir($objOpen)) !== false) {
		if (strlen($file) < 5 ){
		}
		else {
		$name = explode(".",$file);
		#echo $name[0] . "<br />";
		$fname = substr($name[0],0,1);
		#echo $fname . "<br />";
		checkTest ($file,$fname);
		}
	}

  function pass() { echo '<div class="pass"><p>PASS</p></div>'; }
  function fail() { echo '<div class="fail"><p>FAIL</p></div>'; }
	function checkTest ($filename,$fname){
		$name = "xml/" . $filename;
		$ProgramList = array("InfraRecorder",
			"Inkscape 0.48.2",
			"Mozilla Thunderbird 11.0.1 (x86 en-US)",
			"GIMP 2.6.11",
			"PDFCreator V.1.3.2",
			"7-Zip 9.20",
			"Java(TM) 6 Update 29",
			"Microsoft Visual C++ 2008 Redistributable - x86 9.0.30729.17",
			"LibreOffice 3.3",
			"OpenApp V.0.2.6.0",
			"7-Zip 9.20 (x64 edition)",
			"InfraRecorder 0.52 (x64 edition)",
			"Microsoft Visual C++ 2008 Redistributable - x64 9.0.30729.17");

		$xml = simplexml_load_file($name);

		$n=0;
	#echo $xml->getName() . "<br />";
		$osArch = 32;

		foreach($xml->children() as $child){
			for ($i=0; $i <= 12; $i++) {
				if ($fname == "A") {
					$osArch = 64;
				}
				if ($child == $ProgramList[$i]){
					$n++;
					#echo $ProgramList[$i]. "<br />";
				}
			}
		}

		echo '<a href="xml.php?fname=xml/' . $filename . '">' .$filename."</a>"."<br />";
		#echo "           " . $n . "     " . $osArch;
		if ($osArch == 32){
			if ($n >= 9 ){
        pass();
        		//echo '<img border="0" src="pass.jpg"/>'. "<br />";
				#echo "Pass";
			}
			else {
        fail();
				#echo "Fail";
			}
		}
		else {
		if ($n >= 11) {
        pass();		#echo "Pass";
			}
			else {
        fail();		#echo "Fail";
			}
		}
	}
	?>
</body>
</html>
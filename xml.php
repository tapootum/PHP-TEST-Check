<html>
	<body>
<?php
 $file = "xml/" . $_GET["name"];

$xml = simplexml_load_file("$file");

echo $xml->getName() . "<br />";

foreach($xml->children() as $child)
  {
  echo $child->getName() . ": " . $child . "<br />";
  }
?>
</body>
</html>
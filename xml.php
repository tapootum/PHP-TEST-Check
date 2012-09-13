<?php
$fileName = $_GET['fname'];
$xml = simplexml_load_file($fileName);

echo $xml->getName() . "<br />";

foreach($xml->children() as $child)
  {
  echo $child->getName() . ": " . $child . "<br />";
  }
?>
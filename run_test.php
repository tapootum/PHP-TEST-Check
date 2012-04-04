<?php
$output = shell_exec('cd / && ls -lart');
echo "<pre>$output</pre>";
?>

<?php
$con = mysql_connect("localhost","root","root");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("sma_db", $con);

$result = mysql_query("SELECT * FROM subject_results WHERE student_id=4");

while($row = mysql_fetch_array($result)) {
  echo $row['test_id'] . "\t" . $row['marks']. "\n";
}

mysql_close($con);
?> 
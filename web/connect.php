<?php

$dbconn = pg_connect("dbname=ec2-54-235-244-185.compute-1.amazonaws.com") or die("Could not connect");
  $stat = pg_connection_status($dbconn);
  if ($stat === PGSQL_CONNECTION_OK) {
      echo 'Connection status ok';
  } else {
      echo 'Connection status bad';
  }    

?>




























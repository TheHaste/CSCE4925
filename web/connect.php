<?php

$dbconn = pg_connect("dbname=heroku pg:psql postgresql-adjacent-97074 --app giganto-inventory-dev
") or die("Could not connect");
  $stat = pg_connection_status($dbconn);
  if ($stat === PGSQL_CONNECTION_OK) {
      echo 'Connection status ok';
  } else {
      echo 'Connection status bad';
  }    

?>




























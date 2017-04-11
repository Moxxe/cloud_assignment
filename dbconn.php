<?php
$url = parse_url(getenv("DATABASE_URL"));

$host = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$database = substr($url["path"], 1);

//Then change your pgsql entry in that same file to be the following:

'pgsql' => array(
    'driver'   => 'pgsql',
    'host'     => $host,
    'database' => $database,
    'username' => $username,
    'password' => $password,
    'charset'  => 'utf8',
    'prefix'   => '',
    'schema'   => 'public',
),







   
   $port        = "port=5432";
  
   $credentials = "user= $username password=$password";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   } else {
      echo "Opened database successfully\n";
   }

   $sql =<<<EOF
      INSERT INTO menu (item_id,item_name,item_description,item_price)
      VALUES (4, 'manchurian', 'okay',50);

EOF;

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } else {
      echo "Records created successfully\n";
   }
   pg_close($db);
?>
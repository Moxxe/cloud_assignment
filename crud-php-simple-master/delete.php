<?php
//including the database connection file
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());


//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = pg_query($pg_conn, "DELETE FROM menu WHERE item_id=2");
//$result = pg_query($pg_conn, "SELECT * FROM menu ");
//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>


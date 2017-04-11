<?php

# Here we establish the connection. Yes, that's all.
//$pg_conn = pg_connect(pg_connection_string_from_database_url());
//$result = pg_query($pg_conn, "SELECT * FROM menu ");
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
//selecting data associated with this particular id

if(isset($_POST['update']))
{	

	//$id = $_POST['id']);
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];	
	//echo(name);
	print ("$name");
	
	
		//$result = pg_query($pg_conn, "UPDATE menu SET item_name='$name',item_description='$desc',item_price='$price' 
		 //WHERE item_id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
header("Location: index.php");
}
?>

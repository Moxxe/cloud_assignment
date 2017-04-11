<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());

if(isset($_POST['Submit'])) {
	echo $_POST['id'];
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$desc = mysqli_real_escape_string($mysqli, $_POST['desc']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
		
	
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = pg_query($pg_conn, "INSERT INTO menu (item_id,item_name,item_description,item_price) VALUES('5','burger','dghjfk','56')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo $name;
		echo "<br/><a href='index.php'>View Result</a>";
	
}
?>
</body>
</html>

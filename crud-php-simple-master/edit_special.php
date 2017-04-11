<?php
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());

# Now let's use the connection for something silly just to prove it works:
$result = pg_query($pg_conn, "SELECT * FROM special where id=1 ");

?>


<html>
<head>	
	<title>Special Menu</title>
</head>

<body>

<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>ID</td>
		<td>item 1</td>
		<td>item 2</td>
		<td>item 3</td>
		<td>Menu Price</td>
	</tr>
	<?php 
	
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($row = pg_fetch_row($result)) { 		
		echo "<tr>";
		echo "<td>".$row[0]."</td>";
		echo "<td>".$row[1]."</td>";
		echo "<td>".$row[2]."</td>";
		echo "<td>".$row[3]."</td>";
		echo "<td>".$row[4]."</td>";	
		echo "<td><a href=\"edit.php?id=$row[0]\">Edit</a></td>";		
	}

	?>
	</table>
</body>








</html>
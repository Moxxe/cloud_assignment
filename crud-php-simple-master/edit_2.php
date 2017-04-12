<?php
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

if(isset($_POST['update']))
{	

	$id = $_POST['id'];
	$price = $_POST['price'];	
	
	

	
$pg_conn = pg_connect(pg_connection_string_from_database_url());

		$result = pg_query($pg_conn,"UPDATE special SET item_price='$price' 
		 WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
	

//header("Location: index.php");


?>


<?php
//getting id from url
$id = $_GET['id'];


# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
//selecting data associated with this particular id
$result = $result = pg_query($pg_conn, "SELECT * FROM special WHERE id=$id");

while($row = pg_fetch_row($result))
{
	$id = $row[0];
	$item1 = $row[1];
	$item2 = $row[2];
	$item3 = $row[3];
	$price = $row[4];


}
pg_free_result($result);
        pg_close($dbconn);
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text"disabled="disabled" name="id" value="<?php echo $id;?>"></td>
			</tr>
			<tr> 
				<td>item1</td>
				<td><input type="text"disabled="disabled" name="item1" value="<?php echo $item1;?>"></td>
			</tr>
			<tr> 
				<td>item2</td>
				<td><input type="text" disabled="disabled"name="item2" value="<?php echo $item2;?>"></td>
			</tr>
			<tr> 
				<td>item3</td>
				<td><input type="text"disabled="disabled" name="item3" value="<?php echo $item3;?>"></td>
			</tr>
			<tr> 
				<td>price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>



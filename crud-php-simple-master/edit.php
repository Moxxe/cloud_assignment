<?php
// including the database connection file
//including the database connection file
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
//$result = pg_query($pg_conn, "SELECT * FROM menu ");

if(isset($_POST['update']))
{	

	$id = $_POST['id']);
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];	
	
	/*
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {*/	
		//updating the table
		$result = pg_query($pg_conn, "UPDATE menu SET item_id='$id',item_name='$name',item_description='$desc',item_price='$price' 
		 WHERE item_id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"])); 
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}

# Here we establish the connection. Yes, that's all.
$pg_conn = pg_connect(pg_connection_string_from_database_url());
//selecting data associated with this particular id
$result = $result = pg_query($pg_conn, "SELECT * FROM menu WHERE item_id=$id");

while($res = pg_fetch_row($result))
{
	$id = $res[0];
	$name = $res[1];
	$desc = $res[2];
	$price = $res[3];
}
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
				<td><input type="text" name="id" value="<?php echo $id;?>"></td>
			</tr>
			<tr> 
				<td>name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>description</td>
				<td><input type="text" name="desc" value="<?php echo $desc;?>"></td>
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

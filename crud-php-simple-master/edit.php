
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

<?php


if(isset($_POST['update']))
{	

	//$id = $_POST['id']);
	$name = $_POST['name'];
	$desc = $_POST['desc'];
	$price = $_POST['price'];	
	//echo(name);
	echo ("no problem here");

	
		//$result = pg_query($pg_conn, "UPDATE menu SET item_name='$name',item_description='$desc',item_price='$price' 
		 //WHERE item_id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		//header("Location: index.php");
	}
	else
{
	echo "problem is here";
	header("Location: index.php");
}
}
?>

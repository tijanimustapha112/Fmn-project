<?php

/**$connect = mysqli_connect("localhost","root","","Sample_db");
	if (isset($_POST["insert"])) {
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		//$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
		$query = "INSERT INTO Sample_table(Image) VALUES('$file')";
		if (mysqli_query($connect, $query)) {
			echo "<script>alert('Image Inserted successfully')</script>";	
		}
		else{
			echo "<script>alert('image not inserted')</script>";
		}
	}
**/
if (isset($_POST['insert'])){


$name = $_FILES['image']['name'];
$size = $_FILE['image']['size'];
$type = $_FILE['image']['type']
echo "$name $size $type";

$tmp_name = $_FILE['image']['tmp_name'];
echo "$tmp_name";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>image work</title>
</head>
<body>
		<form action="image.php" method="POST" enctype="multipart/form-data">
			<input type="file" name="image">
			<br>
			<br>
			<input type="submit" name="insert" value="Insert">
		</form>
		<br><br>
		<table border="0">
			<tr>
				<td>Image</td>
			</tr>
			<tr>
				<td>
					<?php
		/**
						$query = "SELECT * FROM Sample_table ORDER BY id DESC";
						$result = mysqli_query($connect, $query);
						while (mysqli_fetch_array($result)) {
							echo '
									<tr>
										<td>
										<img src="data:image/jpeg;base64,'.base64_decode($row['name']).'"/>
										</td>
									</tr>
							';
						}
**/
					?>

				</td>
			</tr>
		</table>
</body>
</html>
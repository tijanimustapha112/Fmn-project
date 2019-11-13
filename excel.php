<?php

	$connect = mysqli_connect('localhost', 'root', '', 'canteen attendance');
	$output = '';

	if (isset($_POST['export_excel'])) {
		$sql = "SELECT * FROM 1staffnames ORDER BY id DESC";
		$result = mysqli_query($connect, $sql);
		if (mysqli_num_rows($result) > 0) {
			$output .= "<table border='1'>
						<tr>
							<th>S/N</th>
							<th>Firstname<th>
							<th></th>
							<th>Lastname</th>
						</tr>";
						while ($row = mysqli_fetch_array($result)) {
							$output .= "<tr>
											<td>".$row['S/n']."</td>
											<td>".$row['Surname']."</td>
											<td>".$row['lastname']."</td>

							</tr>";
						}
						$output .= "</table>";
						header("Content-Type: application/xls");
						header("Content-Disposition: attachment, filename: dowload.xls");
						echo $output;
		}
		
	}

?>
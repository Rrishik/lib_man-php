<?php
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "books";
		$return_arr=array();
		$fetch = mysql_query("SELECT * FROM `book details`");
		while ($row = mysql_fetch_array($fetch,MYSQL_ASSOC)){
			$row_array['Book Name'] = $row['name'];
			$row_array['Author Name'] = $row['author'];
			$row_array['Price'] = $row['price'];
			$row_array['ISBN'] = $row['isbn'];
			array_push($return_arr,$row_array);
		}
		echo json_encode($return_arr);
?>

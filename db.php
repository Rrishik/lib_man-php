<?php

    function addDB(){
      $servername = "localhost";
  		$username = "root";
  		$password = "root";

      $conn = new mysqli($servername,$username,$password);
      if ($conn->connect_error){
        die("Connection failed! :" . $conn->connect_error);
      }

      $sql = "CREATE DATABASE IF NOT EXISTS books";
      $conn->query($sql);
      $conn->close();

    }

    function addTABLE(){
      $servername = "localhost";
  		$username = "root";
  		$password = "root";
  		$dbname = "books";

      $conn = new mysqli($servername,$username,$password,$dbname);
      if ($conn->connect_error){
        die("Connection failed! :" . $conn->connect_error);
      }

      $sql = "CREATE TABLE IF NOT EXISTS `book details` (
        `Book Name` VARCHAR(30) NOT NULL PRIMARY KEY,
        `Author Name` VARCHAR(50) NOT NULL,
        Price int(5) NOT NULL,
        ISBN VARCHAR(15) NOT NULL
      )";
      $conn->query($sql);
    	$conn->close();
    }

    addDB();
    addTABLE();

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "books";

    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error){
      die("Connection failed! :" . $conn->connect_error);
    }

		$return_arr=array();
		$sql = "SELECT * FROM `book details`";
    $q = $conn->query($sql);
    if ($q->num_rows >0) {
      while($row = $q->fetch_assoc()){
        $row_array['name'] = $row['Book Name'];
  			$row_array['author'] = $row['Author Name'];
  			$row_array['price'] = $row['Price'];
  			$row_array['isbn'] = $row['ISBN'];
  			array_push($return_arr,$row_array);
      }
    }

		echo json_encode($return_arr);
    $conn->close();
?>

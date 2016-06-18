<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "books";

	$conn = new mysqli($servername,$username,$password,$dbname);
	if ($conn->connect_error){
		die("Connection failed! :" . $conn->connect_error);
	}

	$name=$_POST["Name"];
	$author=$_POST["Author"];
	$price=$_POST["Price"];
	$isbn=$_POST["Isbn"];

	$sql = "INSERT INTO `book details` (`Book Name`, `Author Name`, `Price`, `ISBN`)
	VALUES ('$name','$author','$price','$isbn')";

	if ($conn->query($sql) === TRUE){
		echo "New Book added successfully!!";
	}
	else{
		echo "Error!!" . $sql . "<br>" . $conn->error;
	}
	$conn->close();
?>

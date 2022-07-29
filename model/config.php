<?php

	$conn = new mysqli("localhost","printsmy","Print12#","printsmy");

	if ($conn->connect_error) {
		die("could not connect to the database!".$conn->connect_error);
	}

?>
<?php
	$sql = $conn->prepare("DROP TABLE  IF EXISTS Consecinte;");
	$sql->execute();	

	try 
	{
		$sql = $conn->prepare("DROP TABLE  IF EXISTS Nave;");
		$sql->execute();
	}
	catch(PDOException $e)		
	{
		echo "Connection failed: " . $e->getMessage();
	}

	$sql = $conn->prepare("DROP TABLE  IF EXISTS Clase;");
	$sql->execute();

	$sql = $conn->prepare("DROP TABLE  IF EXISTS Batalii;");
	$sql->execute();
?>
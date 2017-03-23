<?php 
	if ($_POST['submit'] ) 
	{	
		try 
		{
			// prepare sql and bind parameters
			$stmt = $conn->prepare("INSERT INTO Batalii (nume, data)
			VALUES (:nume, :data)");
			$stmt->bindParam(':nume', $name);
			$stmt->bindParam(':data', $data);

			$name = $_POST['nume'];
			$data = $_POST['data'];
			$stmt->execute();

			$_SESSION["success_message"] = "New record created successfully";
			echo "New record created successfully";
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
			$_SESSION["error_message"] = "Error: " . $e->getMessage();
		}
		$conn = null;
	 	
	}
?>
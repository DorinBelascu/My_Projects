<?php 
	if ($_POST['submit'] ) 
	{	
		try 
		{
			// prepare sql and bind parameters
			$stmt = $conn->prepare("INSERT INTO Nave (nume, clasa, anul_lansarii)
			VALUES (:nume, :clasa, :anul_lansarii)");
			$stmt->bindParam(':nume', $nume);
			$stmt->bindParam(':clasa', $clasa);
			$stmt->bindParam(':anul_lansarii', $anul_lansarii);

			$nume = $_POST['nume'];
			$clasa = $_POST['clasa'];
			$anul_lansarii = $_POST['anul_lansarii'];

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
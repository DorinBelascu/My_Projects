<?php 
	if ($_POST['submit'] ) 
	{	
		try 
		{
			// prepare sql and bind parameters
			$stmt = $conn->prepare("INSERT INTO Consecinte (nava, batalie, rezultat)
			VALUES (:nava, :batalie, :rezultat)");
			$stmt->bindParam(':nava', $nava);
			$stmt->bindParam(':batalie', $batalie);
			$stmt->bindParam(':rezultat', $rezultat);

			$nava = $_POST['nava'];
			$batalie = $_POST['batalie'];
			$rezultat = $_POST['rezultat'];

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
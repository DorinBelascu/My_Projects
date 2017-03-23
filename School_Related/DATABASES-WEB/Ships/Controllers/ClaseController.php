<?php 
	if ($_POST['submit'] ) 
	{	
		try 
		{
			// prepare sql and bind parameters
			$stmt = $conn->prepare("INSERT INTO Clase (clasa, tip, tara, cate_arme, diametru_tun, deplasament)
			VALUES (:clasa, :tip, :tara, :cate_arme, :diametru_tun, :deplasament)");
			$stmt->bindParam(':clasa', $clasa);
			$stmt->bindParam(':tip', $tip);
			$stmt->bindParam(':tara', $tara);
			$stmt->bindParam(':cate_arme', $cate_arme);
			$stmt->bindParam(':diametru_tun', $diametru_tun);
			$stmt->bindParam(':deplasament', $deplasament);

			$clasa = $_POST['clasa'];
			$tip = $_POST['tip'];
			$tara = $_POST['tara'];
			$cate_arme = $_POST['cate_arme'];
			$diametru_tun = $_POST['diametru_tun'];
			$deplasament = $_POST['deplasament'];
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
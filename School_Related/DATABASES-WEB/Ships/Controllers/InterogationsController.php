<?php 
  	include("../Config/connection.php");
	if ($_POST['interogation_0'] ) 
	{	
		try 
		{
			$nr1 = $_POST['i00'] . ""; 
			$nr2 = $_POST['i01'] . "";
			$nr3 = $_POST['i02'] . "";
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT clasa, tara 
				FROM Clase
				WHERE cate_arme IN (:nr1, :nr2, :nr3);");
			$statement->execute(array(":nr1" => $nr1, ":nr2" => $nr2, ":nr3" => $nr3));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interTableHeadArray'] = $interTableHeadArray[0];
			$_SESSION['nr_array'] = [$nr1, $nr2, $nr3];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}

	if ($_POST['interogation_1'] ) 
	{	
		try 
		{
			$data1 = $_POST['i10'] . "";

			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT nume AS denumire_nava
			FROM Nave
			WHERE anul_lansarii <= :data1
			ORDER BY nume;");
			$statement->execute(array(":data1" => $data1));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$nr1, $nr2, $nr3];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}

	if ($_POST['interogation_2'] ) 
	{	
		try 
		{
			$battle = $_POST['i20'] . "";

			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT DISTINCT Nave.nume, Clase.cate_arme , Clase.deplasament
			FROM Consecinte
			JOIN Nave ON Consecinte.nava = Nave.nume
			JOIN Clase ON Nave.clasa = Clase.clasa
			WHERE Consecinte.batalie = :battle;");
			$statement->execute(array(":battle" => $battle));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$battle];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

	if ($_POST['interogation_3'] ) 
	{	
		try 
		{
			$careDa = $_POST['i30'] . "";
			$careNu = $_POST['i31'] . "";

			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT DISTINCT a.tara
			FROM(Clase a
			RIGHT JOIN Clase b ON a.tara = b.tara)
			WHERE a.tip = :careDa AND a.clasa <> b.clasa AND b.tip <> :careNu;");
			$statement->execute(array(":careDa" => $careDa, ":careNu" => $careNu));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$careDa, $careNu];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

	if ($_POST['interogation_4'] ) 
	{	
		try 
		{
			$inputValue = $_POST['i40'];

			$statement = $conn->prepare("SELECT DISTINCT a.tara
			FROM Clase a
			WHERE cate_arme IN (SELECT " . $inputValue . "(cate_arme) FROM Clase);");
			$statement->execute();
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$maiMicSauMaiMare];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}

	if ($_POST['interogation_5'] ) 
	{	
		try 
		{
			$inputValue = $_POST['i50'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			//$maiMicSauMaiMare = ($inputValue == "Cele mai putine") ? "MIN" : "MAX";
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT DISTINCT a.nume
			FROM (batalii a RIGHT JOIN consecinte b ON a.nume = b.batalie RIGHT JOIN nave c ON b.nava = c.nume RIGHT JOIN clase d ON c.clasa = d.clasa)
			WHERE d.clasa <> :inputValue AND a.nume IS NOT NULL;");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

	if ($_POST['interogation_6'] ) 
	{	
		try 
		{
			$inputValue = $_POST['i60'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			//$maiMicSauMaiMare = ($inputValue == "Cele mai putine") ? "MIN" : "MAX";
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT MAX(cate_arme)
				FROM Clase
				WHERE tip = :inputValue;");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}


	if ($_POST['interogation_7'] )
	{	
		try 
		{
			$inputValue = $_POST['i70'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("SELECT DISTINCT a.clasa, COUNT(b.nume)
				FROM Clase a
				RIGHT JOIN Nave b ON a.clasa = b.clasa
				RIGHT JOIN Consecinte c ON c.rezultat = :inputValue
				WHERE b.nume = c.nava
				GROUP BY a.clasa;");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

	if ($_POST['interogation_8'] ) //procedura stocata
	{	
		try 
		{
			$inputValue = $_POST['i80'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("CALL checkBatalie(:inputValue)");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}

	if ($_POST['interogation_9'] ) //procedura stocata
	{	
		try 
		{
			$inputValue = $_POST['i90'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("CALL getClaseFirstLetter(:inputValue)");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

	if ($_POST['interogation_10'] ) //procedura stocata
	{	
		try 
		{
			$inputValue = $_POST['i100'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("CALL getBataliiWithLetter(:inputValue)");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}

	if ($_POST['interogation_11'] ) //procedura stocata
	{	
		try 
		{
			$inputValue = $_POST['i110'];
			//isset($_POST["i40"]) ? mysql_real_escape_string($_POST['i40']) : '';
			/* Execute a prepared statement by passing an array of values */

			$statement = $conn->prepare("CALL getNaveFromClass(:inputValue)");
			$statement->execute(array(":inputValue" => $inputValue));
			$rows = $statement->fetchAll();
			$_SESSION['row'] = $rows;
			$_SESSION['interResArrayController'] = $interResArray[1];
			$_SESSION['input_data'] = [$inputValue];
			echo "<meta http-equiv='refresh' content='0'>";
		}
		catch(PDOException $e)
		{
			echo "Error: " . $e->getMessage();
		}
	}	

?>
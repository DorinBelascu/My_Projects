<?php
	$interArray[0] = "SELECT clasa, tara
	FROM Clase
	WHERE clasa IN(12, 14, 16);";


	$interArray[1] = "SELECT nume AS denumire_nava
	FROM Nave
	WHERE anul_lansarii <= to_date('01 JAN 2014', 'DD MON YYYY', 'NLS_DATE_LANGUAGE = American')
	ORDER BY nume;";

	$interArray[2] = "SELECT DISTINCT Nave.nume, Clase.cate_arme , Clase.deplasament FROM Consecinte JOIN Nave ON Consecinte.nava = Nave.nume JOIN Clase ON Nave.clasa = Clase.clasa WHERE Consecinte.batalie = 'Battle of the Philippine Sea';";

	$interArray[3] = "SELECT DISTINCT a.tara, b.tara
	FROM(Clase a
	RIGHT JOIN Clase b ON a.tara = b.tara)
	WHERE a.tip = 'VL' AND a.clasa <> b.clasa AND b.tip <> 'CR';";

	$interArray[4] = "SELECT DISTINCT a.tara
	FROM Clase a
	WHERE cate_arme IN (SELECT MIN(cate_arme) FROM Clase);";

	$interArray[6] = "SELECT MAX(diametru_tun)
	FROM Clase
	WHERE tip = 'CR';";

	$interArray[7] = "SELECT DISTINCT a.clasa, COUNT(b.nume)
	FROM Clase a
	RIGHT JOIN Nave b ON a.clasa = b.clasa
	RIGHT JOIN Consecinte c ON c.rezultat = 'AVARIAT'
	WHERE b.nume = c.nava
	GROUP BY a.clasa;";	

	$interArray[8] = "CALL checkBatalie('BATALIA1');";
		
	$interArray[9] = "CALL getClaseFirstLetter('C');";	

	$interArray[10] = "CALL getBataliiWithLetter('B');";

	$interArray[11] = "CALL getNaveFromClass('CLASA1');";
?>
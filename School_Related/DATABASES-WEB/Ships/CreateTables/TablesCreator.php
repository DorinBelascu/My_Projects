<?php
	//Tabela Clase
    
    include("TablesDrop.php");
    $sql = "CREATE TABLE Clase 
	(
		clasa varchar(30) NOT NULL,
		tip varchar(2) NOT NULL ,
		tara varchar(30) NOT NULL ,
		cate_arme int NOT NULL ,
		diametru_tun int NOT NULL,
		deplasament int NOT NULL,
		um int NOT NULL
	)";

    $conn->exec($sql);

	//Tabela Nave

    $sql = "CREATE TABLE Nave 
	(
		nume varchar(30) NOT NULL,
		clasa varchar(30) NOT NULL ,
		anul_lansarii date NOT NULL
	)";

    $conn->exec($sql);

	//Tabela Batalii

    $sql = "CREATE TABLE Batalii 
	(
		nume varchar(30) NOT NULL,
		data date NOT NULL
	)";
    
    $conn->exec($sql);

    //Tabela Consecinte

    $sql = "CREATE TABLE Consecinte 
	(
		nava varchar(30) NOT NULL,
		batalie varchar(30) NOT NULL,
		rezultat varchar(30) NOT NULL
	)";

    $conn->exec($sql);
 	include('AddPrimaryKeys.php');
 	include('AddSecondaryKeys.php');
?>
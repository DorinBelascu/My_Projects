<?php 
   	$st = $conn->prepare("ALTER TABLE Clase ADD CONSTRAINT d1 PRIMARY KEY (clasa);");
    $st->execute(); 

   	$st = $conn->prepare("ALTER TABLE Nave ADD CONSTRAINT d2 PRIMARY KEY (nume);");
    $st->execute(); 

   	$st = $conn->prepare("ALTER TABLE Batalii ADD CONSTRAINT d3 PRIMARY KEY (nume);");
    $st->execute(); 

   	$st = $conn->prepare("ALTER TABLE Consecinte ADD CONSTRAINT d4 PRIMARY KEY (nava, batalie);");
    $st->execute(); 
?>
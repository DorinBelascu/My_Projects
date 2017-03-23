<?php
   	$st = $conn->prepare("ALTER TABLE Nave ADD CONSTRAINT d5 FOREIGN KEY(clasa) REFERENCES Clase(clasa);");
    $st->execute();

   	$st = $conn->prepare("ALTER TABLE Consecinte ADD CONSTRAINT d6 FOREIGN KEY(nava) REFERENCES Nave(nume);");
    $st->execute();

   	$st = $conn->prepare("ALTER TABLE Consecinte ADD CONSTRAINT d7 FOREIGN KEY(batalie) REFERENCES Batalii(nume);");
    $st->execute();
    
?>
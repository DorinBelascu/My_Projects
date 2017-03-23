<?php
   	$st = $conn->prepare("ALTER TABLE Clase DROP column um");
    $st->execute();  
?>
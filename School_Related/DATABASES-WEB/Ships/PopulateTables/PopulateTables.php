<?php 
  //Clase
  try{
    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Queen Elizabeth', 'VL', 'ROMANIA', 14, 12, 2);");
    $st->execute();  

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Francillon', 'VL', 'USA', 12, 17, 7);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Friedman', 'CR', 'USA', 16, 13, 7);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Melhorn', 'VL', 'United Kingdom', 12, 11, 3);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Polack', 'CR', 'Japan', 12, 19, 7);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Wadle', 'VL', 'France', 14, 6, 3);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Ader', 'VL', 'USA', 10, 6, 3);");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Ticonderoga', 'VL', 'CHINA', 4, 10, 3);");
    $st->execute();
  
  $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Abercrombie', 'VL', 'USA', 4, 10, 3);");
    $st->execute();
    
  $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Bismarck', 'VL', 'Germany', 20, 432, 100);");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('Togo', 'VL', 'Germany', 14, 12, 3);");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Clase(clasa, tip, tara, cate_arme, diametru_tun, deplasament) VALUES('NELSON', 'VL', 'United Kingdom', 9, 16, 34000);"); 
    $st->execute();      

    //Nave  

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Tirpitz', 'Bismarck', '1940-6-23');");
    $st->execute();   

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Timmins', 'Polack', '1934-11-01');");
    $st->execute();   

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Tetcott', 'Ader', '1925-12-13');");
    $st->execute();   

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Thor', 'Ticonderoga', '1944-1-13');");
    $st->execute();   

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Abelia', 'Togo', '1932-8-17');");
    $st->execute();   

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Abukuma', 'Togo', '1930-2-17');");
    $st->execute(); 

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Queen Elizabeth', 'Queen Elizabeth', '1940-11-22');");
    $st->execute();  

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Parthian', 'Queen Elizabeth', '1941-11-12');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Ticonderoga', 'Ticonderoga', '1939-8-14');");
    $st->execute();

      $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Patroclus', 'Wadle', '1942-8-14');");  
    $st->execute();

      $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Pensacola', 'Bismarck', '1944-8-14');");  
    $st->execute();

      $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Edmundston', 'Wadle', '1944-8-14');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('ROODNEY', 'Ader', '1944-8-14');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Eastview', 'Wadle', '1943-8-12');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Earle', 'Francillon', '1944-6-12');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Mihai II', 'Friedman', '1940-5-11');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Manligheten', 'Friedman', '1943-2-21');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Malaya', 'Friedman', '1942-3-29');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Maori', 'Ticonderoga', '1942-5-20');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Marocain', 'Melhorn', '1939-2-13');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Mariz e Barros', 'Ader', '1944-8-14');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('San Diego', 'Melhorn', '1942-12-12');");  
    $st->execute();

  $st = $conn->prepare("INSERT INTO Nave(nume, clasa, anul_lansarii) VALUES('Savannah', 'Polack', '1942-9-12');");  
    $st->execute();

    //Batalii

    $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Pearl Harbour', '1941-12-7');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Raate Road', '1940-2-15');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Operation Arctic Fox', '1939-12-30');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of the Philippine Sea', '1944-09-21');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of the Oder-Neisse', '1944-05-15');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Ushant', '1939-09-30');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Königsberg', '1942-09-12');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Corregidor', '1943-06-25');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Wau', '1941-01-01');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Japanese occupation of Kiska', '1943-04-24');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Hill 170', '1943-02-05');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Battle of Yenangyaung', '1941-08-15');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Batalii(nume, data) VALUES('Huon Peninsula campaign', '1944-09-01');");
    $st->execute();


    //Consecinte   
    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Tirpitz', 'Battle of the Philippine Sea', 'AVARIAT');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Tetcott', 'Huon Peninsula campaign', 'AVARIAT');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Tirpitz', 'Huon Peninsula campaign', 'NEVATAMAT');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Queen Elizabeth', 'Battle of Hill 170', 'AVARIAT');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Timmins', 'Battle of Wau', 'SCUFUNDAT');");
    $st->execute();

    $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Thor', 'Battle of Königsberg', 'SCUFUNDAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Abelia', 'Battle of Königsberg', 'NEVATAMAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Ticonderoga', 'Pearl Harbour', 'AVARIAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Abukuma', 'Pearl Harbour', 'AVARIAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Edmundston', 'Pearl Harbour', 'NEVATAMAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Pensacola', 'Pearl Harbour', 'NEVATAMAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Edmundston', 'Operation Arctic Fox', 'AVARIAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('ROODNEY', 'Battle of Ushant', 'SCUFUNDAT');");
    $st->execute();
  
  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('San Diego', 'Battle of the Oder-Neisse', 'SCUFUNDAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Abukuma', 'Operation Arctic Fox', 'AVARIAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Abelia', 'Battle of Ushant', 'SCUFUNDAT');");
    $st->execute();

  $st = $conn->prepare("INSERT INTO Consecinte(nava, batalie, rezultat) VALUES('Tirpitz', 'Battle of the Oder-Neisse', 'AVARIAT');");
    $st->execute();
    }
  catch(PDOException $e)    
  {
    echo "Connection failed: " . $e->getMessage();
  }                          
?>
<?php
  include("../Config/connection.php");
  try
  {
    $sql = $conn->prepare("SELECT * FROM Clase");
    $sql->execute();
    
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

?>
<?php include("../layout/TopLayout.php"); ?>
<table class="table" style="margin : 30px;">
  <thead>
    <tr>
      <th>#</th>
      <th>Class</th>
      <th>Tip</th>
      <th>Cate Arme</th>
      <th>Diametru Tun</th>
      <th>Deplasament</th>      
    </tr>
  </thead>
  <tbody>
    <?php $j = 0; ?>
    <?php foreach ($sql as $key => $value) { ?>
    <tr>
      <td><?php $j++; echo $j;?></td>
      <?php for ($i=0; $i < 7; $i++) {?>
      <td><?php echo $value[$i]; ?></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>

<form action="Clase.php" method="post">
  <label>Clasa :</label>
  <input type="text" name="clasa" id="clasa" required="required" placeholder=""/><br /><br />
  <label>Tip :</label>
  <input type="text" name="tip" id="tip" required="required" placeholder=""/><br/><br />
  <label>Tara :</label>
  <input type="text" name="tara" id="tara" required="required" placeholder=""/><br /><br />
  <label>Cate Arme :</label>
  <input type="number" name="cate_arme" id="Cate_Arme" required="required" placeholder=""/><br /><br />
  <label>Diametru Tun :</label>
  <input type="number" name="diametru_tun" id="Diametru_Tun" required="required" placeholder=""/><br /><br />
  <label>Deplasament :</label>
  <input type="number" name="deplasament" id="Deplasament" required="required" placeholder=""/><br /><br />
  <input type="submit" name="submit" value=" Submit " name="submit"/><br />
</form>

<?php
  include("../Controllers/ClaseController.php");
	include("../layout/BottomLayout.php");
?>
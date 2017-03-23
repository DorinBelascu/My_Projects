<?php
  include("../Config/connection.php");
  try
  {
    $sql = $conn->prepare("SELECT * FROM Consecinte");
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
      <th>Nume</th>
      <th>Batalie</th>
      <th>Rezultat</th>   
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

<form action="Consecinte.php" method="post">
  <label>Nava :</label>
  <input type="text" name="nava" id="nava" required="required" placeholder=""/><br /><br />
  <label>Batalie :</label>
  <input type="text" name="batalie" id="batalie" required="required" placeholder=""/><br/><br />
  <label>Rezultat :</label>
  <input type="text" name="rezultat" id="rezultat" required="required" placeholder=""/><br /><br />
  <input type="submit" name="submit" value=" Submit " name="submit"/><br />
</form>

<?php
  include("../Controllers/ConsecinteController.php");
	include("../layout/BottomLayout.php");
?>
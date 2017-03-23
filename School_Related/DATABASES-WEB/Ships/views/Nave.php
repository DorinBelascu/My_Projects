<?php
  include("../Config/connection.php");
  try
  {
    $sql = $conn->prepare("SELECT * FROM Nave");
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
      <th>Clasa</th>
      <th>Anul Lansarii</th>   
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

<form action="Nave.php" method="post">
  <label>Nume :</label>
  <input type="text" name="nume" id="nume" required="required" placeholder=""/><br /><br />
  <label>Clasa :</label>
  <input type="text" name="clasa" id="clasa" required="required" placeholder=""/><br/><br />
  <label>Anul Lansarii :</label>
  <input type="date" name="anul_lansarii" id="anul_lansarii" required="required" placeholder=""/><br /><br />
  <input type="submit" name="submit" value=" Submit " name="submit"/><br />
</form>


<?php
  include("../Controllers/NaveController.php");
	include("../layout/BottomLayout.php");
?>
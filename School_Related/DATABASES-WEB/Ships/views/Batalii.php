<?php 
session_start();

  include("../Config/connection.php");
  try
  {
    $sql = $conn->prepare("SELECT * FROM Batalii");
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
      <th>Data</th>
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

<form action="" method="post">
  <label>Nume :</label>
  <input type="text" name="nume" id="nume" required="required" placeholder=""/><br /><br />
  <label>Data :</label>
  <input type="date" name="data" id="data" required="required" placeholder=""/><br/><br />
  <input type="submit" name="submit" value=" Submit " name="submit"/><br />
</form>

<?php
  include("../Controllers/BataliiController.php");
	include("../layout/BottomLayout.php");
?>
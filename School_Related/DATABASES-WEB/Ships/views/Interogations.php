<?php
  session_start();

  include("../Config/connection.php");
  include("../Config/InterogationsArray.php");
  include("../Config/InterogationsTextArray.php");
  include("../Config/InterogationsInputArray.php");
?>

<?php include("../layout/TopLayout.php"); ?>


  <ul class="list-group " style="margin:20px; font-size : 15px;">
  <?php for($i=0; $i<12; $i++) { ?>  
    <li class="list-group-item">
      <div class="row">
        <div class="col-md-8">
          <p><?php echo $interTextArray[$i];?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <?php echo $interArray[$i]; ?>
        </div>
        <div class="col-md-4">
          <div class="row">
            <form action="" method="post" id="interogations_form">
              <?php echo $interInputArray[$i]; ?>
              <input name="interogation_<?php echo $i; ?>" class="btn btn-primary btn-sm" type="submit" value="Executa">
            </form>
          </div>    
        </div>
      </div>
    </li>

  <?php } ?> 
  </ul>

<?php foreach ($_SESSION['input_data'] as $key => $value) 
{
  echo $value . ' ';
}?>

<table class="table" style="margin : 30px;">
  <thead>
    <?php
      echo $_SESSION['interResArrayController']; 
    ?>
  </thead>
  <tbody>
    <?php $j = 0; ?>
    <?php foreach ($_SESSION['row'] as $key => $value) { ?>
    <tr>
      <td><?php $j++; echo $j;?></td>
      <?php for ($t = 0; $t<sizeof($value); $t++) { ?>
      <td><?php echo $value[$t]; ?></td>
      <?php } ?>
    </tr>
    <?php } ?>
  </tbody>
</table>



<?php
  session_unset();
  include("../Controllers/InterogationsController.php");
  include("../layout/BottomLayout.php");
?>

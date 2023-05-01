<?php
 $pCount = $uCount = $bCount = $qCount = '';

 $query = $db->query("SELECT * FROM produtos");
 $pCount = $query->rowCount();

 $quer = $db->query("SELECT * FROM categoria");
 $bCount = $quer->rowCount();

 $que = $db->query("SELECT * FROM outdate");
 $qCount = $que->rowCount();

 $qu = $db->query("SELECT * FROM admin");
 $uCount = $qu->rowCount();

?>


<div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-list w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $pCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Produtos</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $qCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Out of Date</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-list w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $bCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>categoria
        </h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $uCount;  ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
  </div>
<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Painel do usuario</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Produtos recentes</h2>
 <div class="table-responsive">
 	<table class="table table-hover" id="table">
 		<thead>
 			<tr>
 				<th>S/N</th>
 				<th>Id do produto.</th>
 				<th>Categoria</th>
 				<th>Quantidade</th>
 				<th>Registador</th>
 				<th>Data de registro</th>
 				<th>Descricao.</th>
 			</tr>
 		</thead>
 		<tbody>
			<!--
			$n_produto = $_POST['Produto'];
	      	$n_quant = $_POST['Quantidade'];
	      	$n_arrived = $_POST['arrived'];
	      	$n_categoria= $_POST['Categoria'];
	      	$n_desc= $_POST['Descricao'];
	      	$n_status = $_POST['status'];
	      	$n_Register = $_POST['Registador'];-->
			  <?php
               $qpi = $db->query("SELECT * FROM produtos ORDER BY id");
               $result = $qpi->fetchAll(PDO::FETCH_OBJ);
               $c = $qpi->rowCount();

               foreach ($result as $j) {
               	 $product_name = $j->produto;
               	 $cat_id = $j->cat_id;
               	 $quantidade = $j->quantidade;
               	 $register = $j->register;
               	 $desc = $j->desc;
               	 $arr = $j->arrived;

               	 $k = $db->query("SELECT * FROM categoria WHERE id = '$cat_id' ");
               	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
               	 foreach ($ks as $r) {
               	 	$bname = $r->name;
               	 ?>
                  <tr>
                  	<td>
                  		<?php for ($i=1; $i <= $c ; $i++) { 
                  			echo $i;
                  		} ?>
                  	</td>
                  	<td><?php echo $product_name; ?></td>
                  	<td><?php echo $bname; ?></td>
                  	<td><?php echo $quantidade; ?></td>
                  	<td><?php echo $register; ?></td>
                  	<td><?php echo $arr; ?></td>
                  	<td><?php echo $desc; ?></td>
                  </tr>
               	 <?php
                 }
              }
 			?>
 		</tbody>
 	</table>
 </div>
 </div>
</div>


</div>



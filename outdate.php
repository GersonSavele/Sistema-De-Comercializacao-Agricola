<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-product.php');

 }else{
 	
 	$Produto = $bname = $b_id = $health = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM produtos WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $Produto = $obj->Produto;
	   $b_id = $obj->Categoria_id;
	   $health = $obj->health_status;

	     $k = $db->query("SELECT * FROM categoria WHERE id = '$b_id' ");
       	 $ks = $k->fetchAll(PDO::FETCH_OBJ);
       	 foreach ($ks as $r) {
       	 	$bname = $r->name;
       	 }
 	}
 }

?>
<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Product Management</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
	 <div class="w3-row">
	 	<h2>Out of Date List</h2>
	 	<div class="col-md-6">
	 		<table class="table table-hover" id="table">
	 			<thead>
	 				<tr>
	 					<th>Id do produto</th>
	 					<th>Date outdate </th>
	 					<th>Categoria</th>
	 					<th>Reason</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php

	 				$get = $db->query("SELECT * FROM outdate ");
	 				$res = $get->fetchAll(PDO::FETCH_OBJ);
	 				foreach($res as $n){ ?>
                         <tr>
                         	<td> <?php echo $n->Product; ?> </td>
                         	<td>  <?php echo $n->date_q; ?> </td>
                         	<td><?php echo $n->Categoria; ?> </td>
                         	<td> <?php echo $n->reason; ?> </td>
                         </tr> 
	 				<?php }

	 				?>
	 			</tbody>
	 		</table>
	 	</div>

	 	<div class="col-md-6">
		<!--
			$n_produto = $_POST['Produto'];
	      	$n_quant = $_POST['Quantidade'];
	      	$n_arrived = $_POST['arrived'];
	      	$n_categoria= $_POST['Categoria'];
	      	$n_desc= $_POST['Descricao'];
	      	$n_status = $_POST['status'];
	      	$n_Register = $_POST['Registador'];
      	
-->
     <?php
      if(isset($_POST['submit']))
      {
      	$n_produto = $_POST['Produto'];
     
      	$n_categoria = $_POST['Categoria'];
      	$n_desc = $_POST['reason'];
      	$now = date('Y-m-d');
  

      	$n_id = $_GET['id'];

      	$insert_query = $db->query("INSERT INTO outdate (Producto,Categoria,reason,date_q)VALUES('$n_produto','$n_categoria','$n_desc','$now') ");

      	if($insert_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Product successfully outdate d <i class="fa fa-check"></i></strong>
        </div>
       <?php
         header('refresh: 5');
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error inserting product data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>


	 		<form role='form' method="post">
	 			<div class="form-group">
	 				<label class="control-label">Id do Produto</label>
	 				<input type="text" name="Produto" readonly="on" class="form-control" value="<?php echo $Produto; ?>">
	 			</div>

	 			<div class="form-group">
	 				<label class="control-label">Categoria</label>
	 				<input type="text" name="Categoria" readonly="on" class="form-control" value="<?php echo $bname; ?>">
	 			</div>

	 			<div class="form-group">
	 				<label class="control-label">Reason</label>
	 				<textarea name="reason" placeholder="Enter reason for outdate " class="form-control" value=""></textarea>
	 			</div>

	 			<button name="submit" type="submit" class="btn btn-sm  btn-default">Add to list</button>
	 		</form>
	 	</div>
	 </div>
</div>

</div>


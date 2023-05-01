<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>


<?php 
 if(!$_GET['id'] OR empty($_GET['id']) OR $_GET['id'] == '')
 {
 	header('location: manage-produto.php');

 }else{
 	
 	$n_produto  = $n_quant = $n_categoria = $n_desc = $arr = $bname = $register_id = $health = $img = "";
 	$id = (int)$_GET['id'];
 	$query = $db->query("SELECT * FROM produtos WHERE id = '$id' ");
 	$fetchObj = $query->fetchAll(PDO::FETCH_OBJ);

 	foreach($fetchObj as $obj){
       $n_produto  = $obj->produto;
       $n_quant = $obj->quantidade;
	   $n_categoria = $obj->categoria;
	   $n_desc = $obj->descricao;
	   $arr = $obj->arrived;
	   $register_id = $obj->register_id;
	   $health = $obj->health_status;
	   $img = $obj->img;

	     $k = $db->query("SELECT * FROM Categoria WHERE id = '$register_id' ");
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
    <h5><b><i class="fa fa-dashboard"></i> Painel</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
<div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
  
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
      	$n_quant  = $_POST['Quantidade'];
      	$n_arrived = $_POST['arrived'];
      	$n_categoria = $_POST['Categoria'];
      	$n_desc = $_POST['Descricao'];
      	$n_status = $_POST['status'];

      	$n_id = $_GET['id'];

      	$update_query = $db->query("UPDATE produtos SET Produto = '$n_produto',Quantidade = '$n_quant ',arrived = '$n_arrived', Categoria_id = '$n_categoria', Descricao = '$n_desc',health_status = '$n_status' WHERE id = '$n_id' ");

      	if($update_query){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Product details successfully update <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Error updating product data. Please try again <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }

      }

     ?>




 		<h2>Editar Produto</h2>
	 	<form method="post">
	 		<div class="form-group">
	 			<label class="control-label">Id do produto.</label>
	 			<input type="text" name="Produto" class="form-control" value="<?php echo $Produto; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Pig Weight</label>
	 			<input type="text" name="Quantidade" class="form-control" value="<?php echo $Quantidade; ?>">
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Data de registro</label>
	 			<input type="text" name="arrived" class="form-control" value="<?php echo $arr; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Estado do Produto</label>
	 			<input type="text" name="status" class="form-control" value="<?php echo $health; ?>">
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Categoria</label>
	 			<select name="Categoria" class="form-control">
	 				<option value="<?php echo $b_id; ?>" selected><?php echo $bname; ?></option>
	 				<?php
	                   $getBreed = $db->query("SELECT * FROM Categoria");
	                   $res = $getBreed->fetchAll(PDO::FETCH_OBJ);
	                   foreach($res as $r){ ?>
	                     <option value="<?php echo $r->id; ?>"><?php echo $r->name; ?></option>   
	                   <?php
	                   }
	 				?>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Descricao</label>
	 			<textarea class="form-control" name="Descricao"><?php echo $Descricao; ?></textarea>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
	 	</form>
 </div>
 <div class="col-md-4 col-md-offset-2">
 	<h2>Foto do produto</h2>
 	<img src="<?php echo $img; ?>" width="130" height="120" class="thumbnail img img-responsive">
 	<p class="text-justify text-center">
 		<?php echo $Descricao; ?>
 	</p>
 	<a class="btn btn-danger btn-md" onclick="return confirm('Continue delete produto?')" href="delete.php?id=<?php echo $id ?>"><i class="fa fa-trash"></i> Delete Produto</a>
 </div>
</div>
</div>
</div>



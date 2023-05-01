<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Gerenciamento de Produtos > Adicionar</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Adicionar novo produto</h2>

 	<div class="col-md-6">
      
      <?php
      if(isset($_POST['submit']))
      {
      	if(isset($_FILES['productPhoto']['tmp_name'])){
			
			$n_produto = $_POST['Produto'];
	      	$n_quant = $_POST['Quantidade'];
	      	$n_arrived = $_POST['arrived'];
	      	$n_categoria= $_POST['Categoria'];
	      	$n_desc= $_POST['Descricao'];
	      	$n_status = $_POST['status'];
	      	$n_Register = $_POST['Registador'];
      	
      		$res1_name = basename($_FILES['productPhoto']['name']);
			$tmp_name = $_FILES['productPhoto']['tmp_name'];
			$type = $_FILES['productPhoto']['type'];
			$max_size = 2097152;
			$size = $_FILES['productPhoto']['size'];

			if (isset($res1_name)) {
				$location = 'uploadfolder/';
				$move = move_uploaded_file($tmp_name, $location.$res1_name);
				$path1 = $location.$res1_name;

			
				if (!$move) {
					$fileerror = $_FILES['productPhoto']['error'];
					$message = $upload_errors[$fileerror];
					
				}
			}
		}
      	

   

    

      	$insert = $db->query("INSERT INTO produtos (Produto,Quantidade,arrived,Data de registro_id,Descricao,health_status,img,Registador) VALUES('$n_produto','$n_quant','$n_arrived','$n_categoria','$n_desc','$n_status','$path1','$n_Register') ");

      	if($insert){?>
      	<div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Produto foi adicianado. <i class="fa fa-check"></i></strong>
        </div>
       <?php
      	}else{ ?>
          <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
             <strong>Erro ao adcionar produto. Tente novamente <i class="fa fa-times"></i></strong>
        </div>
      	<?php
      }
      
      }

     ?>




<form method="post" autocomplete="off" enctype="multipart/form-data">
 			<div class="form-group">
	 			<label class="control-label">Id do produto.</label>
	 			<input type="text" name="produto" class="form-control" value="produto-fms-<?php echo mt_rand(0000,9999); ?>" readonly="on" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Quantidade/label>
	 			<input type="text" name="quantidade" class="form-control" required>
	 		</div>

	 		<div class="form-group date" data-provide="datepicker">
	 			<label class="control-label">Data de registro</label>
	 			<input type="text" name="arrived" class="form-control" required>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Categoria</label>
	 			<select name="gender" class="form-control" required>
	 				<option value="cat1">Culturas alimentares(milho, mandioca, arroz,outro)</option>
	 				<option value="cat2">Culturas comerciais(abaco de algodão, sementes oleaginosas)</option>
					 <option value="cat3">Culturas arbóreas(caju, coco,outro)</option>

	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Estado do Produto</label>
	 			<select name="status" class="form-control" required>
	 				<option value="active">Em estoque</option>
	 				<option value="inactive">Sem estoque</option>
	 			</select>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Categoria</label>
	 			<select name="Categoria" class="form-control" required>
	 				<option value=""></option>
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
	 			<textarea class="form-control" name="Descricao" required></textarea>
	 		</div>

	 		<div class="form-group">
	 			<label class="control-label">Foto do produto</label>
	 			<input type="file" name="productPhoto" class="form-control" required>
	 		</div>

	 		<button name="submit" type="submit" name="submit" class="btn btn-sn btn-default">Update</button>
 		</form>
 	</div>
 </div>
</div>

</div>

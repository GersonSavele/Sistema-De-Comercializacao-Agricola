<?php include 'setting/system.php'; ?>
<?php include 'theme/head.php'; ?>
<?php include 'theme/sidebar.php'; ?>
<?php include 'session.php'; ?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Product Management</b></h5>
  </header>
 
 <?php include 'inc/data.php'; ?>

 
 <div class="w3-container" style="padding-top:22px">
 <div class="w3-row">
 	<h2>Manage products</h2>
  <a href="add-product.php" class="btn btn-sm btn-primary pull-right"><i class="fa fa-plus"></i> Add New Product</a><br><br>
 <div class="table-responsive">
 	<table class="table table-hover table-striped" id="table">
 		<thead>
 			<tr>
 				<th>S/N</th>
        <th>PFoto</th>
 				<th>Id do produto.</th>
 				<th>Categoria</th>
 				<th>Quantidade</th>
 				<th>Responsavel pelo registro</th>
 				<th>Data de Registo</th>
 				<th>Descricao.</th>
        <th></th>
 			</tr>
 		</thead>
 		<tbody>
 			<?php
       $all_products = $db->query("SELECT * FROM produtos ORDER BY id DESC");
       $fetch = $all_products->fetchAll(PDO::FETCH_OBJ);
       foreach($fetch as $data){ 
          $get_categ = $db->query("SELECT * FROM categoria WHERE id = '$data->categoria_id'");
          $categ_result = $get_categ->fetchAll(PDO::FETCH_OBJ);
          foreach($categ_result as $categoria){
        ?>
          <tr>
            <td><?php echo $data->id ?></td>
            <td>
              <img width="70" height="70" src="<?php echo $data->img; ?>" class="img img-responsive thumbnail">
            </td>
            <td><?php echo $data->produto ?></td>
            <td><?php echo $categoria->name ?></td>
            <td><?php echo $data->quantidade ?></td>
            <td><?php echo $data->register?></td>
            <td><?php echo $data->arrived ?></td>
            <td><?php echo wordwrap($data->descricao,300,'<br>'); ?></td>
            <td>
               <div class="dropdown">
                  <button class="btn btn-sm btn-default dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-cog"></i> Option
                  <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="edit-product.php?id=<?php echo $data->id ?>"><i class="fa fa-edit"></i> Edit</a></li>
                    <li><a onclick="return confirm('Continue delete product ?')" href="delete.php?id=<?php echo $data->id ?>"><i class="fa fa-trash"></i> Delete</a></li>
                    <li><a onclick="return confirm('Continue out of date product ?')" href="outdate.php?id=<?php echo $data->id; ?>"><i class="fa fa-paper-plane"></i>  Produto Vencido</a></li>
                  </ul>
                </div> 
            </td>
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



<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):
$contacts = TonerData::getAll();
	?>
    <section class="content">
      <div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h1 class="">Entrega toners</h1>
									<a href="./?view=toners&opt=new" class="btn btn-secondary">Nueva Entrega</a>
								</div>
								<div class="card-body">
									<?php if(count($contacts)>0):?>
										<div>
										<table class="table table-bordered datatable">
											<thead>
												<th>Nombre</th>

												<th></th>
											</thead>
											<?php foreach($contacts as $con):?>
												<tr>
													<td><?php echo $con->name; ?></td>

													<td style="width:160px; ">
														<a href="./?view=toners&opt=edit&id=<?php echo $con->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</a>
														<a href="./?action=toners&opt=del&id=<?php echo $con->id; ?>" id="item-<?php echo $con->id; ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
														<script type="text/javascript">
															$("#item-<?php echo $con->id; ?>").click(function(e){
																e.preventDefault();
																x = confirm("Seguro desea eliminar este elemento?");
																if(x){
																	window.location = "./?action=toners&opt=del&id=<?php echo $con->id; ?>";
																}
															});
														</script>
													</td>
												</tr>
											<?php endforeach ;?>
										</table>
									</div>

									<?php else:?>
										<p class="alert alert-warning">No hay Categorias.</p>
									<?php endif;?>
								</div>
							</div>

						</div>
					</div>
</div>
</section>
<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="new"):?>
    <section class="content">
      <div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h1 class="">Nueva Entrega de Toner</h1>
									<a href="./?view=toners&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
								</div>
								<div class="card-body">

<form method="post" action="./?action=toners&opt=add">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
  </div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
								</div>
							</div>

						</div>
					</div>
</div>
</section>

<?php elseif(isset($_GET["opt"]) && $_GET["opt"]=="edit"):
$con = TonerData::getById($_GET["id"]);
	?>
    <section class="content">
      <div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h1 class="">Editar Categoria</h1>
									<a href="./?view=toners&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
								</div>
								<div class="card-body">

<form method="post" action="./?action=toners&opt=update">
	<input type="hidden" name="_id" value="<?php echo $con->id; ?>">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" name="name" class="form-control" value="<?php echo $con->name; ?>" id="name" placeholder="Nombre">
  </div>


  <button type="submit" class="btn btn-success">Actualizar</button>
</form>
								</div>
							</div>

						</div>
					</div>
</div>
</section>
<?php endif; ?>


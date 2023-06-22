<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):
$contacts = PersonData::getAll();
	?>
    <section class="content">
      <div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h1 class="">Eventos Auditorio</h1>
									<a href="./?view=eventos&opt=new" class="btn btn-secondary">Nuevo Evento</a>
								</div>
								<div class="card-body">
									<?php if(count($contacts)>0):?>
										<div>
										<table class="table table-bordered datatable">
											<thead>
												<th>Evento</th>
												<th>Responsable</th>
												<th>Fecha</th>
												<th>Hora de inicio</th>
												<th>Hora de termino</th>
												<th>Recursos</th>
												<th></th>
											</thead>
											<?php foreach($contacts as $con):?>
												<tr>
													<td><?php echo $con->evento; ?></td>
													<td><?php echo $con->responsable; ?></td>
													<td><?php echo $con->fecha; ?></td>
													<td><?php echo $con->hora_inicio; ?></td>
													<td><?php echo $con->hora_fin; ?></td>
													<td><?php echo $con->recursos; ?></td>
													<td style="width:160px; ">
														<a href="./?view=eventos&opt=edit&id=<?php echo $con->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
														<a href="./?action=eventos&opt=del&id=<?php echo $con->id; ?>" id="item-<?php echo $con->id; ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
														<script type="text/javascript">
															$("#item-<?php echo $con->id; ?>").click(function(e){
																e.preventDefault();
																x = confirm("Seguro desea eliminar este evento?");
																if(x){
																	window.location = "./?action=eventos&opt=del&id=<?php echo $con->id; ?>";
																}
															});
														</script>
													</td>
												</tr>
											<?php endforeach ;?>
										</table>
									</div>

									<?php else:?>
										<p class="alert alert-warning">No hay Eventos.</p>
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
									<h1 class="">Nuevo Evento</h1>
									<a href="./?view=eventos&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
								</div>
								<div class="card-body">

<form method="post" action="./?action=eventos&opt=add">
  <div class="mb-3">
    <label for="name" class="form-label">Evento</label>
    <input type="text" name="evento" class="form-control" id="name" placeholder="Evento">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Responsable</label>
    <input type="text" name="responsable" id="lastname" class="form-control" placeholder="Responsable" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha</label>
    <input type="date" name="fecha" id="address" class="form-control" placeholder="Fecha" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Hora de inicio </label>
    <input type="time" name="hora_inicio" class="form-control" placeholder="Hora de inicio">

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Hora de termino</label>
    <input type="time" name="hora_fin" id="phone" class="form-control" placeholder="Hora de termino" >
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Recursos</label>
    <input type="text" name="recursos" id="phone" class="form-control" placeholder="Recursos" >
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
$con = PersonData::getById($_GET["id"]);
	?>
    <section class="content">
      <div class="container-fluid">
					<div class="row">
						<div class="col-12">

							<div class="card">
								<div class="card-header">
									<h1 class="">Editar Contacto</h1>
									<a href="./?view=eventos&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
								</div>
								<div class="card-body">

<form method="post" action="./?action=eventos&opt=update">
	<input type="hidden" name="_id" value="<?php echo $con->id; ?>">
  <div class="mb-3">
    <label for="name" class="form-label">Evento</label>
    <input type="text" name="evento" class="form-control" value="<?php echo $con->evento; ?>" id="name" placeholder="Evento">
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Responsable</label>
    <input type="text" name="responsable" id="lastname" class="form-control"  value="<?php echo $con->responsable; ?>" placeholder="Responsable" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fecha</label>
    <input type="date" name="fecha" id="address" class="form-control" value="<?php echo $con->fecha; ?>" placeholder="Fecha" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Hora de inicio</label>
    <input type="time" name="hora_inicio" class="form-control" value="<?php echo $con->hora_inicio; ?>" placeholder="Hora de inicio">

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Hora de termino</label>
    <input type="time" name="hora_fin" id="phone" class="form-control" value="<?php echo $con->hora_fin; ?>" placeholder="Hora de termino" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Recursos</label>
    <input type="text" name="recursos" id="phone" class="form-control" value="<?php echo $con->recursos; ?>" placeholder="Recursos" >
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


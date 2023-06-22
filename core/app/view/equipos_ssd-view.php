<?php if(isset($_GET["opt"]) && $_GET["opt"]=="all"):
$pc_ssd = EquiposSSD::getAll();
  ?>
    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h1 class="">Equipos SSD</h1>
                  <a href="./?view=equipos_ssd&opt=new" class="btn btn-secondary">Nuevo Equipo con SSD</a>
                </div>
                <div class="card-body">
                  <?php if(count($pc_ssd)>0):?>
                    <div>
                    <table class="table table-bordered datatable">
                      <thead>
                        <th>Equipo</th>
                        <th>Bm</th>
                        <th>Num. serie</th>
                        <th>Tipo de SSD</th>
                        <th>Usuario</th>
                        <th></th>
                      </thead>
                      <?php foreach($pc_ssd as $con):?>
                        <tr>
                          <td><?php echo $con->equipo; ?></td>
                          <td><?php echo $con->bm; ?></td>
                          <td><?php echo $con->numero_serie; ?></td>
                          <td><?php echo $con->tipo_ssd; ?></td>
                          <td><?php echo $con->usuario; ?></td>
                          <td style="width:160px; ">
                            <a href="./?view=equipos_ssd&opt=edit&id=<?php echo $con->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Editar</a>
                            <a href="./?action=equipos_ssd&opt=del&id=<?php echo $con->id; ?>" id="item-<?php echo $con->id; ?>"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                            <script type="text/javascript">
                              $("#item-<?php echo $con->id; ?>").click(function(e){
                                e.preventDefault();
                                x = confirm("Seguro desea eliminar este elemento?");
                                if(x){
                                  window.location = "./?action=users&opt=del&id=<?php echo $con->id; ?>";
                                }
                              });
                            </script>
                          </td>
                        </tr>
                      <?php endforeach ;?>
                    </table>
                  </div>

                  <?php else:?>
                    <p class="alert alert-warning">No hay Usuarios.</p>
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
                  <h1 class="">Nuevo Equipo SSD</h1>
                  <a href="./?view=equipos_ssd&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
                </div>
                <div class="card-body">

<form method="post" action="./?action=equipos_ssd&opt=add">
  <div class="mb-3">
    <label for="equipo" class="form-label">Equipo</label>
    <input type="text" name="equipo" class="form-control" id="equipo" placeholder="Equipo">
  </div>
  <div class="mb-3">
    <label for="lastn" class="form-label">Bm</label>
    <input type="text" name="bm" id="bm" class="form-control" placeholder="Bm" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Num. serie</label>
    <input type="text" name="numero_serie" id="numero_serie" class="form-control" placeholder="Num. serie" >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Tipo de SSD</label>
    <input type="text" name="tipo_ssd" id="tipo_ssd" class="form-control" placeholder="Tipo de SSD">

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario" >
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
$con = EquiposSSD::getById($_GET["id"]);
  ?>
      <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h1 class="">Editar Equipo SSD</h1>
                  <a href="./?view=equipos_ssd&opt=all" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Regresar</a>
                </div>
                <div class="card-body">

<form method="post" action="./?action=equipos_ssd&opt=update">
  <input type="hidden" name="_id" value="<?php echo $con->id; ?>">
  <div class="mb-3">
    <label for="equipo" class="form-label">Equipo</label>
    <input type="text" name="equipo" class="form-control" value="<?php echo $con->equipo; ?>" id="equipo" placeholder="Equipo">
  </div>
  <div class="mb-3">
    <label for="bm" class="form-label">Bm</label>
    <input type="text" name="bm" id="bm" class="form-control"  value="<?php echo $con->bm; ?>" placeholder="Bm" >
  </div>
  <div class="mb-3">
    <label for="numero_serie" class="form-label">Nombre de serie</label>
    <input type="text" name="numero_serie" id="numero_serie" class="form-control" value="<?php echo $con->numero_serie; ?>" placeholder="Numero de serie" >
  </div>
  <div class="mb-3">
    <label for="tipo_ssd" class="form-label">Tipo de SSD </label>
    <input type="text" name="tipo_ssd" id="tipo_ssd" class="form-control" value="<?php echo $con->tipo_ssd; ?>" placeholder="Tipo ssd">

  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Usuario</label>
    <input type="text" name="usuario" id="usuario" class="form-control" value="<?php echo $con->usuario; ?>" placeholder="Usuario" >
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


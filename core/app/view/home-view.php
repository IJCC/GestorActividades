    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Escritorio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Escritorio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo count(PersonData::getAll());?></h3>

                <p>Eventos</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-plus"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <!-- <div class="small-box bg-success">
              <div class="inner">
                <h3><?php //echo count(CategoryData::getAll());?></h3>

                <p>Categorias</p>
              </div>
              <div class="icon">
                <i class="fa fa-th-list"></i>
              </div>
            </div>-->
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo count(UserData::getAll());?></h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo count(EquiposSSD::getAll());?></h3>

                <p>SSD's</p>
              </div>
              <div class="icon">
                <i class="fas fa-hdd"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-bar mr-1"></i>
                  Eventos
                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

                <canvas id="chartjs-dashboard-line" style="height:300px;">
                </canvas>


              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


          </section>

          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-bar mr-1"></i>
                  SSD's Instalados
                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

                <canvas id="chartjs-dashboard-line2" style="height:300px;">
                </canvas>


              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

          
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
      var gradient = ctx.createLinearGradient(0, 0, 0, 225);
      gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
      gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
      // Bar chart
      new Chart(document.getElementById("chartjs-dashboard-line"), {
        type: "bar",
        data: {
          labels: [
          <?php 
          $start  = time()-(60*60*26*30);
          for($i=$start; $i<=time(); $i+=(60*60*24)):?>
          "<?php echo date('Y-m-d',$i);?>", 
      <?php endfor; ?>

          ],          datasets: [{
            label: "Eventos",
            fill: true,
            backgroundColor: "#ff5733",
            borderColor:"#3B7DDD",
            data: [
<?php 
          $start  = time()-(60*60*26*30);
          for($i=$start; $i<=time(); $i+=(60*60*24)):?>
            <?php echo (PersonData::getByDate(date('Y-m-d', $i))->cnt); ?>, 
<?php endfor; ?>
            ],
          }]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            intersect: false
          },
          hover: {
            intersect: true
          },
          plugins: {
            filler: {
              propagate: false
            }
          },
          scales: {
            xAxes: [{
              reverse: true,
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }],
            yAxes: [{
              ticks: {
                stepSize: 1000
              },
              display: true,
              borderDash: [3, 3],
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }]
          }
        }
      });
    });
  </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
      var gradient = ctx.createLinearGradient(0, 0, 0, 225);
      gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
      gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
      // Line chart
      new Chart(document.getElementById("chartjs-dashboard-line2"), {
        type: "line",
        data: {
          labels: [
          <?php 
          $start  = time()-(60*60*26*30);
          for($i=$start; $i<=time(); $i+=(60*60*24)):?>
          "<?php echo date('Y-m-d',$i);?>", 
      <?php endfor; ?>

          ],          datasets: [{
            label: "SSD",
            fill: true,
            backgroundColor: "#dffaf7",
            borderColor:"#3B7DDD",
            data: [
<?php 
          $start  = time()-(60*60*26*30);
          for($i=$start; $i<=time(); $i+=(60*60*24)):?>
            <?php echo (EquiposSSD::getByDate(date('Y-m-d', $i))->cnt); ?>, 
<?php endfor; ?>
            ],
          }]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            intersect: false
          },
          hover: {
            intersect: true
          },
          plugins: {
            filler: {
              propagate: false
            }
          },
          scales: {
            xAxes: [{
              reverse: true,
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }],
            yAxes: [{
              ticks: {
                stepSize: 1000
              },
              display: true,
              borderDash: [3, 3],
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }]
          }
        }
      });
    });
  </script>


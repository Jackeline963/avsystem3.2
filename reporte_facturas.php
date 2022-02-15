<?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once('header_dos.php');
date_default_timezone_set('America/El_Salvador'); $hoy = date("Y-m-d");;
?>

<div class="content-wrapper">

  <div class="content" id="reporte_facturas">

    <div class="header" style="padding:20px;">
      <div class="row mb-2">
        <div class="col-sm-9">
        <section>
          <h2 style="text-align:center"><i class="far fa-file-alt" style="color:green"></i><strong>  REPORTE GENERAL DE FACTURAS</strong></h2>
        </section>
          </div>
          <div class="col-sm-3">
            <div>
             <ul class="breadcrumb float-sm-right" style="background-color:transparent;padding:0px;">
               <li class="breadcrumb-item"><a href="reportes.php">Ventas</a></li>
               <li class="breadcrumb-item"><a href="reporte_recibos.php">Recibos</a></li>
               <li class="breadcrumb-item active">Facturas</li>
             </ul>
           </div>
          </div>
      </div>       

    </div>

    <div class="card-body p-0" style="margin:7px">
      <table id="listar_reporte_facturas" width="100%" data-order='[[ 0, "desc" ]]' class="table-hover table-bordered">
        <thead style="background:#034f84;color:white;font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center">
          <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>#Correlativo</th>
          <th>Nombre del paciente</th>
          <th>Monto</th>
          </tr>
        </thead>
        <tbody style="font-family: Helvetica, Arial, sans-serif;font-size: 11px;text-align: center;"></tbody>
      </table>
    </div>
  </div>
</div>


<?php require_once("footer.php");?>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>

<script src="js/reporteria.js"></script>

<?php } else{
    echo "Acceso no permitido";
  } ?>

 
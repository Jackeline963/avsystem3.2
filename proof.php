 
<?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){

require_once("modelos/Externos.php");
$users = new Externos();
$opto = $users->get_usuarios_ventas();

require_once("header_dos.php");
require_once("modals/listar_aros_en_venta.php");
require_once("modals/modal_lente_en_venta.php");
require_once("modals/modal_accesorios_ventas.php");
require_once("modals/pacientes_con_consulta.php");
require_once("modals/pacientes_sin_consulta.php");
require_once("modals/listar_servicios_venta.php");
require_once("modals/modal_recibo_inicial.php");
require_once("modals/antireflejante_ventas.php");
require_once("modals/photosensible_ventas.php");
require_once("modals/referentes.php");
require_once("modals/empresas_credito_fiscal.php");
require_once("modals/modal_correlativo_factura.php");
require_once("modals/modal_oid.php");
require_once("modals/modal_prima_oid.php");
require_once("modals/modal_cargo_automatico.php");
?>
<style>
  html{ 
    overflow: scroll; 
    -webkit-overflow-scrolling: touch;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
  <section class="content" style="margin-top: 5px">
    <div class="row">
      <div class="col-12">
      <div class="card">
  
<div class="card-body"><!--CONTENIDO-->

<section class="content">            
  <div class="container-fluid">

<div class="invoice p-3 mb-3">
              
              <div class="row row2" style="background:#E0E0E0;border-radius: 5px">



                  <div class="form-group col-sm-3">
                    <label for="">Existe Consulta?</label>
                      <select class="form-control input-dark" id="consulta_ex" required="">
                        <option value=''>Seleccionar...</option>
                        <option value='Si'>Si</option>
                        <option value='No'>No</option>
                      </select>
                  </div>

                  <div class="col-sm-3 select2-purple">
                      <label for="ex3">Vendedor</label>
                      <select class="select2 form-control" id="usuario" multiple="multiple" data-placeholder="Seleccionar vendedor" data-dropdown-css-class="select2-purple" style="width: 100%;height: ">              
                      <option value="0">Seleccionar usuario</option>
                      <?php
                      for ($i=0; $i < sizeof($opto); $i++) { ?>
                      <option value="<?php echo $opto[$i]["id_usuario"]?>"><?php echo strtoupper($opto[$i]["nick"]);?></option>
                      <?php  } ?>              
                      </select>              
                  </div>
            </div>

</div>
</div>
</section>




<?php require_once("footer.php");?>
<?php date_default_timezone_set('America/El_Salvador'); $hoy = date("d-m-Y H:i:s");?>
<!--<input type="hidden" name="usuario" id="usuario" value="<?php //echo $_SESSION["id_usuario"];?>"/>-->
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal_usuario" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
<input type="hidden" id="fecha" value="<?php echo $hoy;?>">
<input type="hidden" id="name_pag" value="MODULO VENTAS">
<input type="hidden" id="id_consulta">
<input type="hidden" id="id_paciente">
<input type="hidden" id="id_refererido">
<input type="hidden" id="optometra" value="">
<input type="hidden" id="empresa_fisc" value="">
<script type="text/javascript" src="js/cleave.js"></script>
<script type="text/javascript" src="js/productos.js"></script>
<script type="text/javascript" src="js/pacientes.js"></script>
<script type="text/javascript" src="js/ventas.js"></script>
<script type="text/javascript" src="js/bootbox.min.js"></script>
<script type="text/javascript" src="js/recibos.js"></script>
<script type="text/javascript" src="js/creditos.js"></script>
<script type="text/javascript" src="js/empresas.js"></script>


</div><!-- FIN CONTENIDO-->
</div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>

function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>


<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $(".select2").select2({
    maximumSelectionLength: 1
});
      })
</script>

<div id="empresasModal" class="modal fade" data-modal-index="2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content bg-info">
            <div class="modal-header">
              <span class="modal-title">SELECCIONAR EMPRESA</span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="background: white;color:black">
              <div class="card-body p-0" style="margin:1px">
                <table id="lista_pacientes_data_emp" width="100%" class="table-hover table-bordered">
                  <thead class="bg-secondary" style="font-family: Helvetica, Arial, sans-serif;text-align: center;font-size: 11px">
                    <tr>
                    <th>Codigo</th>          
                    <th>Nombre</th>
                    <th>Sucursal</th>
                    <th>Agregar</th>
                    </tr>
                  </thead>
                  <tbody style="text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 11px">                                  
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
</div>

   <?php } else{
echo "Acceso denegado";
  } ?>


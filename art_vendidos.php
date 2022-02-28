<?php
require_once("config/conexion.php");
if(isset($_SESSION["usuario"])){ 
require_once('header_dos.php');
?>

<div class="content-wrapper">

  <div class="content" id="articulos_vendidos">

    <div class="header" style="padding:20px;">
      <div class="row mb-2">
        <div class="col-sm-12">
          <section>
            <h5 style="text-align:center"><i class="far fa-file-alt" style="color:green"></i><strong>  REPORTE ARTICULOS VENDIDOS</strong></h5>
          </section>
        </div>
        <div class="col-sm-2">
          <form action="reporte_prod_vendidos_pdf.php" method="POST" target="_blank">
          <input type="month" id="f_inicio" name="fecha_inicio" class="form-control">
          <input type="hidden" name="sucursal_user" id="sucursal_user" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>
          <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"];?>">
        </div>

        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary"  onclick="get_productos_vendidos();"><i class="fa fa-file-pdf-o"></i>Reporte</button>
        </div>  
        </div>
      </div><!--header-->
    </div>
  </div>


<?php require_once("footer.php");?>
<input type="hidden" name="sucursal" id="sucursal" value="<?php echo $_SESSION["sucursal"];?>"/>
<input type="hidden" name="sucursal" id="sucursal_usuario" value="<?php echo $_SESSION["sucursal_usuario"];?>"/>

<script src="js/reporteria.js"></script>

<?php } else{
    echo "Acceso no permitido";
  } ?>

 

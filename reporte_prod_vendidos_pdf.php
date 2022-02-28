<?php ob_start();
use Dompdf\Dompdf; //para incluir el namespace de la librería
use Dompdf\Options;

require_once 'dompdf/autoload.inc.php';

require_once("modelos/Reportes.php");
//date_default_timezone_set('America/El_Salvador');$desde = date("d-m-Y");
//date_default_timezone_set('America/El_Salvador');$hasta = date("d-m-Y");
//$fecha_imp = date("d-m-Y H:i:s a");
$reporteria=new Reporteria();
$sucursal = $_POST["sucursal"];


if ($sucursal == "Metrocentro"  or  $sucursal == "Empresarial-Metrocentro") {
  $encabezado = "OPTICA AV PLUS S.A de C.V.";
  $direccion = "Boulevard de los Heroes. Centro Comercial Metrocentro Local#7 San Salvador";
}elseif ($sucursal == "San Miguel" or  $sucursal == "Empresarial-San Miguel") {
  $encabezado = "OPTICA AV PLUS";
  $direccion = "San Miguel, 3<sup>ra</sup> Calle Poniente Av. Roosevelt Sur Esquina #115";
}elseif ($sucursal == "Santa Ana"  or  $sucursal == "Empresarial-Santa Ana"){
    $encabezado = "OPTICA AV PLUS S.A de C.V.";
    $direccion = " 61 Calle Pte. Block K9 #10, Col, Avenida El Trebol, Santa Ana";
}

$usuario = $_POST["usuario"];
$desde = date("m-Y",strtotime($_POST["fecha_inicio"]));

$detalle_venta=$reporteria->get_datos_detalle_venta($desde);
$productos_vendidos=$reporteria->get_productos_vendidos($sucursal,$desde);
$detalle_producto=$reporteria->get_datos_producto();

var_dump($detalle_producto);exit();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
  <style>
    body{
      font-family: Helvetica, Arial, sans-serif;
      font-size: 12px;
    }
    html{
        margin-top: 10px;
        margin-left: 30px;
        margin-right:20px; 
        margin-bottom: 0px;
    }
    }
    .stilot1{
       border: 1px ridge;
       padding: 5px;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .stilot2{
       border: 1px ridge;
       text-align: center;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }
    .stilot3{
       text-align: center;
       font-size: 12px;
       font-family: Helvetica, Arial, sans-serif;
    }

    .table2 {
       border-collapse: collapse;
    }
   </style>
</head>
<body>
  <table style="width: 100%;margin-top:2px">
<tr>

<td width="10%" style="width: 10%;margin:0px"><img src="images/logooficial.jpg" width="80" height="45"/></td>
<td width="80%" style="width:75%;margin:0px;align-content:center;">
<table style="width:100%">
 <tr>
    <td style="text-align:center; font-size:16px";font-family: Helvetica, Arial, sans-serif;><strong><?php echo $encabezado; ?></strong></td>
  </tr>
  <tr>
    <td style="text-align:center; font-size:12px;font-family: Helvetica, Arial, sans-serif;"><?php echo $direccion;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="date"></span></td>
  </tr>
  <tr>
    <td  style="text-align: center;margin-top: 0px;color:#0088b6;font-size:13px;font-family: Helvetica, Arial, sans-serif;"><b>REPORTE DE ARTICULOS VENDIDOS</b></td>
  </tr>
    <tr>
    <td  style="text-align: center;margin-top: 0px;color:#0088b6;font-size:12px;font-family: Helvetica, Arial, sans-serif;"><b>Periodo comprendido:
     <?php echo $desde; ?> .</b></td>
  </tr>
</table><!--fin segunda tabla-->
</td>
<td width="10%" style="width: 30%;margin:0px">
<table>
  <tr>
  </tr>
</table>
</td> <!--fin segunda columna-->
</tr>
</table>
<table width="100%" class="table2">
    <tr>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>MARCA</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>MODELO</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>COLOR</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>MEDIDAS</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>DISEÑO</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>MATERIAL</b></th>
      <th colspan="10" style="color:black;font-size:11px;border: 1px solid #b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%" bgcolor="#c5e2f6"><b>U. VENDIDAS</b></th>
    </tr>
    <tr>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["marca"];?>
      </td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["modelo"];?></td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["color"];?></td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["medidas"];?></td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["diseno"];?></td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["materiales"];?></td>
      <td colspan="10" style="font-size:12px;border: 1px solid :#b0ddfd;font-family: Helvetica, Arial, sans-serif;width:10%;text-align: center"><?php echo $productos_vendidos[$i]["cantidad_vendidos"];?></td>   
    </tr>

  </table>
</body>
</html>

<?php
$dompdf = new Dompdf(); //crear el objeto de la clase Dompdf
       
$salida_html = ob_get_contents();

  //$user=$_SESSION["id_usuario"];

  ob_end_clean();
$dompdf = new Dompdf();
$dompdf->loadHtml($salida_html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('letter', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();
$dompdf->stream('document', array('Attachment'=>'0'));
?>

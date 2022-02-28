<?php
require_once("config/conexion.php");

class Reporteria extends Conectar{

	////////LISTA FACTURAS DATATABLE REPORTE
public function listar_facturas($sucursal){
    $conectar=parent::conexion();
    parent::set_names();
    $suc = "%".$sucursal."%";

    $sql="select cf.id_correlativo,cf.n_correlativo,cf.fecha,cf.titular,c.monto,cf.sucursal from correlativo_factura as cf inner join creditos as c on cf.n_venta=c.numero_venta where cf.sucursal like ? order by cf.id_correlativo desc;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$suc);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}
//GENERAR REPORTE DE ARTICULOS VENDIDOS
public function get_datos_detalle_venta($desde){
    $conectar= parent::conexion();
    parent::set_names();
    $fecha_inicio = $desde."%";
    $sql="select * from detalle_ventas where fecha_venta like ?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$fecha_inicio);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_datos_producto(){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="select * from productos WHERE id_producto=? and categoria_producto=?;";
    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_datos_ventas($sucursal){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="select * from ventas where sucursal=?;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$sucursal);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}

public function get_productos_vendidos($sucursal,$desde){
    $conectar= parent::conexion();
    parent::set_names();
    $fecha_inicio = $desde."%";
    $suc="%".$sucursal."%";
    $sql="sselect p.id_producto,p.marca,p.modelo,p.color,p.medidas,p.diseno,p.materiales,p.categoria,dv.fecha_venta,dv.numero_venta,v.sucursal,count(p.id_producto) as cantidad_vendidos from productos as p inner join detalle_ventas as dv on p.id_producto=dv.id_producto INNER join ventas as v on dv.numero_venta=v.numero_venta WHERE v.sucursal LIKE ? and v.fecha_venta like ? group by p.id_producto order by dv.fecha_venta DESC;";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1,$suc);
    $sql->bindValue(2,$fecha_inicio);
    $sql->execute();
    return $resultado= $sql->fetchAll(PDO::FETCH_ASSOC);
}


}//fin class
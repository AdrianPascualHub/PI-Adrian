<?php 
session_start();
include "conection.php";
if(!empty($_POST)){
$q1 = $con->query("insert into cart(client_email,created_at) value(\"$_POST[email]\",NOW())");
if($q1){
$cart_id = $con->insert_id;
foreach($_SESSION["cart"] as $c){
$q1 = $con->query("insert into cart_product(productos_id,q,cart_id) value($c[productos_id],$c[q],$cart_id)");
}
unset($_SESSION["cart"]);
}
}
print "<script>alert('Venta procesada exitosamente');window.location='../../productos.php';</script>";
?>
<?php
/*
*CONECTAR CON LA BDD Y EVITAR WARNINGS
*/
error_reporting(0);
session_start();
include "Carrito/php/conection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/carrito.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Este es tu carrito</h1>
			<a href="./productos.php" class="btn btn-warning">Volver a la tienda</a>		
			<br><br>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$tienda = $con->query("select * from productos");
if(isset($_SESSION["cart"]) && !empty($_SESSION["cart"])):
?>
<table class="table table-bordered">
<thead>
<th>Cantidad</th>
	<th>Nombre del Producto</th>
	<th>Descripcion</th>	
	<th>Precio</th>
	<th>Fecha</th>	
	<th></th>
</thead>
<?php 
/*
* Apartir de aqui hacemos el recorrido de los productos obtenidos y los reflejamos en una tabla.
*/
foreach($_SESSION["cart"] as $c):
$tienda = $con->query("select * from productos where id=$c[productos_id]");
$r = $tienda->fetch_object();
	?>
<tr>
<th><?php echo $c["q"];?></th>	
	<td><?php echo $r->name;?></td>
	<td><?php echo $r->descripcion; ?></td>		
	<td><?php echo $c["q"]*$r->price; ?></td>	
	<td><?php $fechaActual = date("d-m-Y"); echo $fechaActual;?></td>
	<td style="width:60px;">
	<?php
	$found = false;
	foreach ($_SESSION["cart"] as $c) { if($c["productos_id"]==$r->id){ $found=true; break; }}
	?>
		<a href="Carrito/php/eliminarCarrito.php?id=<?php echo $c["productos_id"];?>" class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php endforeach; ?>
</table>

<br>
<form class="form-horizontal" method="post" action="./Carrito/php/procesarCarrito.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email del cliente</label>
    <div class="col-sm-5">
      <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email del cliente">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<br>
      <button type="submit" class="btn btn-primary">Procesar Venta</button>
    </div>
  </div>
</form>


<?php else:?>
	<p class="alert alert-warning">El carrito esta vacio.</p>
<?php endif;?>

		</div>
	</div>
</div>
</body>
</html>
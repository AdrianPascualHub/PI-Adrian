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
	<title>Tienda</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/productos.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>La Tienda</h1>															
			<div align="center"><img src="../img/zoo.jpg" alt="zoo" class="zoo"></div>
<?php
/*
* Esta es la consula para obtener todos los productos de la base de datos.
*/
$tienda = $con->query("select * from productos");
?>
<div class="container">
	
	<p class="texto">Bienvenido a nuestra tienda, aqui encontrarás distintos productos relacionados con nuestro Zoologico.</p>
	<p class="texto">Y recuerda, comprando en nuestra tienda contribuyes al bienestar de los animales, no solo en nuestro zoo, si no a nivel global.</p>
	<div class="row">
				<?php while($r=$tienda->fetch_object()): ?>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?php echo $r->name; ?></h5>
							<p class="card-text"><?php echo $r->descripcion; ?></p>
							<p class="card-price"><?php echo $r->price; ?>€</p>
							<?php
							$found = false;
							if(isset($_SESSION["cart"])) {
								foreach ($_SESSION["cart"] as $c) {
									if($c["productos_id"]==$r->id) {
										$found=true;
										break;
									}
								}
							}
							?>
							<?php if($found): ?>
								<a href="carrito.php" class="btn btn-info">Agregado</a>
							<?php else: ?>
								<form class="form-inline" method="post" action="./Carrito/php/addCarrito.php">
									<input type="hidden" name="productos_id" value="<?php echo $r->id; ?>">
									<div class="form-group">
										<input type="number" name="q" value="1" style="width:100px;" min="1" class="form-control" placeholder="Cantidad">
									</div>
									<button type="submit" class="btn btn-primary">Agregar al carrito</button>
								</form>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>	
</div>
<a href="./carrito.php" class="btn btn-warning">Ver Carrito</a>
<a href="../html/inicio.html" class="btn btn-warning">Volver a la WEB</a>
</body>
</html>
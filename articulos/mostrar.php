<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<style>
        body {
            background-image: url('img/buap-fondo.jpg');
            background-size: cover; /* Para que la imagen se ajuste al tamaño del cuerpo */
            background-repeat: no-repeat; /* Para que la imagen no se repita */
        }
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col-9"></div>
					<div class="col-3">
						<button type="button" class="btn btn-primary mt-3" onclick="location.href='insertar.php'" style="position: relative; left: 82%; top:-20%;">
							<img src="img/plus.svg" alt="">
						</button>
					</div>
				</div>
				<?php
					include "sql.php";
					include "articulo.php";
					
					$a = new articulo;
					echo $a->table();
				?>
			</div>
		</div>
	</div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
	<script>
		function actualizar(id){
			location.href = "actualizar.php?id=" + id + "&r=" + Math.random();
		}
		function eliminar(id){
			location.href = "eliminar.php?id=" + id + "&r=" + Math.random();
		}
	</script>
</body>

</html>
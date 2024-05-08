<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
	<style>
        body {
            background-image: url('img/fondoSecundario.jpg');
            background-size: cover; /* Para que la imagen se ajuste al tamaño del cuerpo */
            background-repeat: no-repeat; /* Para que la imagen no se repita */
        }
	</style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <img src="img/fondoSecundarioLogo.png" alt="" style="width:20%">
            </div>
            <div class="col-3 text-center">
                <button type="button" class="btn btn-primary mt-3" onclick="location.href='mostrar.php'">
                    <img src="img/arrow-left.svg" alt="">
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
            </div>
            <div class="col-12 col-sm-4 mt-3">
                <div class="mb-3">
                    <label for="id" class="form-label text-white" >ID:</label>
                    <input type="text" class="form-control" id="id">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label text-white">Nombre:</label>
                    <input type="text" class="form-control" id="nom">
                </div>
                <div class="mb-3">
                    <label for="costo" class="form-label text-white">Costo:</label>
                    <input type="text" class="form-control" id="costo">
                </div>
                <div class="d-grid">
                    <button type="button" class="btn btn-primary" id="button1">Crear</button>
                </div>
            </div>
            <div class="col-12 col-sm-4">
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modalInsert">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="insertText"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Se subio el producto correctamente</button>
                   
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        (function() {
            $("#button1").click(function() {
                var id = $("#id").val();
                var nom = $("#nom").val();
                var costo = $("#costo").val();

                var error = "";

                if (id == "") {
                    error += "falta el ID<br>";
                }
                if (nom == "") {
                    error += "falta el Nombre<br>";
                }
                if (costo == "") {
                    error += "falta el Costo<br>";
                }

                if (error == "") {
                    var dir = "procesos.php?tipo=1&id=" + id + "&nom=" + nom + "&costo=" + costo + "&r=" + Math.random();
                    
                    $.get(dir, function(result) {
                        alert(result);
						//$("#id").val("");
						//$("#nom").val("");
						//$("#costo").val("");
                    });
                } 
                else 
                {
                    $("#insertText").html(error);
                    $("#modalInsert").modal("show");
                }
            });
        })();
    </script>
</body>

</html>
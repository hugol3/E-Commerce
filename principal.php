<?php
    session_start();
    if(isset($_SESSION["roll"]))
    {
        $roll = $_SESSION["roll"];
    }
    else
    {
        header ("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <title>Principal</title>
    <style>
    .table-responsive {
        font-size: 15px;
    }

    .tableFixHead thead th {
        background: rgb(65 84 122);
        text-align: center;
        color: #fff;
    }

    .invalid {
        border: 1px solid #ed5565;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center">Clientes</h2>
        <div class="row">


            <div class="gap-3 d-md-flex justify-content-md-end mb-3">
                 <button type="button" class="btn btn-primary btn-block" id="agregar" onclick="agregar()"> <i class="fa fa-plus"
                 aria-hidden="true"></i> Agregar</button>
                 <a href="salir.php" class="btn btn-danger" title="Cerrar Sesión">
                    <i class="fa fa-sign-out" aria-hidden="true" style="font-size:20px"></i> Salir
                </a>      
    </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div id="msg" class="alert alert-danger alert-dismissible fade show" role="alert"
                style="text-align: center; margin-top:5px; display:none;">
                <strong>Correo ya registrado</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="table-responsive tableFixHead" style="margin-top: 10px;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Domicilio
                            </th>
                            <th>
                                Correo
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal" id="Modalresul">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Registro</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="font-weight-bold text-small">
                                Nombre
                            </label>
                            <input type="text" class="form-control" id="nombre" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="font-weight-bold text-small">
                                Apellido
                            </label>
                            <input type="text" class="form-control" id="apellido" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="font-weight-bold text-small">
                                Domicilio
                            </label>
                            <input type="text" class="form-control" id="domicilio" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="font-weight-bold text-small">
                                Correo
                            </label>
                            <input type="email" class="form-control" id="correo" required>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="agrega" onclick="crearcliente()">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="Modaledit">

    </div>

    <div class="modal" id="Modalelim">

    </div>


    </div>

    <footer>

    </footer>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    var cont = 1;
    $(document).ready(function() {
        load();
    });

    function load() {
        $.ajax({
            type: 'POST',
            url: 'datos.php',
            data: {
                tipo: 1,
            },
            success: function(result) {
                $("#table").html(result);
            }
        });
    }

    function optionalTextValidation(id) {
        let element = document.getElementById(id);
        let cleanValue = "";
        if (removeSpecialCharacter(element.value) != "") {
            cleanValue = removeSpecialCharacter(element.value);
            element.classList.remove("invalid");
        } else {
            element.classList.add("invalid");
        }
        return cleanValue;
    }

    function removeSpecialCharacter(element) {
        let specialCharacter = /#/g;
        return this.removeBlankSpaces(element.replace(specialCharacter, ""));
    }

    function removeBlankSpaces(element) {
        return element.trim();
    }



    function agregar() {
        $("#Modalresul").modal('show');
    }

    function crearcliente() {
        var nombre = optionalTextValidation('nombre');
        var apellido = optionalTextValidation('apellido');
        var domicilio = optionalTextValidation('domicilio');
        var correo = optionalTextValidation('correo');

        if (nombre != "" && apellido != "" && domicilio != "" && correo != "") {
            $.ajax({
                type: 'POST',
                url: 'datos.php',
                data: {
                    tipo: 2,
                    nombre: nombre,
                    apellido: apellido,
                    domicilio: domicilio,
                    correo: correo
                },
                success: function(result) {
                    if (result == 1) {
                        load();
                        limpiar();
                        $("#Modalresul").modal('hide');
                        $("#msg").css('display', 'none');
                    } else {
                        $("#msg").css('display', 'block');
                        $("#Modalresul").modal('hide');
                        limpiar();
                    }
                }
            });
        }
    }

    function limpiar() {
        $('#nombre').val("");
        $('#apellido').val("");
        $('#domicilio').val("");
        $('#correo').val("");
    }


    function editarcliente(id) {
        var nombre = optionalTextValidation('nombre2');
        var apellido = optionalTextValidation('apellido2');
        var domicilio = optionalTextValidation('domicilio2');
        var correo = optionalTextValidation('correo2');

        if (nombre != "" && apellido != "" && domicilio != "" && correo != "") {
            $.ajax({
                type: 'POST',
                url: 'datos.php',
                data: {
                    tipo: 3,
                    id: id,
                    nombre: nombre,
                    apellido: apellido,
                    domicilio: domicilio,
                    correo: correo
                },
                success: function(result) {
                    load();
                    $("#Modaledit").modal('hide');
                }
            });
        }
    }

    function eliminarcliente(id) {
        $.ajax({
            type: 'POST',
            url: 'datos.php',
            data: {
                tipo: 4,
                id: id
            },
            success: function(result) {
                $("#table").html(result);
            }
        });
    }

    function modalelim(id) {
        $.ajax({
            type: 'POST',
            url: 'modal_elimi.php',
            data: {
                id: id,
            },
            success: function(result) {
                $("#Modalelim").html(result);
                $('#Modalelim').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $("#Modalelim").modal('show');
            }
        });
    }

    function modaledit(id) {
        $.ajax({
            type: 'POST',
            url: 'modal_edit.php',
            data: {
                id: id,
            },
            success: function(result) {
                $("#Modaledit").html(result);
                $('#Modaledit').modal({
                    backdrop: 'static',
                    keyboard: false
                });
                $("#Modaledit").modal('show');
            }
        });
    }
    </script>
</body>

</html>
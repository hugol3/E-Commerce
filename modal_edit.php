<?php
    include 'class/sql.php';
    $conex = new sql();

    $id = isset($_POST['id'])?$_POST['id']:'';

    $sql="SELECT * FROM clientes WHERE id = '$id'";
    
    $result =  $conex->execute($sql);
    while($row = sqlsrv_fetch_object($result))
    {
        $nombre = $row->nombre;
        $apellido = $row->apellido;
        $domicilio = $row->domicilio;
        $correo = $row->correo;
    }
    
     echo '<div class="modal-dialog">
                     <div class="modal-content">
                         <!-- Modal Header -->
                         <div class="modal-header">
                             <h4 class="modal-title">Editar Registro</h4>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"></button>
                         </div>
     
                         <!-- Modal body -->
                         <div class="modal-body">
                            <div class="row">
                             <div class="form-group col-lg-6">
                            <label class="font-weight-bold text-small">
                                Nombre
                            </label>
                            <input type="text" class="form-control" id="nombre2" value="'.$nombre.'" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="font-weight-bold text-small">
                                Apellido
                            </label>
                            <input type="text" class="form-control" id="apellido2" value="'.$apellido.'" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="font-weight-bold text-small">
                                Domicilio
                            </label>
                            <input type="text" class="form-control" id="domicilio2" value="'.$domicilio.'" required>
                        </div>
                        <div class="form-group col-lg-12">
                            <label class="font-weight-bold text-small">
                                Correo
                            </label>
                            <input type="email" class="form-control" id="correo2"  value="'.$correo.'" required>
                        </div>
                            </div>

                         </div>
     
                         <!-- Modal footer -->
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">Cerrar</button>
                             <a type="button" class="btn btn-primary" id="editar" onclick="editarcliente('.$id.')">Editar</a>
                         </div>
                     </div>
                 </div>';
?>
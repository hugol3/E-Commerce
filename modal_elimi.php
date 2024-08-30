<?php
    $id = isset($_POST['id'])?$_POST['id']:'';

    
     echo '<div class="modal-dialog">
                     <div class="modal-content">
                         <!-- Modal Header -->
                         <div class="modal-header">
                             <h4 class="modal-title">Eliminar Registro</h4>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" id="close"></button>
                         </div>
     
                         <!-- Modal body -->
                         <div class="modal-body">
                           <h3>¿Esta seguro de eliminar el cliente?</h3>
                         </div>
                         <!-- Modal footer -->
                         <div class="modal-footer">
                             <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close">No</button>
                             <a type="button" class="btn btn-primary" id="editar" onclick="eliminarcliente('.$id.')">Si</a>
                         </div>
                     </div>
                 </div>';
?>
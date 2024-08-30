<?php
    include("class/sql.php");
    include("class/clientes.php");

    $tipo = isset($_POST['tipo'])?$_POST['tipo']:'';

    $cli = new clientes();
    
    if($tipo == 1)
    {
       echo $cli->tabla();
    }
    else if($tipo == 2)
    {
        $nom = isset($_POST['nombre'])?$_POST['nombre']:'';
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:'';
        $domicilio = isset($_POST['domicilio'])?$_POST['domicilio']:'';
        $correo = isset($_POST['correo'])?$_POST['correo']:'';

        echo $cli->nuevoCliente($nom,$apellido,$domicilio,$correo);
    }
    else if($tipo == 3)
    {
        $id = isset($_POST['id'])?$_POST['id']:'';
        $nom = isset($_POST['nombre'])?$_POST['nombre']:'';
        $apellido = isset($_POST['apellido'])?$_POST['apellido']:'';
        $domicilio = isset($_POST['domicilio'])?$_POST['domicilio']:'';
        $correo = isset($_POST['correo'])?$_POST['correo']:'';
        
       $cli->editarCliente($id,$nom,$apellido,$domicilio,$correo);

    }
    else if($tipo == 4)
    {
        $id = isset($_POST['id'])?$_POST['id']:'';
        $cli->eliminarCliente($id);
        echo $cli->tabla();
    }
?>
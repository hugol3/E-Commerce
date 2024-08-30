<?php
 
    class clientes
    {
        public $sql;

        public function __construct()
        {
            $this->sql = new sql();
        }

        public function tabla()
        {
            $query =  "SELECT *FROM clientes WHERE estatus = 1";
            $result = $this->sql->execute($query);
            $cadena = '';
            while ($row = sqlsrv_fetch_object($result))
            {
                $cadena.='<tr>
                            <td>'.$row->id.'</td>
                            <td>'.$row->nombre.' '.$row->apellido.'</td>
                            <td>'.$row->domicilio.'</td>
                            <td>'.$row->correo.'</td>
                            <td>
                                <a type="buton" class="btn btn-success" id="edit" ><i class="fa fa-pencil" onclick="modaledit('.$row->id.')"></i></a>
                                <a type="buton" class="btn btn-danger" id="del" onclick="modalelim('.$row->id.')"><i class="fa fa-trash"></i></a>
                            </td>
                </tr>';

            }
            return $cadena;
        }

        public function nuevoCliente($nom,$apellido,$domicilio,$correo)
        {
            $id = $this->consultarRegistros();
            $ban = $this-> consultarCliente($correo);
            $verifica = 0;
            if($ban == 0)
            {
                $sql = "INSERT INTO clientes (id,nombre,apellido,domicilio,correo,estatus) VALUES('" . $id . "', '". $nom . "', '" . $apellido . "', '".$domicilio."', '".$correo."', '1' )";
                $result =$this->sql->execute($sql);
                $verifica = 1;
            }

            return $verifica;
            
        }

        public function eliminarCliente($id)
        {
            $sql = "UPDATE clientes SET estatus = '0' where id = $id";
            $result =$this->sql->execute($sql);
        }

        public function consultarCliente($correo)
        {
            $sql = "SELECT id FROM clientes WHERE correo = '$correo'";
            $result =$this->sql->execute($sql);
            $id=0;
            while ($row = sqlsrv_fetch_object($result))
            {
                $id = $row->id;
            }

            return $id;
        }

        public function consultarRegistros()
        {
            $sql = "SELECT MAX(id) ultimo FROM clientes";
            $top = 0;
            $result =$this->sql->execute($sql);
            while($row = sqlsrv_fetch_object($result))
            {
                $top = $row->ultimo;
            }
            $top++;
    
            return $top;
        }

        public function editarCliente($id,$nom,$apellido,$domicilio,$correo)
        {
            $sql = "UPDATE clientes SET nombre = '$nom', apellido = '$apellido', domicilio='$domicilio', correo='$correo' where id = $id";
            $result =$this->sql->execute($sql);
        }
    }
?>
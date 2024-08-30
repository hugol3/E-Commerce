<?php
  include("class/sql.php");
  $cadena = isset($_POST['user'])?$_POST['user']:'';
  $pass = isset($_POST['pass'])?$_POST['pass']:'';
  $conex = new sql();
  session_start(); 
  $ban = 0;
  
  if( $cadena != '' && $pass != '')
  {
      $sql = "SELECT * FROM acceso WHERE usuario = '".$cadena."' AND pass = '".$pass."' ";
      $res =  $conex->execute($sql);
      while($row = sqlsrv_fetch_object($res))
      {
        if($row->estatus == 1)
        {
            $_SESSION["roll"] = $row->roll;
            $_SESSION["nom"] = $row->nom;
            header ("Location:principal.php?rand=".rand());  
        }
        else
        {
          header ("Location:index.php?error=si");
        }
        $ban = 1;
      }       
  }
  else
  {
    header ("Location:index.php?error=si");
  }

  if($ban == 0)
  {
    header ("Location:index.php?error=si");
  }
?>
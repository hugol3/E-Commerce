<?php
    class sql
    {
        public $sql1;

        public function __construct()
        {
            $dbuser= 'sa';
            $dbpass = '123456qwerty.';
            $dbhost = 'localhost';
            $basedatos = 'prueba';
		
            $info = array('Database'=>$basedatos, 'UID'=>$dbuser, 'PWD'=>$dbpass,"CharacterSet"=>"UTF-8");
            $this->sql1 = sqlsrv_connect($dbhost, $info);
        }

        public function select($sql)
        {
            //echo "<br> sql: " .$sql ."<br>";
            $result = sqlsrv_query($this->sql1, $sql);
            return $result;
        }

        public function execute($sql)
        {
            //echo $sql;
            $result = sqlsrv_query($this->sql1, $sql);
            return $result;
        }

        public function close()
        {
            return 0;
        }
    }
?>
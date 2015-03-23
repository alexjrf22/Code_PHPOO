<?php

namespace Alex\Config;

use PDO;

   class ConfigConexao extends PDO 
   {
       
	private $dsn = 'mysql:dbname=projeto_oo;host=localhost';
	private $usuario = 'root';
	private $senha = '';
	public  $conexao = null;

	function __construct() 
        {
		try
                {
                    if ( $this->conexao == null )
                    {
                        $db = parent::__construct( $this->dsn , $this->usuario , $this->senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8') );
                        $this->conexao = $db;
                        return $this->conexao;
                    }
		}
		catch ( PDOException $e )
                {
                    echo 'Conexão falhou: ' . $e->getMessage( );
                    return false;
		}
	}

	function __destruct()
        {
		$this->conexao = null;
	}

    }


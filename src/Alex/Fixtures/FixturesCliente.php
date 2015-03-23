<?php

namespace Alex\Fixtures;

class FixturesCliente 
{
    
    public function __construct(\Alex\Config\ConfigConexao $conexao)
    {
        $this->conexao = $conexao; 
    }
    
    public function persist(\Alex\Cliente\Cliente $cliente)
    {
        $this->cliente = $cliente; 
    }
    
    public function flush(\Alex\Config\ConfigConexao $conexao)
    {      

        require_once 'objs_cli.php';
        
        echo "#### Executando Fixture ####\n";

        echo "Removendo Tabela";

        $conexao->query("DROP TABLE IF EXISTS clientes");
        echo " - OK\n";

        echo "Criando tabela";
        $conexao->query
        (
                "CREATE TABLE clientes("
               ."id int(11) NOT NULL AUTO_INCREMENT,"
               ."nome varchar(255) NOT NULL,"
               ."tipo varchar(50) NOT NULL,"
               ."cpf varchar(14) DEFAULT NULL,"
               ."cnpj varchar(18) DEFAULT NULL,"
               ."data_nas date DEFAULT NULL,"
               ."endereco varchar(255) DEFAULT NULL,"
               ."estrelas int(1) DEFAULT NULL,"
               ."PRIMARY KEY (id));"
        );
        
         echo " - OK\n";
         echo "Inserindo Dados"; 
        
        foreach ($arrayClientes as $key => $value)
        {
            $nome     = $value['nome'];
            $tipo     = $value['tipo'];
            $cpf      = $value['cpf'];
            $cnpj     = $value['cnpj'];
            $data_nas = $value['data_nas'];
            $endereco = $value['endereco'];
            $estrelas = $value['estrelas'];
            
            $query = "insert clientes (nome, tipo, cpf, cnpj, data_nas, endereco, estrelas)"
                . "values ('$nome', '$tipo', '$cpf', '$cnpj', '$data_nas', '$endereco', '$estrelas')";
            
            try
            {             
              $stmt = $conexao->prepare($query);
              $stmt->execute(); 
           
            } 
            catch (\Exception $e)
            {
                $e->getMessage();
            }
            
        }
      
          echo " - OK\n";
          echo "#### Concluído ####\n";    
    }
        
}


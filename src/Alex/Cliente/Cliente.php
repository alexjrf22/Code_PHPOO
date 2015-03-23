<?php

namespace Alex\Cliente;
use Alex\Config\ConfigConexao;
use Alex\Interfaces\InterfacesCliente;

class Cliente implements InterfacesCliente
{

        public function listar(ConfigConexao $conexao)
        {
            $query = "select * from clientes";
            
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            
            $lista = $stmt->fetchAll(\PDO::FETCH_ASSOC);  
            return $lista;
            
        }
        
        public function classificacao($estrelas)
        {
            $classificacao = $estrelas;
            
            for( $x = 0; $x < $classificacao; $x ++ )
            {
                echo "<i class='icon-star'></i>";
            }
            
        }
             
}


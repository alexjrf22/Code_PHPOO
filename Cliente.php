<?php

require_once './interfaces/InterfaceClientes.php';

class Cliente implements InterfaceClientes
{
        private $nome;
        private $cpf;
        private $tipo;
        private $cnpj;
        private $endereco;
        private $data_nas;
        private $classificacao;
        
        public function getClassificacao()
        {
            return $this->classificacao;
        }

        public function setClassificacao($classificacao)
        {
            $this->classificacao = $classificacao;
            return $this;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        public function setTipo($tipo)
        {
            $this->tipo = $tipo;
            return $this;
        }
        
        public function getCnpj()
        {
            return $this->cnpj;
        }

        public function setCnpj($cnpj)
        {
            $this->cnpj = $cnpj;
            return $this;
        }

        public function getNome()
        {     
            return $this->nome;            
        }

        public function getCpf()
        {
            return $this->cpf;
        }

        public function getEndereco() 
        {
            return $this->endereco;
        }   

        public function getDataNas()
        {
            return $this->data_nas;
        }

        public function setNome($nome)
        {
            $this->nome = $nome;
            return $this;
        }

        public function setCpf($cpf)
        {
            $this->cpf = $cpf;
            return $this;
        }

        public function setEndereco($endereco) 
        {
            $this->endereco = $endereco;
            return $this;
        }

        public function setDataNas($data_nas) 
        {
            $this->data_nas = $data_nas;
            return $this;
        }
        
        public function ClassificarCliente($classificacao)
        {
            $y = $classificacao;
            
            for($x=0; $x<$y; $x++)
            {
                echo "<i class='icon-star'></i>";
            }
            
        }


        
}


<?php

class Cliente
{
        public $nome;
        public $cpf;
        public $endereco;
        public $data_nas;
       
        function getNome()
        {     
            return $this->nome;            
        }

        function getCpf()
        {
            return $this->cpf;
        }

        function getEndereco() 
        {
            return $this->endereco;
        }

        function getData_nas()
        {
            return $this->data_nas;
        }

        function setNome($nome)
        {
            $this->nome = $nome;
            return $this;
        }

        function setCpf($cpf)
        {
            $this->cpf = $cpf;
            return $this;
        }

        function setEndereco($endereco) 
        {
            $this->endereco = $endereco;
            return $this;
        }

        function setData_nas($data_nas) 
        {
            $this->data_nas = $data_nas;
            return $this;
        }


        
}


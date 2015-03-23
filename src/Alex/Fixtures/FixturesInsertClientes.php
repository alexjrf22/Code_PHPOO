<?php

require_once 'ConfigConexao.php';
require_once 'FixturesCliente.php';

$conexao = new Alex\Config\ConfigConexao();

$inserirClientes = new Alex\Fixtures\FixturesCliente($conexao);

$inserirClientes->flush($conexao);



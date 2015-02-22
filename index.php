<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Clientes</title>
        <link href="app/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    </head>
    <body>
        
        <h1>Lista de Clientes</h1>  
        
        <?php
           
            ini_set("display_errors", true);
            error_reporting(E_ALL);
            
            $arrayClientes = array();
            
            require_once 'objs_cli.php';
            
              
        ?>
            
            
            
                <div class="tabbable tabs-left"> 
                    
                    <ul class="nav nav-tabs">
                        
                        <?php 
                        
                        $tab1 = 0;
            
                        foreach ($arrayClientes as $cliente):

                        $tab1++;
                        $nome = $cliente->nome;
                        
                        ?>
                        
                        <li><a href="<?php echo '#tab' . $tab1; ?>" data-toggle="tab"><?php echo $nome ?></a></li>
                        
                         <?php endforeach;  ?>  
                        
                    </ul>
                    
             
                    
                    <div class="tab-content">
                        <?php
                        
                         $tab = 0;
                         
                         foreach ($arrayClientes as $cliente):
                
                            $tab++;
                            $nome = $cliente->nome;
                            $cpf = $cliente->cpf;
                            $data_nas = $cliente->data_nas;
                            $endereco = $cliente->endereco;
                            
                        ?>
                        
                        <div class="tab-pane" id="<?php echo 'tab' . $tab; ?>">
                            <p><b>Nome do Cliente:</b> <?php echo $nome; ?></p>
                            <p><b>Cpf do Cliente:</b> <?php echo $cpf; ?></p>
                            <p><b>Data de Nascimento do Cliente:</b> <?php echo $data_nas; ?></p>
                            <p><b>Endereço do Cliente:</b> <?php echo $endereco; ?></p>
                        </div>
                        
                         <?php endforeach; ?>
                        
                    </div>
                    
                </div>
            
 
        <script src="app/js/jquery.js" type="text/javascript"></script>
        <script src="app/js/bootstrap.js" type="text/javascript"></script>
        
    </body>
</html>

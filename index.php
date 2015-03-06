<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista Clientes</title>

        <link href="app/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
        <link href="app/css/estilo.css" rel="stylesheet" type="text/css" media="all">

    </head>
    <body>
        
        <h1>Lista de Clientes</h1>  
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="form">
            
            <select name="ordenar">
                <option value="">Ordenar Valores</option>
                <option value="desc">Maior Para Menor</option>
                <option value="asc">Menor Para Maior</option>
            </select>
            
            <input name="enviar" value="Ordenar" type="submit" class="btn btn-primary">
            
        </form>    
        
        <?php
           
            ini_set("display_errors", true);
            error_reporting(E_ALL);
            
            $arrayClientes = array();
            
            require_once 'objs_cli.php';
            require_once './Cliente.php';
            
            $obj = new Cliente();
            
            if(isset($_POST['enviar']))
            {
                $ordenar = $_POST['ordenar'];
                
                if(!empty($ordenar))
                {    
                    ($ordenar=='desc') ? rsort($arrayClientes):  sort($arrayClientes);
                }
            }
            
        ?>
            
       
            
                <div class="tabbable tabs-left"> 
                    
                    <ul class="nav nav-tabs">
                        
                        <?php 
                                              
                        $tab1 = 0;
                        
                        if (isset($arrayClientes)):
                            
                            foreach ($arrayClientes as $cliente):

                        $tab1++;
                        $nome = $cliente->getNome();
                        
                        ?>
                        
                        <li><a href="<?php echo '#tab' . $tab1; ?>" data-toggle="tab"><?php echo $nome ?></a></li>
                        
                         <?php 
                            endforeach; 
                            endif;
                         ?>  
                        
                    </ul>
                    
             
                    
                    <div class="tab-content">
                        <?php
                        
                         $tab = 0;
                         
                         foreach ($arrayClientes as $cliente):
                
                            $tab++;
                            $nome = $cliente->getNome();
                            $tipo = $cliente->getTipo();
                            $cpf = $cliente->getCpf();
                            $cnpj = $cliente->getCnpj();
                            $data_nas = $cliente->getDataNas();
                            $endereco = $cliente->getEndereco();
                            $classificacao = $cliente->getClassificacao();
                            
                        ?>
                        
                        <div class="tab-pane" id="<?php echo 'tab' . $tab; ?>">
                            <p><b>Nome do Cliente:</b> <?php echo $nome; ?></p>
                            <p><b>Tipo do Cliente:</b> <?php echo $tipo; ?></p>  
                            <?php echo ($tipo == "Pessoa Fisica") ? "<p><b>CPF do Cliente:</b> " .$cpf : "<p><b>CNPJ do Cliente:</b> ". $cnpj; ?></p>
                            <p><b>Data de Nascimento do Cliente:</b> <?php echo $data_nas; ?></p>
                            <p><b>Endereço do Cliente:</b> <?php echo $endereco; ?></p>
                            <p><b>Cliente </b> <?php $cliente->ClassificarCliente($classificacao); ?></p>
                        </div>
                        
                         <?php endforeach; ?>
                        
                    </div>
                    
                </div>
            
 
        <script src="app/js/jquery.js" type="text/javascript"></script>
        <script src="app/js/bootstrap.js" type="text/javascript"></script>
        
    </body>
</html>

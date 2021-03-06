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
                                
            define("CLASS_DIR", "src" . DIRECTORY_SEPARATOR);
    
            spl_autoload_register(function($class) {
            $className = CLASS_DIR . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
            include($className);});
            
            use Alex\Cliente\Cliente;
            use Alex\Config\ConfigConexao;
            use Alex\Config\ConfigData;
            
            $objCli = new Cliente();
            $conexao = new ConfigConexao();
            $objData = new ConfigData();
            
            $arrayClientes = $objCli->listar($conexao);
            
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
                       
                        if (isset($arrayClientes)):
                            
                            foreach ($arrayClientes as $key => $cliente):

                        ?>
                        
                        <li><a href="<?php echo '#tab' . $key; ?>" data-toggle="tab"><?php echo $cliente['nome']; ?></a></li>
                        
                         <?php 
                            endforeach; 
                            endif;
                         ?>  
                        
                    </ul>
                                    
                    <div class="tab-content">
                        <?php
                          foreach ($arrayClientes as $key => $cliente):
                        ?>
                            <div class="tab-pane" id="<?php echo 'tab' . $key; ?>">
                              <p><b>Nome:</b> <?php echo $cliente['nome']; ?></p>
                              <p><b>Tipo:</b> <?php echo $cliente['tipo']; ?></p>
                              <?php echo ($cliente['tipo'] == "Pessoa Fisica") ? "<p><b>CPF:</b> " .$cliente['cpf'] : "<p><b>CNPJ:</b> ". $cliente['cnpj']; ?></p>
                            <p><b>Data de Nascimento:</b> <?php echo $objData->DataParaBR($cliente['data_nas']); ?></p>
                              <p><b>Endereço:</b> <?php echo $cliente['endereco']; ?></p>
                              <p><b>Cliente </b> <?php $objCli->Classificacao($cliente['estrelas']); ?></p>
                            </div>
                        <?php endforeach; ?>
  
                   </div>
                    
               </div>
 
        <script src="app/js/jquery.js" type="text/javascript"></script>
        <script src="app/js/bootstrap.js" type="text/javascript"></script>
                  

    </body>
</html>

<?php

    //A variavel controller será enviada pela view do projeto
    //NEla iremos identificar qual será a controller que precisará ser
    // instanciada(Geralmente será enviada pelo form ou açoes de editar ou excluir da consulta )
    $controller = $_GET['controller'];

    //Verifica qual a controller será instanciada
    switch ($controller){
        case "contatos":
            //A variavel modo identifica qual o método da controller 
            //Que iremos chamar (inserir, editar, consulta, excluir , etc)
            $modo = $_GET['modo'];

            // Import da classe controllerContatos
            require_once("controller/controllerContatos.php");
            switch ($modo){
                case "inserir":
                    //Instancia da classe ControllerContato
                    $controllerContatos = new controllerContato();
                    //Chamada para o método de inserir um novo contato
                    $controllerContatos::inserirContato();
                break;
                case 'editar':

                break;
                case 'buscar':
                    $controllerContatos = new controllerContato();
                    //Recebe o id do registro enviado pela view por url
                    $id = $_GET['id'];           
                    
                    //Chamar o metodo excluir da controller e enviar o id
                    $listContato = $controllerContatos::buscarContato($id);

                    require_once('index.php');


                break;

                case 'excluir':

                    $controllerContatos = new controllerContato();
                    //Recebe o id do registro enviado pela view por url
                    $id = $_GET['id'];           
                    
                    //Chamar o metodo excluir da controller e enviar o id
                    $controllerContatos::excluirContato($id);
                break;

            }
        break;

    }


?>
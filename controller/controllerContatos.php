<?php
/*
    Projeto: Exercicio usando MVC
    Autor: Marcel 
    Data: 29/08/2018
    Objetivo: Controlar as ações do formulário de contatos

    Editado por: 
    Data  da alteração:
    Conteudo alterado:

*/
class controllerContato{
    
    
    //Construtor
    public function __construct(){
        require_once("model/contatoClass.php");
    }
    //Inserir Novo Contato
    public function inserirContato(){
       //Verifica se os dados  estão sendo enviados via POST pelo formulário
        if($_SERVER['REQUEST_METHOD']=='POST'){

            //Resgata os dados enviados pelo formulário
           $nome = $_POST['txtnome'];
           $email = $_POST['txtemail'];
           $telefone = $_POST['txttelefone'];
           $celular = $_POST['txtcelular'];
           $email = $_POST['txtemail'];

           $dt_nasc = $_POST['txtdatanasc'];//Data em padrão brasileiro
           $dt = explode("/",$dt_nasc); //Função explode para formatar
           $dt_nascimento = $dt[2]."-".$dt[1]."-".$dt[0];//Data no padrão correto

           $sexo = $_POST['rdosexo'];
           $obs = $_POST['txtobs'];

           //Instancia da Classe Contato na Model
           $contatoClass = new Contato();

           //Guarda os dados retirados do POST  do FORM nos atributos da classe contato
           $contatoClass->nome = $nome;
           $contatoClass->telefone = $telefone;
           $contatoClass->celular = $celular;
           $contatoClass->email = $email;
           $contatoClass->sexo = $sexo;
           $contatoClass->dt_nasc = $dt_nascimento;
           $contatoClass->obs = $obs;

           $contatoClass::Insert($contatoClass);

           
       }
    }

    //Atualizar Contato existente
    public function atualizarContato(){

    }

    //Busca o contato existente
    public function buscarContato($id){
        $contatoClass = new Contato();
        $list = $contatoClass::SelectById($id);

        return $list;
    }

    //Excluir contato
    public function excluirContato($id){
        //Instancia da model contatos
        $contatoClass = new Contato();
        //chama o metódo  delete da classe contato
        $contatoClass::Delete($id);
    }

    //Listar todos os contatos registrados
    public function listarContato(){

        //Instancia  da model Contatos
        $contatoClass = new Contato();

        //Chama o método para selecionar todos os registros
        $listContatos = $contatoClass::selectAll();

        //Retorna o resultado obtido para a view
        return $listContatos;

    }

    

}

?>
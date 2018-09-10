<?php
/*
    Projeto: Exercicio usando MVC
    Autor: Marcel 
    Data: 29/08/2018
    Objetivo: Manipular os dados no banco de dados 

    Editado por: 
    Data  da alteração:
    Conteudo alterado:

*/
    class Contato{

        //Atributos 
        public $codigo;
        public $nome;
        public $telefone;
        public $celular;
        public $email;
        public $sexo;
        public $dt_nasc;
        public $obs;

        public function __construct(){
            require_once('bdClass.php');
        }

        //Inserir novo contato no BD 
        public function Insert(Contato $contato){
            $sql = "insert into tblcontatos(
                nome,
                telefone,
                celular,
                email,
                sexo,
                dt_nasc,
                obs) values(
                '".$contato->nome."',
                '".$contato->telefone."',
                '".$contato->celular."',
                '".$contato->email."',
                '".$contato->sexo."',
                '".$contato->dt_nasc."',
                '".$contato->obs."')";

                $conex = new conexaoMySql();
                $PDO_conex = $conex->conectDatabase();

                if ($PDO_conex->query($sql))
                    header("location:index.php");
                else
                    echo("Erro no script de Insert");

                $PDO_conex->closeDatabase();

                
        } 

         //Atualizar contato do BD
        public function Update(){
            
        } 
        //Excluir contato do BD
        public function Delete($id){
            $sql = "delete from tblcontatos where codigo = ".$id;
            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            if ($PDO_conex->query($sql))
                    header("location:index.php");
                else
                    echo("Erro no script de delete");

                $PDO_conex->closeDatabase();
        } 
        //Listar todos os contatos do BD
        public function SelectAll(){
            $sql = "select * from tblcontatos order by codigo desc";

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                //Cria um objeto array da classe contato
                $listContato[] =  new Contato();
                $listContato[$cont]->codigo = $rs['codigo'];
                $listContato[$cont]->nome = $rs['nome'];
                $listContato[$cont]->telefone = $rs['telefone'];
                $listContato[$cont]->celular =$rs['celular'];
                $listContato[$cont]->email = $rs['email'];
                $listContato[$cont]->sexo = $rs['sexo'];
                $listContato[$cont]->dt_nasc = $rs['dt_nasc'];
                $listContato[$cont]->obs = $rs['obs'];

                $cont += 1;

            }
            return $listContato;


        } 
        //Listar um contatato do BD
        public function SelectById($id){
            $sql = "select * from tblcontatos where codigo = ".$id;

            $conex = new conexaoMySql();
            $PDO_conex = $conex->conectDatabase();

            $select = $PDO_conex->query($sql);

            if ($rs = $select->fetch(PDO::FETCH_ASSOC)){
                $listContato = new Contato();

                $listContato->codigo = $rs['codigo'];
                $listContato->nome = $rs['nome'];
                $listContato->telefone = $rs['telefone'];
                $listContato->celular =$rs['celular'];
                $listContato->email = $rs['email'];
                $listContato->sexo = $rs['sexo'];
                $listContato->dt_nasc = $rs['dt_nasc'];
                $listContato->obs = $rs['obs'];

                return $listContato;
            }

            
        } 
    }

?>
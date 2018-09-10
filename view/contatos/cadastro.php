<?php

//Verifica se a ação é de buscar. Essa ação é chamada no link do icone editar
if(isset($_GET['modo'])){
  if($_GET['modo'] == "buscar"){
    $codigo = $listContato->codigo;
    $nome = $listContato->nome;
    $telefone = $listContato->telefone;
    $celular = $listContato->celular;
    $email = $listContato->email;
    $sexo = $listContato->sexo;
    $dt_nasc = $listContato->dt_nasc;
    $obs = $listContato->obs;
  }
}
  

?>
    
    
    <div id="content">
    	<div id="cadastro">
        	<!-- 
                Elementos para formulário do HTML5
                    tel
                    date
                    month
                    week
                    email
                    range
                    number
                    color
                    url
                
                    required - trata a validação de caixas vazias 
                
                password - oculta os caracteres na digitação Ex: uma senha



            -->
            <form name="frmcontatos" method="post" action="router.php?controller=contatos&modo=inserir">
            
                <table id="tblcadastro">
                  <tr>
                    <td colspan="2" class="titulo_tabela">Cadastro de Contatos</td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Nome:</td>
                    <td><input id="nome"  name="txtnome" placeholder="Insira o seu nome" type="text" value="<?php echo($nome)?>" required onkeypress="return validar(event,'number','nome');"  /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Telefone:</td>
                    <td><input id="telefone" value="<?php echo($telefone)?>"  name="txttelefone" type="tel" onkeypress="return validar(event,'caracter','telefone');" /></td>
                  </tr>
                  <tr>
                      <!-- 
                        Expressões Regulares
                            pattern - deve ser utilizada na caixa para 
                                montar a expressão regular
                            
                            Ex: Permitir a digitação apenas de letras 
                                pattern="[a-z A-Z ã Ã õ Õ é É ô Ô ê Ê ç Ç  ]*" 

                                Obs: não esqeucer de especificar todas os 
                                    caracteres que deem ser inseridos pelo usuário. Não esquecer de colocar o * no final da expressão para permitir a digitação sequencial dos caracteres
                        -->
                      
                      
                    <td class="tblcadastro_td">Celular:</td>
                    <td><input name="txtcelular" type="tel" value="<?php echo($celular)?>" pattern="[0-9]{3} [0-9]{5}-[0-9]{4}" placeholder="Ex:011 99999-9999" title="Amigão favor digitar conforme exemplo Ex:011 99999-9999" /></td>
                  </tr>
                  <tr>
                    <td class="tblcadastro_td">Email:</td>
                    <td><input  name="txtemail" type="email" value="<?php echo($email)?>" /></td>
                  </tr>
				  <tr>
                    <td class="tblcadastro_td">Data Nascimento:</td>
                    <td><input name="txtdatanasc" type="text" value="<?php echo($dt_nasc)?>" /></td>
                  </tr>
                   <tr>
                    <td class="tblcadastro_td">Sexo:</td>
                    <td>
					<input type="radio"  name="rdosexo" value="F"   />Feminino
					<input  type="radio"  name="rdosexo" value="M" />Masculino
					</td>
                  </tr>
				  <tr>
				  
                    <td class="tblcadastro_td">Obs:</td>
                    <td><textarea name="txtobs" cols="20" rows="5"><?php echo($obs)?></textarea></td>
                  </tr>
                  <tr>
                    <td><input name="btnsalvar" type="submit" value="" /></td>
                    <td><input name="btnlimpar" type="reset" value="Limpar" /></td>
                  </tr>
                </table>
            
            </form>

        </div>
		<div id="consulta">
        	<table id="tblconsulta">
              <tr>
                <td class="titulo_tabela" colspan="5">Consulta de Contatos</td>
              </tr>
              <tr class="tblcadastro_td">
                <td>Nome</td>
                <td>Telefone</td>
                <td>Celular</td>
                <td>Email</td>
                <td>Opções</td>
              </tr>
              <tr class="tblconsulta_dados">
                <td></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <?php
                require_once('controller/controllerContatos.php');
                $listContatos =  new controllerContato();

                $rsContatos = $listContatos::listarContato();

                $cont = 0;

                while($cont < count($rsContatos)){             
              
              ?>
                      <tr style="background-color:;" class="tblconsulta_dados">
                        <td><?php echo($rsContatos[$cont]->nome); ?> </td>
                        <td><?php echo($rsContatos[$cont]->telefone);?></td>
                        <td><?php echo($rsContatos[$cont]->celular);?></td>
                        <td><?php echo($rsContatos[$cont]->email);?></td>
                        <td>
                            <a href="router.php?controller=contatos&modo=buscar&id=<?php echo($rsContatos[$cont]->codigo);?>">
                                <img src="view/icones/modify16.png"> 
                            </a>
                            |

                            <a href="router.php?controller=contatos&modo=excluir&id=<?php echo($rsContatos[$cont]->codigo);?>" onclick="return confirm('Deseja realmente Excluir o registro?')">		
                                <img src="view/icones/delete16.png">
                            </a>	
                            
                            |
                            
                              <a href="">
                                <img class="visualizar" src="view/icones/Search.png" width="20" height="20" onclick="modal();"> 
                              </a>

                        </td>
                      </tr>
                  <?php
                  $cont++;
                }
                  ?>
                
            
            </table>

        </div>
        
           
    </div>
    




	


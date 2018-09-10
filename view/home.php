
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<link rel="stylesheet" type="text/css" href="view/css/style.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CRUD-Contatos</title>

<script src="js/jquery.js"></script>    
    
<script>
    //Código para Modal
        $(document).ready(function(){
            $(".visualizar").click(function(){
                //Faz a div container ser aberta na tela usando um efeito
                //slideToggle, toggle, FadeIn, slideDown, etc...
               $(".container").fadeIn(400); 
            });
            
        });
    
        function modal(idItem)
        {
           
           $.ajax({
               type: "POST",
               url: "modal.php",
               data: {id:idItem},
               success: function(dados){
                   $('.modal').html(dados);
                   //alert(dados);
                     
                  
               }
           });
        }

    //
    
    function validar(caracter,blockType, campo)
    {
        document.getElementById(campo).style="background-color:#ffffff;";
        //Tratamento para verificar de qual tipo de navegador
        //esta vindo a tecla
        
        if(window.event)
        {
            //Recebe a ascii do IE
            var letra = caracter.charCode;
        }else{
            //Recebe a ascii dos outros navegadores
            var letra = caracter.which;
        }
                
        if(blockType=='caracter')
        {
            //Bloqueio de Caracteres
            if(letra<48 || letra>57)
                {
                    if(letra!=8 && letra!=32)
                    {
                        //Troca a cor do elemento conforme ele for bloqueado
                        //A variavel campo é recebida na função, nela
                        //contem o ID do elemento a ser formatado
                        document.getElementById(campo).style="background-color:#f4a1a1;";
                        return false; 
                    }
                }
        }else if(blockType=='number')
        {         
            //Bloqueio de Numeros
            if(letra>=48 && letra<=57)
                {
                    if(letra!=8 && letra!=32)
                    {
                        //Troca a cor do elemento conforme ele for bloqueado
                        //A variavel campo é recebida na função, nela
                        //contem o ID do elemento a ser formatado
                        document.getElementById(campo).style="background-color:#f4a1a1;";
                        return false; 
                    }
                }
        }
    }
    
</script>
    
</head>

<body>
<div class="container">
    <div class="modal">
    
    </div>
</div>    

<div id="principal">
	<div id="cabecalho">
		<img src="view/imagens/mvc.jpg" width="980" height="200">
    </div>

    <div id="content">
           <?php require_once('contatos/cadastro.php');?>
    </div>
    
    <div id="rodape">
    
    </div>
    
</div>

</body>
</html>



	


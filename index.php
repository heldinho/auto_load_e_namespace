<?php

define('www_ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

require_once(www_ROOT . DS . 'autoload.php');

//use Classes\Foo;
use Classes\Foo as F;

//use Classes\Bar;
//use Classes\Bar as B;

//use Classes\Database\Database;
use Classes\Database\Database as DB;

//$foo = new Foo();
$foo = new F();
//$foo = new Classes\Foo();

//$bar = new Bar();
//$bar = new B();
//$bar = new Classes\Bar();

//$db = new Database();
$bar = new DB();
//$bar = new Classes\Database\Database();

echo www_ROOT;
echo '<br>';
$foo = 'Bob';
$bar = &$foo;
$bar = "O meu nome é $bar";
echo $foo . '<br>';
echo $bar;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<style type="text/css">
		label.error {
			color: red;
			font-size: 10px;
			font-family: arial;
		}
		ul li:nth-child(2n) {
			text-transform: uppercase;
			font-weight: bold;
			color: red;
		}
		ul li:nth-child(2n):before {
			content: '[ ';
		}
		ul li:nth-child(2n):after {
			content: ' ]';
		}
	</style>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="jquery-migrate-1.4.1.js"></script>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
	<script type="text/javascript">
	$(function(){
		function adicionar() {
			var ElementoClonado = $(this.parentNode).clone(); //clona o elemento
			var str = $(ElementoClonado).children('input').eq(0).attr('name').split("["); //divide o name por "["
			console.log(str);
			var intQtd = parseInt(str[2].split("]")[0]); //resgata o numero entre "[" e "]"
			console.log(intQtd);
			var newName = "produtos[qtd][" + (intQtd + 1) + "]"; //novo valor name somado +1 do original
			ElementoClonado.children('input').eq(0).attr('name', newName); //seta o novo name para o elemento clonado
			$('.wrapper').append(ElementoClonado);
			$('.add').on("click", adicionar);
			$('.remove').on("click", remover);
			$(this).unbind("click");
		}

		function remover() {
			$(this.parentNode).remove();
		}
		$('.add').on("click", adicionar);
		$('.remove').on("click", remover);
	});
	</script>
</head>
<body>
<ul>
	<li>Primeiro item <span class="lnr lnr-database"></span></li>
	<li>Segundo item <span class="lnr lnr-enter"></span></li>
	<li>Terceiro item <span class="lnr lnr-printer"></span></li>
	<li>Quarto item <span class="lnr lnr-home"></span></li>
</ul>
<form method="post">
	<div class="wrapper">
		<div class="toclone">
			<select name="list">
			<option>selecione...</option>
				<option>opção 1 <span class="lnr lnr-database"></span></option>
				<option>opção 2 <span class="lnr lnr-enter"></span></option>
				<option>opção 3 <span class="lnr lnr-printer"></option>
				<option>opção 4 <span class="lnr lnr-home"></option>
			</select>
			<input type="text" name="produtos[qtd][1]">
			<button type="button" class="add"><span class="lnr lnr-plus-circle"></span></button>
			<button type="button" class="remove"><span class="lnr lnr-circle-minus"></span></button>
		</div>
	</div>
	<button type="submit"><span class="lnr lnr-database"></span> Gravar</button>
</form>

<div id="clone-form">
    <div id="clonedForm" class="cadastroGato" style="margin-top: 80px;">
        <h3>Dados do gato</h3>

            <hr style="margin-bottom: 70px;" class="hr-color2"/>

            <label>
                <input type="text" name="nome-gato[]" placeholder="Nome*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <label>
                <input type="text" name="apelido[]" placeholder="Apelidos*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <label>
                <input type="text" class="date" name="nascimento" placeholder="Data de nascimento*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <label>
                <input type="text" name="raca" placeholder="Raça*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <label>
                <input type="text" name="cor[]" placeholder="Cor*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <select name="sexo">
                <option class="selectClass" value="masc">Sexo*:</option>
                <option class="selectClass" value="masc">Masculino</option>
                <option class="selectClass" value="fem">Feminino</option>
            </select>

            <label>
                <input type="text" name="vacina[]" placeholder="Última vacinação*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <label>
                <input type="text" name="antirrabica[]" placeholder="Antirrábica*:" value=""
                        data-constraints="@Required"/>
                <span class="empty-message">*Campo obrigatório</span>
            </label>

            <p><label>
                Vacinas em dia?<br>
                <input type="radio" name="vacinas" value="sim">Sim
                <input type="radio" name="vacinas" value="nao">Nao
            </label></p>

            <label onclick="alergiaQual()">
                Tem alguma doença ou alergia? 
                <input type="radio" name="alergia" value="sim">Sim
                <input type="radio" name="alergia" value="nao">Nao
            </label>

            <label id="qualAlergia" style="visibility: hidden;">
                <input type="text" name="qual[]" placeholder="Qual?" value=""/>            
            </label>

            <label class="register">
                Castrado?<br>
                <input type="radio" name="castrado" value="sim">Sim
                <input type="radio" name="castrado" value="nao">Nao
            </label>

            <label onclick="medicacao()">
                Toma alguma medicação?<br>
                <input type="radio" name="medicacao" value="sim">Sim
                <input type="radio" name="medicacao" value="nao">Nao
            </label>

            <label id="qualMedicacao" style="visibility: hidden;">
                <input type="text" name="med" placeholder="Qual?" value=""/>            
            </label>
                <br>
            <label onclick="alimentacao()">
                Necessita alimentação especial? <br>
                <input type="radio" name="alimentacao" value="sim">Sim
                <input type="radio" name="alimentacao" value="nao">Nao
            </label>

            <label id="qualAlimentacao" style="visibility: hidden;">
                <input type="text" name="med" placeholder="Qual?" value=""/>            
            </label>
                <br>
            <label onclick="fiv()">
                Já realizou teste para FIV e FELV? <br>
                <input type="radio" name="teste" value="sim">Sim
                <input type="radio" name="teste" value="nao">Nao
            </label>

            <label id="testeFiv" class="register" style="display: none;">
                <input type="radio" name="fiv" value="posfiv">Positivo para FIV
                <input type="radio" name="fiv" value="posfelv">Positivo para FELV
                <input type="radio" name="fiv" value="posambos">Positivo para ambos
                <input type="radio" name="fiv" value="negambos">Negativo para ambos
            </label>

            <label class="register">
                Já ficou em hotelzinho antes?
                <p><input type="radio" name="castrado" value="sim">Sim
                <input type="radio" name="castrado" value="nao">Nao</p>
            </label>


            <label class="message">
                <textarea name="temperamento[]" placeholder="Descreva o temperamento do seu gato (exemplo: tímido, assustado, carinhoso, agressivo, etc)*:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
            </label>

            <label class="message">
                <textarea name="mensagem[]" placeholder="Descreva a rotina do seu gato (o que gosta, não gosta, hábitos, etc)*:" 
                    data-constraints='@Required @Length(min=20,max=999999)'></textarea>
            </label>  

                <button type="button" class="clonador">Adicionar Gato</button>
                <button type="submit">Enviar</button>
    </div>
</div>
<script type="text/javascript">
	$(function(){
		$('.clonador').click(function(e){
			e.preventDefault();
			$('.cadastroGato').clone().appendTo($('#clone-form'));
		});
	});
</script>
</body>
</html>
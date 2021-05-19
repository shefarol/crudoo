<?php
	include_once('conexao.php');

	if(isset($_POST['submit'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$fone = $_POST['fone'];
		$cpf = $_POST['cpf'];
		
		if($crud->insere($nome, $email, $fone, $cpf)){
			header("Location: insere.php?ok");
		}else{
			header("Location: insere.php?erro");
		}
	}
	include_once('cabecalho.php');
?>

	<script src="cpf.js"></script>
	<script language="javascript" >
		function SoNumeros( obj , e )
		{
		    var tecla = ( window.event ) ? e.keyCode : e.which;
		    if ( tecla == 8 )
		        return true;
		    if ( tecla < 48 || tecla > 57 )
		        return false;
		}
	</script>
	
<?php
	if(isset($_GET['ok'])){
?>
        <div class="alert alert-success">
            <i class="fas fa-check"></i> Registro inserido com sucesso!
        </div>
<?php
	}else if(isset($_GET['erro'])){
?>
        <div class="alert alert-danger">
            <i class="fas fa-times"></i> Ocorreu algum erro!
        </div>
<?php
	}
?>
		<style type="text/css">
            *.mostra, *:hover > .esconde {
              display: none;
            }
            *:hover > .mostra {
              display: inline-block;
            }
        </style>

	    <h3 class="alert alert-warning">
	    	<i class="fas fa-save"></i> Insere registro
	    </h3>

	    <h5 class="alert alert-danger text-right" 
	        id="erro" 
	        style="display: none;">
	    	<i class="fas fa-exclamation-triangle"></i> 
	    	ATENÇÃO!!! CPF inválido
	    </h5>
		<form name="form1" 
			  id="form1" 
			  method="post">

			<div class="row">
				<div class="col">
					<input type="text" 
						   name="nome" 
						   id="nome" 
						   class="form-control" 
						   placeholder="Nome" 
						   required="required" 
						   autofocus="autofocus" />
					<br />
				</div>

				<div class="col">

					<input type="email" 
						   name="email" 
						   id="email" 
						   class="form-control" 
						   placeholder="E-mail" 
						   required="required" />

					<br />
				</div>
			</div>


			<div class="row">
				<div class="col">
					<input type="text" 
					       name="fone" 
					       id="fone" 
					       class="form-control" 
					       placeholder="Fone" 
					       required="required" />
					<br />
				</div>

				<div class="col">
					<input type="text" 
					       name="cpf" 
					       id="cpf" 
					       class="form-control" 
					       placeholder="CPF" 
					       required="required" 
					       maxlength="11" 
					       onkeypress="return SoNumeros( this , event );" 
					       onblur="return verificarCPF(this.value);" />
					<br />
					<div id="resposta"></div>
				</div>
			</div>

	        <button type="submit" 
	                name="submit" 
	                id="submit"
	                class="btn btn-primary" />
	            <i class="far fa-save esconde"></i>
            	<i class="fas fa-save mostra"></i> Salvar
	        </button>  

	        <a href="index.php" 
	           class="btn btn-secondary"> 
	       		<i class="fas fa-angle-double-left"></i> Voltar
	       	</a>
		</form>
<?php 
	include_once('rodape.php'); 
?>
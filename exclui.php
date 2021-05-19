<?php
	include_once('conexao.php');
	include_once('cabecalho.php');

	if(isset($_POST['submit'])){
		$id_usuario = $_GET['id_usuario'];
		$crud->apaga($id_usuario);
		header('Location: exclui.php?ok');
	}

	if(isset($_GET['ok'])){
?>
        <div class="alert alert-success">
            <i class="fas fa-check"></i> Registro excluído com sucesso!
        </div>
<?php
	}else{
?>
        <h5 class="alert alert-danger text-center">
            <b><i class="fas fa-exclamation-triangle"></i> 
        	ATENÇÃO!!!</b> Quer mesmo apagar esse resgistro?
    	</h5>
<?php
	}

		if(isset($_GET['id_usuario'])){
?>

		<table class="table 
		              table-bordered 
		              table-striped 
		              table-hover">
		    <tr>
		    	<th>ID</th>
		    	<th>Nome</th>
		    	<th>E-mail</th>
		    	<th>Fone</th>
		    	<th>CPF</th>
		    </tr>
			<?php
				$query=$conexao->prepare("SELECT * FROM tab_usuarios WHERE id_usuario=:id_usuario");
				$query->execute(array(":id_usuario" =>$_GET['id_usuario']));
				while($linha=$query->fetch(PDO::FETCH_BOTH)){
			?>
				<tr>
					<td><?php echo($linha['id_usuario']); ?></td>
					<td><?php echo($linha['nome']); ?></td>
					<td><?php echo($linha['email']); ?></td>
					<td><?php echo($linha['fone']); ?></td>
					<td><?php echo($linha['cpf']); ?></td>
				</tr>
			<?php
				}
			?>
		</table>

<?php
	}
 ?>
 	<p>
 		<?php
 			if(isset($_GET['id_usuario'])){
 		?>
 			<form name="form1" 
 			      id="form1"
 			      method="post">
 			    <input type="hidden" 
 			           name="id_usuario" 
 			           id="id_usuario" 
 			           value="<?php echo($linha['id_usuario']); ?>" />

 			    <button type="submit" 
 			            name="submit" 
 			            id="submit" 
 			            class="btn btn-info">
 			        <i class="far fa-trash-alt esconde"></i>
 			        <i class="fas fa-trash-alt mostra"></i> Excluir   
 			    </button>

 			    <a href="./" 
 			       class="btn btn-secondary">
 			       <i class="fas fa-angle-double-left"></i> Voltar
 			    </a>
 				
 			</form>
 		<?php
 			}else{
 		?>
 				<a href="./" 
 			       class="btn btn-secondary">
 			       <i class="fas fa-angle-double-left"></i> Voltar
 			    </a>
 		<?php
 			}
 		?>
 	</p>

 <?php
 	include_once('rodape.php');
 ?>
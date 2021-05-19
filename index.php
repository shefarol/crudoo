<?php
	include_once('conexao.php');
	include_once('cabecalho.php');
?>

		<a href="insere.php" 
		   class="btn btn-info">
		   <i class="far fa-save esconde"></i>
		   <i class="fas fa-save mostra"></i> Inserir
		</a>

		<div class="table-responsive mt-3">
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
			    	<th colspan="2" 
			    	    class="text-center">Ações</th>
			    </tr>
			    <?php
			    	$query="SELECT * FROM tab_usuarios";

			    	//Quantidade de registros a ser mostrado
			    	$registros_por_pagina = 4;

			    	$novaquery=$crud->paginacao($query, 
			    		$registros_por_pagina);
			    	$crud->mostraDados($novaquery);
			    ?>
			    <tr class="bg-light">
			    	<td colspan="7" 
			    	    class="pb-0">
			    	    <div class="text-center">
			    	    	<?php
			    	    		$crud->link_paginacao($query,
			    	    		        $registros_por_pagina);
			    	    	?>
			    	    </div>
			    	</td>
			    </tr>
			</table>
		</div>
<?php
	include_once('rodape.php');
?>
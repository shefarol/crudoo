<?php
	class crud{
		private $db;

		function __construct($conecta){
			$this->db = $conecta;
		}


		//Função para inserir registro
		public function insere($nome, 
		                       $email, 
		                       $fone, 
		                   	   $cpf){
			try{
				$query=$this->db->prepare("INSERT INTO tab_usuarios (nome, email, fone, cpf) VALUES(:nome, :email, :fone, :cpf)");
				$query->bindParam(":nome", $nome);
				$query->bindParam(":email", $email);
				$query->bindParam(":fone", $fone);
				$query->bindParam(":cpf", $cpf);
				$query->execute();
				return true;
			}catch(PDOException $e){
				echo($e->getMessage());
				return false;
			}
		}





		//Função pra obter o ID do usuário
		public function pegaID($id_usuario){
			$query = $this->db->prepare("SELECT * FROM tab_usuarios WHERE id_usuario = :id_usuario");
			$query->execute(array(":id_usuario" => $id_usuario));
			$linhaSelecionada=$query->fetch(PDO::FETCH_ASSOC);
			return $linhaSelecionada;
		}




		//Função para alterar o registro
		public function altera($id_usuario,
		                       $nome, 
		                       $email,
		                       $fone, 
		                       $cpf){
			try{
				$query=$this->db->prepare("UPDATE tab_usuarios SET nome=:nome, email=:email, fone=:fone, cpf=:cpf WHERE id_usuario=:id_usuario");
				$query->bindParam(":nome", $nome);
				$query->bindParam(":email", $email);
				$query->bindParam(":fone", $fone);
				$query->bindParam(":cpf", $cpf);
				$query->bindParam(":id_usuario", $id_usuario);
				$query->execute();
				return true;
			}catch(PDOException $e){
				echo($e->getMessage());
				return false;
			}
		}





		//Função para apagar o registro
		public function apaga($id_usuario){
			try{
				$query=$this->db->prepare("DELETE FROM tab_usuarios WHERE id_usuario = :id_usuario");
				$query->bindParam(":id_usuario", $id_usuario);
				$query->execute();
				return true;
			}catch(PDOException $e){
				echo($e->getMessage());
				return false;
			}
		}




		//Mostra os dados na tabela
		public function mostraDados($query){
			$mostra=$this->db->prepare($query);
			$mostra->execute();

			if($mostra->rowCount() > 0){
				while($linha=$mostra->fetch(PDO::FETCH_ASSOC)){
					?>
					<tr>
						<td><?php echo($linha['id_usuario']); ?></td>
						<td><?php echo($linha['nome']); ?></td>
						<td><?php echo($linha['email']); ?></td>
						<td><?php echo($linha['fone']); ?></td>
						<td><?php echo($linha['cpf']); ?></td>
						<td class="text-center">
							<a href="altera.php?id_usuario=<?php echo($linha['id_usuario']); ?>">
								<i class="far fa-edit esconde" 
								   title="Alterar"></i>
								<i class="fas fa-edit mostra" 
								   title="Alterar"></i>
							</a>
						</td>

						<td class="text-center">
							<a href="exclui.php?id_usuario=<?php echo($linha['id_usuario']); ?>">
								<i class="far fa-trash-alt esconde" 
								   title="Excluir"></i>
								<i class="fas fa-trash-alt mostra" 
								   title="Excluir"></i>
							</a>
						</td>
					</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td colspan="7" 
						    class="text-center">
						    Não há registros
						</td>
					</tr>
				<?php
				}
			}




			//Mostra a quantidade de registros
			public function paginacao($query, $registros_por_pagina){
				$posicao_inicial = 0;
				if(isset($_GET["pagina_no"])){
					$posicao_inicial = ($_GET["pagina_no"] -1) * 
					$registros_por_pagina;
				}
				$query2 = $query . " LIMIT $posicao_inicial, 
				$registros_por_pagina";
				return $query2;
			}






			//Cria os links de paginação
			public function link_paginacao($query, 
				$registros_por_pagina){
				$self = $_SERVER['PHP_SELF'];
				$mostra=$this->db->prepare($query);
				$mostra->execute();
				$total_de_registros = $mostra->rowCount();
				if($total_de_registros > 0){
			?>
				<ul class="pagination justify-content-center">
			<?php 
				$total_de_paginas = ceil(
					$total_de_registros / 
					$registros_por_pagina);
				$pagina_atual = 1;
				if(isset($_GET["pagina_no"])){
					$pagina_atual = $_GET["pagina_no"];
				}



				//Links Primeira e Voltar
				if($pagina_atual != 1){
					$anterior = $pagina_atual - 1;
					echo('<li class="page-item">
						  <a class="page-link" 
						     href="'.$self.'?pagina_no=1"><i class="fas fa-angle-double-left"></i></a></li>');

					echo('<li class="page-item">
						  <a class="page-link" 
						     href="'.$self.'?pagina_no='.$anterior.'"><i class="fas fa-angle-left"></i></a></li>');
				}else{
					echo('<li class="page-item disabled">
						  <a class="page-link" 
						     href="#"><i class="fas fa-angle-double-left"></i></a></li>');

					echo('<li class="page-item disabled">
						  <a class="page-link" 
						     href="#"><i class="fas fa-angle-left"></i></a></li>');
				}






				//Links das páginas centrais
				for($i = 1; $i <= $total_de_paginas; $i++){
					if($i == $pagina_atual){
						echo('<li class="page-item active">
							  <a href="'.$self.'?pagina_no='.$i.'" class="page-link">'.$i.'</a></li>');
					}else{
						echo('<li class="page-item">
							  <a href="'.$self.'?pagina_no='.$i.'" class="page-link">'.$i.'</a></li>');
					}
				}






				//Links Próxima e Última
				if($pagina_atual != $total_de_paginas){
					$proxima = $pagina_atual + 1;
					echo('<li class="page-item">
						  <a class="page-link" 
						     href="'.$self.'?pagina_no='.$proxima.'"><i class="fas fa-angle-right"></i></a></li>');

					echo('<li class="page-item">
						  <a class="page-link" 
						     href="'.$self.'?pagina_no='.$total_de_paginas.'"><i class="fas fa-angle-double-right"></i></a></li>');
				}else{
					echo('<li class="page-item disabled">
						  <a class="page-link" 
						     href="#"><i class="fas fa-angle-right"></i></a></li>');

					echo('<li class="page-item disabled">
						  <a class="page-link" 
						     href="#"><i class="fas fa-angle-double-right"></i></a></li>');
				}
			?>
				</ul>
			<?php

			}
		}
	}
?>
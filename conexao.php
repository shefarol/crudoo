<?php
	$servidor = "localhost";
	$banco = "crudoo";
	$usuario = "crudoo";
	$senha = "crudoo";

	try{
		$conexao = new PDO("mysql:host=$servidor;
			                dbname=$banco",
			                $usuario, $senha);
		$conexao->setAttribute(PDO::ATTR_ERRMODE,
		                       PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
		echo($e->getMessage());
	}
	include_once('class.crud.php');
	$crud = new crud($conexao);
?>
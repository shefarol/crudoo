<!DOCTYPE html>
<html>
<head>
	<title>Exemplo de CRUD com PDO Orientado a Objeto</title>
	<meta charset="utf-8" />
	<meta name="viewport" 
	      content="width=device-width, initial-scale=1.0" />
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- Fonteawesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style type="text/css">
		*.mostra, *:hover > .esconde{
			display: none;
		}
		*:hover > .mostra{
			display: inline-block;
		}
		#erro{
			display: none;
		}
	</style>
</head>
<body>
	<main class="container mt-3">
		<h1 class="alert alert-info text-center">
			Exemplo de CRUD com PDO Orientado a Objeto
		</h1>
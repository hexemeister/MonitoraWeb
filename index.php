<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

<?php
require 'config.php';
require 'connection.php';
require 'database.php';
require 'viewUtils.php';
require 'control.php';

// var_dump(DBRead('atendim','nomedoador, doador', NULL));
?>
  
    <title>Monitora Web</title>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron jumbotron-fluid text-center">
			<div class="container">
				<h1 class="display-4">Monitora Web</h1>
				<p class="lead">Sistema Web de Monitoramento de Doações</p>
			</div>
		</div>

		<form action="control.php" method="post">
			<div class="form-row">
				<div class="col">
					<label for="dataInicio">Data Início</label>
					<input type="text" id="dataInicio" name="dataInicio" class="form-control" placeholder="Data Inicial" id = "firstdatepicker" name = "firstdatepicker">
				</div>
				<div class="col">
					<label for="dataFim">Data Fim</label>
					<input type="text" id="dataFim" name="dataFim" class="form-control" placeholder="Data Final" id = "lastdatepicker" name = "lastdatepicker">
				</div>
			</div>
			<input type="submit" value="Envia" />
		</form>
	
	
<?php
echo build_table(DBRead('atendim', 'senha, hrinicio, nomedoador, hrtermino, nmpacie, tipodoa, convert(varchar,dtatend, 103) AS Data , hospital', "WHERE dtatend BETWEEN '3/02/2017' AND '13/02/2017' ORDER BY dtatend, senha "));
?>
</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</body>
</html>
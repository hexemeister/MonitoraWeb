<!doctype html>
<html lang="pt-br">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet"
	href="resources\css\bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

<?php
require_once 'config.php';
require_once 'connection.php';
require_once 'database.php';
require_once 'viewUtils.php';
require_once 'control.php';
?>
    <title>Monitora Web</title>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron jumbotron-fluid text-center text-top">
			<div class="container">
				<h1 class="display-5">Monitora Web</h1>
				<p class="lead">Sistema Web de Monitoramento de Doações</p>
			</div>
		</div>
	<?php	foreach(get_included_files() as $a){
        echo $a."<br>";
    } ?>
		<form action="control.php" method="post">
			<div class="form-row">
				<div class="col">
					<label for="dataInicio">Data Início</label>
					<input type="date" id="dataInicio" name="dataInicio" class="form-control" placeholder="Data Inicial" id = "firstdatepicker" name = "firstdatepicker">
				</div>
				<div class="col">
					<label for="dataFim">Data Fim</label>
					<input type="date" id="dataFim" name="dataFim" class="form-control" placeholder="Data Final" id = "lastdatepicker" name = "lastdatepicker">
				</div>
			</div>
			<button style="margin-top:5px;" id="botao"class="btn btn-primary" type="button">Envia</button>
		</form>
	
	<div id="table">Tabela Aqui
		<?php echo build_table(DBAtendimentoByDateRangeRead("13/02/2017", "13/02/2017")); ?>
	</div>
</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="resources\js\jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	<script
		src="resources\js\popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	<script
		src="resources\js\bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
	<script type="text/javascript" src="resources/js/scripts.js" ></script>

</body>
</html>
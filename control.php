<?php
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$date=date_create_from_format("Y-m-d",$dataInicio);
echo date_format($date,"d/m/Y");

?>
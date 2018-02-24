<?php
$dataInicio = isset($_POST['dataInicio']) ? $_POST['dataInicio'] : "";
$dataFim = isset($_POST['dataFim']) ? $_POST['dataFim'] : "";
if (!$dataInicio == "" or !$dataFim=="") {
    $date=date_create_from_format("Y-m-d",$dataInicio);
    echo date_format($date,"d/m/Y");
}

?>
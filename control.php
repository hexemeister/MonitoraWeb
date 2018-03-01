<?php

require_once 'config.php';
require_once 'connection.php';
require_once 'database.php';
require_once 'viewUtils.php';
// require_once 'index.php';

$dataInicio = isset($_GET['dataInicio']) ? $_GET['dataInicio'] : "";
$dataFim = isset($_GET['dataFim']) ? $_GET['dataFim'] : "";
if (!$dataInicio == "") {
    $data=date_format(date_create_from_format("Y-m-d",$dataInicio),"d/m/Y");
    // echo date_format($date,"d/m/Y");
    // build_table( array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43") );
    // echo build_table(DBAtendimentoByDateRangeRead($data, "13/02/2017"));
    echo build_table(DBAtendimentoByDateRangeRead($data, "01/02/2017"));
}
?>
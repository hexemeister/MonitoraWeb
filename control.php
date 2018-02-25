<?php

require_once 'config.php';
require_once 'connection.php';
require_once 'database.php';
require_once 'viewUtils.php';
require_once 'control.php';

foreach(get_included_files() as $a){
    echo "control ".$a."<br>";
}
$dataInicio = isset($_GET['dataInicio']) ? $_GET['dataInicio'] : "";
$dataFim = isset($_GET['dataFim']) ? $_GET['dataFim'] : "";
if (!$dataInicio == "") {
    $data=date_format(date_create_from_format("Y-m-d",$dataInicio),"d/m/Y");
    // echo date_format($date,"d/m/Y");
    // build_table( array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43") );
    // echo build_table(DBAtendimentoByDateRangeRead($data, "13/02/2017"));
    echo build_table(DBAtendimentoByDateRangeRead($data, "01/02/2017"));
}

function DBConnect2(){
    $connectionOptions = array("Database"=>"hemo", "Uid"=>"sa", "PWD"=>"123", "Characterset"=>"UTF-8", 'ReturnDatesAsStrings'=> true);
    $conn = @sqlsrv_connect("localhost, 1433", $connectionOptions) or die(sqlsrv_errors());

    return $conn;
}

function DBClose2($conn){
    @sqlsrv_close($conn) or die(sqlsrv_errors($conn));
}

function DBAtendimentoByDateRangeRead2($dataInicio, $dataFim){
    $link = DBConnect2();
    $query = "SELECT senha, hrinicio, nomedoador, 
                    hrtermino, nmpacie, tipodoa, 
                    convert(varchar,dtatend, 103) AS Data , hospital 
              FROM atendim
              WHERE dtatend BETWEEN '{$dataInicio}' AND '{$dataFim}' ORDER BY dtatend, senha ";
    $result = @sqlsrv_query($link, $query, array(), array( "Scrollable" => 'static' )) or die(sqlsrv_errors());;

    if (!sqlsrv_num_rows($result)) {
        return false;
    } else {
        while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
        {
            $data[] = $row  ;
        }
        return $data;
    }
    DBClose2($link);
}

function build_table2($array){
    // start table
    $html = '<table class="table table-hover table-striped" >';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
        $html .= '<th>' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';
    
    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }
    
    // finish table and return it
    
    $html .= '</table>';
    return $html;
}
?>
<?php

// Lê do banco de dados
function DBRead($table, $fields = '*', $params = NULL){
    $link = DBConnect();
    $params = ($params) ? " {$params}" : NULL; 
    
    $query = "SELECT {$fields} FROM {$table}{$params}";
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
    DBClose($link);
}

function DBAtendimentoByDateRangeRead($dataInicio, $dataFim){
    $link = DBConnect();
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
    DBClose($link);
}
?>
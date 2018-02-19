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
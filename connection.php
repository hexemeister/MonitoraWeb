<?php

//Conecta ao Banco de Dados
function DBConnect(){
    $connectionOptions = array("Database"=>DB_DATABASE, "Uid"=>DB_USERNAME, "PWD"=>DB_PASSWORD, "Characterset"=>DB_CHARSET, 'ReturnDatesAsStrings'=> true);
    
    $conn = @sqlsrv_connect(DB_HOSTNAME, $connectionOptions) or die(sqlsrv_errors());

    return $conn;
}

//Fecha a conexão com o bando de dados
function DBClose($conn){
    @sqlsrv_close($conn) or die(sqlsrv_errors($conn));
}

//Escapa aspas apóstrofos
function DBEscape($dados){
    $link = DBConnect();
    
    if (!is_array($dados)){
        $dados =  str_replace("'", "''", $dados);
    } else {
        $arr = $dados;
        
        foreach ($arr as $key => $value){
            $key = str_replace("'", "''", $dados);
            $value = str_replace("'", "''", $dados);
        }
    }
    
    DBClose($link);
    
    return $dados;
}


?>
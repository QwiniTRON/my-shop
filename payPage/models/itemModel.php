<?php


function getProductInfo($dbc, $productid){
$productSql = getSqlProductInfo($productid);
$queryResult = $dbc->query($productSql);
    if($queryResult){
        return $queryResult->fetchAll(PDO::FETCH_ASSOC); 
    }else{
        return $queryResult;
    }
}

function getIdProductsList($dbc){
$productSql = getSqlIdProductList();
$queryResult = $dbc->query($productSql);
    if($queryResult){
        return $queryResult->fetchAll(PDO::FETCH_ASSOC); 
    }else{
        return $queryResult;
    }
}







?>
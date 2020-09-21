<?php

function getAllProducts($dbc, $userid){
    $sqlItems = getSqlAllItemFromBuylist($userid);
    $queryItemsResult = $dbc->query($sqlItems);
    $products = $queryItemsResult->fetchAll(PDO::FETCH_ASSOC); 
    return $products;
}

function getAproductWitoutLogin($dbc, $productsIdList){
    if($productsIdList != ""){
        $productsSql = getSqlAllProductWithoutLogin($productsIdList);
        $queryItemsResult = $dbc->query($productsSql);
        $products = $queryItemsResult->fetchAll(PDO::FETCH_ASSOC); 
    return $products;
    }else{
        return [];
    }
}

function getUserProductsIdList($dbc, $userid){
    $productsSql = getSqlUserProductsIdList($userid);
    $queryItemsResult = $dbc->query($productsSql);
    $idList = $queryItemsResult->fetchAll(PDO::FETCH_ASSOC); 
    return $idList;
}
 
function mergeCarts($dbc, $userid, $idArr){
    $sqlToMerge = getSqlMoreProductSetToCart($userid, $idArr);
    $queryMergeResult = $dbc->query($sqlToMerge);
}

?>









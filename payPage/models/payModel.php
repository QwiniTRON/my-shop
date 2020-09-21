<?php

function addOrder($dbc, $userid, $count, $productid, $card, $SESSION){
$productSql = getSqlAddOrder($userid, $productid, $count, $card);
$queryResult = $dbc->query($productSql);

$deleteSql = getSqlDeleteProductFromCart($userid, $productid);
$queryResult = $dbc->query($deleteSql);

unset($_SESSION["cart"][$productid]);

    if($queryResult){
        return true; 
    }else{
        return false;
    }
}




?>
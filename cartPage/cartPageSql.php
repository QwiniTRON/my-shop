<?php

function getSqlAllItemFromBuylist(string $userid): string{
    $userid = pg_escape_string($userid);
    return "select  product.id ,product.name, product.image, (select name from category where id = product.categoryid) as category, product.price, buylist.count from buylist
    join product on buylist.productid = product.id
    where buylist.userid = '{$userid}'";
}

function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlAllProductWithoutLogin($productsIdList){
    $productsIdList = pg_escape_string($productsIdList);
    return "SELECT id, name, description, image, (select name from category where id = product.categoryid) AS category, issale, isnew, price from product where id in ({$productsIdList});";
}


function getSqlDelteItem(string $userid, string $productid): string{
    $userid = pg_escape_string($userid);
    $productid = pg_escape_string($productid);
    return "delete from buylist where productid = {$productid} and userid = '{$userid}';";
}

function getSqlUserProductsIdList($userid){
    $userid = pg_escape_string($userid);
    return "select productid from buylist where userid = '{$userid}';";
}

function getSqlMoreProductSetToCart($userid, $idArr){
    $userid = pg_escape_string($userid);
    $idArr = array_map(function($value){
        return pg_escape_string($value);
    }, $idArr);
    $endLineId = array_pop($idArr);
    $bodyString = implode(" " ,array_map(function($value){
                    global $userid;
                    return "('{$userid}', 1, {$value}),";
                }, $idArr));

    return "insert into buylist (userid, count, productid) values 
    " .  $bodyString . "
    ('{$userid}', 1, {$endLineId})
    ;";
}

?>











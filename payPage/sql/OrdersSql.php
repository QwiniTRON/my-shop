<?php

// check token
function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlProductInfo(string $productid): string{
    $productid = pg_escape_string($productid);
    return "select * from product where id = {$productid};";
}

function getSqlIdProductList(): string{
    return "select id from product;";
}


function getSqlAddOrder($userid, $productid, $count, $card = null): string{
    $userid = pg_escape_string($userid);
    $productid = pg_escape_string($productid);
    $count = pg_escape_string($count);
    if($card !== null){
        $card = pg_escape_string($card);
    }else{
        $card = "null";
    }
    
    return "INSERT INTO orders (userid, productid, count, status, card) values 
    ('{$userid}', {$productid}, {$count}, 1, {$card})
    ;";
}

function getSqlDeleteProductFromCart($userid, $productid): string{
    $userid = pg_escape_string($userid);
    $productid = pg_escape_string($productid);

    return "DELETE FROM buylist WHERE productid = {$productid} AND userid='{$userid}';";
}



?>
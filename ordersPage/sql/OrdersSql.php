<?php

// check token
function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlOrdersUser(string $userid): string{
    $userid = pg_escape_string($userid);
    return "SELECT orders.id, orders.dateoreder, orders.userid, orders.status, orders.productid, orders.count, product.name, product.image, (select name from category where product.categoryid = category.id) AS category, product.price FROM orders 
    JOIN product ON orders.productid = product.id
    WHERE userid = '{$userid}'
    ;";
}

function getSqlAddOrder(string $userid, string $count, string $productid): string{
    $userid = pg_escape_string($userid);
    $count = pg_escape_string($count);
    $productid = pg_escape_string($productid);
    return "insert into orders (userid, productid, count) values 
    ('{$userid}', {$productid}, {$count})
    ;";
}



?>
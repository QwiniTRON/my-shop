<?php

function getSqlProductOfCategory($category): string{
    $category = pg_escape_string($category);
    return "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
    join category ON product.categoryid = category.id 
    where category.name = " . '\'' . strtolower($category) . '\';';
}

function getSqlProductsByMinMaxAll(int $min, int $max):string{
    $min--;
    $max++;
    return "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
    join category ON product.categoryid = category.id
    where price BETWEEN {$min} AND {$max}
    order by(product.price) desc
    ;";
}

function getSqlProductsByMinMaxAllSortMinPrice(int $min, int $max):string{
    $min--;
    $max++;
    return "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
    join category ON product.categoryid = category.id
    where price BETWEEN {$min} AND {$max}
    order by(product.price)
    ;";
}

function getSqlProductsByMinMaxCategory(int $min, int $max, string $category):string{
    $category = pg_escape_string($category);
    return "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
    join category ON product.categoryid = category.id 
    where category.name = '{$category}' AND price >= {$min} AND price <= {$max}
    ORDER BY(price) desc;";
}

function getSqlProductsByMinMaxCategorySortMinPrice(int $min, int $max, string $category):string{
    $category = pg_escape_string($category);
    return "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
    join category ON product.categoryid = category.id 
    where category.name = '{$category}' AND price >= {$min} AND price <= {$max}
    ORDER BY(price);";
}

$productAllcategory = "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
join category ON product.categoryid = category.id
order by(product.price) desc
";

function getSqlAddProductToCart($userid, $productid){
    $userid = pg_escape_string($userid);
    $productid = pg_escape_string($productid);
    return "insert into buylist (userid, count, productid) values 
    ('{$userid}', 1, {$productid})
    ;";
}

function getMinMaxByCategory($category):string{
    $category = pg_escape_string($category);
    return "SELECT MIN(price) AS min, MAX(price) AS max FROM product
    where product.categoryid = (select id from category where name = '{$category}')
    ";
}

$sqlMinMaxAllProducts = "SELECT MIN(price) AS min, MAX(price) AS max FROM product";

function getSqlCheckToken(string $token): string{
    $token = pg_escape_string($token);
    return "SELECT * FROM users WHERE token='{$token}'";
}

function getSqlSearchWithParam($string , $category = null, $sort = null, $min = null, $max = null): string{
    $mask = 0;
    $sql = "";
    $string = pg_escape_string($string);
    if($category == "all"){
        $category = null;
    }
    $category != null? $mask+=1 : false ;
    $sort != null? $mask+=10 : false ;
    $min != null AND $max != null? $mask+=100 : false;

    switch($mask){
        case 0:
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%'
            order by(price) desc
            ; ";
        break;
        case 1:
            $category = pg_escape_string($category);
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' and categoryid = (select id from category where name = '{$category}')
            order by(price) desc
            ; ";
        break;
        case 10:
            if($sort == "minprice"){
                $sql = "select * from product 
                     where name ILIKE '{$string}%' OR name ILIKE '%{$string}%'
                     order by(price)
                     ; ";
            }else{
                $sql = "select * from product 
                where name ILIKE '{$string}%' OR name ILIKE '%{$string}%'
                order by(price) desc
                ; ";
            }
        break;
        case 100:
            $min = pg_escape_string($min);
            $max = pg_escape_string($max);
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' AND price >= {$min} AND price <={$max}
            order by(price) desc
            ;";
        break;
        case 101: 
            $min = pg_escape_string($min);
            $max = pg_escape_string($max);
            $category = pg_escape_string($category);
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' AND price >= {$min} AND price <={$max} and categoryid = (select id from category where name = '{$category}')
            order by(price) desc
            ; ";
        break;
        case 111: 
            $min = pg_escape_string($min);
            $max = pg_escape_string($max);
            $category = pg_escape_string($category);
            $sorter = $sort == "minprice"? "asc" : "desc";
            $sql = $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' AND price >= {$min} AND price <={$max} and categoryid = (select id from category where name = '{$category}')
            order by(price) {$sorter}
            ; ";
        break;
        case 11:
            $category = pg_escape_string($category);
            $sorter = $sort == "minprice"? "asc" : "desc";
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' and categoryid = (select id from category where name = '{$category}')
            order by(price) {$sorter}
            ; ";
        break;
        case 110:
            $min = pg_escape_string($min);
            $max = pg_escape_string($max);
            $sorter = $sort == "minprice"? "asc" : "desc";
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%' AND price >= {$min} AND price <={$max}
            order by(price) {$sorter}
            ;";
        break;
        default:
            $sql = "select * from product 
            where name ILIKE '{$string}%' OR name ILIKE '%{$string}%'
            order by(price) desc
            ; ";
        break;
    }

    return $sql;
}

function getSqlSearch( string $string): string{
    $string = pg_escape_string($string);
    return "select * from product 
    where name ILIKE '{$string}%' OR name ILIKE '%{$string}%'
    order by(price) desc
    ; ";
}

?>
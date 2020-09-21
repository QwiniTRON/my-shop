<?php
require_once "../modules/getItems.php";


if(!empty($_SESSION["userdata"][0]["id"])){
    if($_SESSION["oldLogin"] === true){

        var_dump("123");

        $productListUser = getUserProductsIdList($dbc, $_SESSION["userdata"][0]["id"]);
        $productListUser = array_map(function($value){
            return $value["productid"];
        }, $productListUser);
        if(!empty($_SESSION["cart"])){
            $productsIdList = array_keys($_SESSION["cart"]);
            $resultArrIdList = array_diff ($productsIdList , $productListUser);
            // дополнение корзины
            mergeCarts($dbc, $_SESSION["userdata"][0]["id"], $resultArrIdList);
            // полсе соединения корзин получение всех товаров
        }
        $products = getAllProducts($dbc, $_SESSION["userdata"][0]["id"]);
        unset($_SESSION["oldLogin"]);
    }

    $products = getAllProducts($dbc, $_SESSION["userdata"][0]["id"]);

    foreach($products as $product){
        $_SESSION["cart"][$product["id"]] = $product["count"];
    }
    
}else{
    if(!empty($_SESSION["cart"])){
            $productsIdList = implode(", ", array_keys($_SESSION["cart"]));
            $products = getAproductWitoutLogin($dbc, $productsIdList);
            $products = array_map(function($value){
            $value["count"] = 1;
            return $value;
        }, $products);
    }
}



?>
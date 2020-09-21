<?php
require_once "models/itemModel.php";

$statusError = 0;
if(!isset($_GET["succsess"])){
    if(!empty($_GET["id"]) OR !empty($_POST["id"])){
        // listIdProducts
        $productIdList = getIdProductsList($dbc);
        if($productIdList){
            $productIdList = array_map(function($item){
                return $item["id"];
            }, $productIdList);
    
            // productinfo
            $findResult = in_array($_GET["id"], $productIdList);
            if($findResult){
                $productInfo = getProductInfo($dbc, $_GET["id"]);
                if($productInfo){
                    $productInfo = $productInfo[0];
                }else{
                    $statusError = 2; // проблема с получением информации о товаре
                }
            }
    
        }else{
            $statusError = 11; // проблема с получением списка id 
        }
    }else{
        $statusError = 1; // Нет id
    }
}


?>
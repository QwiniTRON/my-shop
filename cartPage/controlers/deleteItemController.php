<?php
require_once "../modules/deleteItem.php";


if(!empty($_GET["deleteid"]) AND !empty( $_SESSION["cart"][$_GET["deleteid"]] ) ){
    unset($_SESSION["cart"][$_GET["deleteid"]] );
    if(!empty($_SESSION["userdata"][0]["id"])){
        deleteItem($dbc, $_SESSION["userdata"][0]["id"]);
    }
}


?>
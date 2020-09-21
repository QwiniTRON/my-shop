<?php

    function deleteItem($dbc, $userid){
        $deleteSql = getSqlDelteItem($_SESSION["userdata"][0]["id"] ,$_GET["deleteid"]);
        $dbc->query($deleteSql);
    }

?>
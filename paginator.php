<?php



?>

<div class="paginator">
    <?php echo $page>0? 
    "<a href=\"index.php?page=0&$dataUrl\" class=\"paginator__arrow\">«</a>" : 
    "<span class=\"paginator__arrow\">«</span>" ?>

    <?php echo $page>0? 
    "<a href=\"index.php?page=" . ($page-1) . "&$dataUrl\" class=\"paginator__arrow\">❮</a>" : 
    "<span class=\"paginator__arrow\">❮</span>" ?>

    <?php
        if($pageCount>4){
            $pageCounter = $page+1<3? $page%3 :2;
            $pageCounter = ($pageCount -1 -$page) > 2? $pageCounter : $pageCounter + 2 - ($pageCount - $page - 1); 
        }else{
            $pageCounter = $page;
        }
     for($i=$page - $pageCounter, $counter = 0; $i<$pageCount AND $counter < 5;$i++){?>
        <a href="index.php?page=<?= $i;?>&<?= $dataUrl;?>" class="paginator__number <?= $i==$page? "active" : "";?>"><?= $i + 1;?></a>
    <?php $counter++; }?>

    <?php echo $page<$pageCount-1? 
    "<a href=\"index.php?page=" . ($page+1) . "&$dataUrl\" class=\"paginator__arrow\">❯</a>" : 
    "<span class=\"paginator__arrow\">❯</span>" ?>
    
    <?php echo $page<$pageCount-1? 
    "<a href=\"index.php?page=" . ($pageCount-1) . "&$dataUrl\" class=\"paginator__arrow\">»</a>" : 
    "<span class=\"paginator__arrow\">»</span>" ?>
</div>



























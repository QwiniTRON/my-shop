
<div class="col-sm-6 col-md-6 col-lg-4 itemfix">
    <article class="card mb-4 itemfix">
        <div class="card-top">
            <div class="card-top__cat"><?= $order["category"]?></div>
        </div>
        <div class="product-img">
            <img src=<?= "\"/img/products/{$order["image"]}\""?>>
        </div>
        <div class="card-body">
            <h4 class="item-title"><a href=<?= "\"/product-page.php?id={$order["productid"]}\"";?>><?= $order["name"]?></a></h4>
            <div class="card-btn">
                <div class="card-btn__price">
                    <?= strrev(wordwrap(strrev($order["price"]), 3, " ", true))?> ₽
                </div>
            </div>
            
            <div class="order-info doted">
                <?= $order["count"]?> штукa(-и)
            </div>
            <div class="order-info">
                статус:   <?= $order["status"]== 1? "В пути" : "" ;?>
            </div>
            <div class="order-info">
                дата заказа:   <?= date("Y-m-d", strtotime($order["dateoreder"]))?>
            </div>
            <div class="order-info dot">
                -------------------------------------------------------
            </div>

        </div>
    </article>
</div>

















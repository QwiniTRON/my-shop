
<div class="col-4 itemfix">
    <article class="card mb-4 itemfix">
        <div class="card-top">
             
        </div>
        <div class="product-img">
            <img src=<?= "\"/img/products/{$productInfo["image"]}\""?>>
        </div>
        <div class="card-body">
            <h4 class="item-title"><a href=<?= "\"/product-page.php?id={$productInfo["id"]}\"";?>><?= $productInfo["name"]?></a></h4>
            <div class="card-btn">
                <div class="card-btn__price">
                    <?= strrev(wordwrap(strrev($productInfo["price"]), 3, " ", true))?> ₽
                </div>
            </div>
            <div class="counter">
                <input name="count" class="counter__input" oninput="if(event.target.value > 10 || event.target.value < 1) event.target.value = 1;" type="number" min="1" max="10" value="1">
            </div>
            <div class="order-info dot">
                -------------------------------------------------------
            </div>

        </div>
    </article>
</div>

















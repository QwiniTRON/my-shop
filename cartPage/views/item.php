<div class="col-sm-6 col-md-6 col-lg-4 itemfix">
    <article class="card mb-4 itemfix">
        <div class="card-top">
            <?php if(!empty($product["issale"])):?>
            <div class="card-top__sale">Sale</div>
            <?php endif?>
            <?php if(!empty($product["isnew"])):?>
            <div class="card-top__new">new</div>
            <?php endif?>
            <div class="card-top__cat"><?= $product["category"]?></div>
        </div>
        <div class="product-img">
            <img src=<?= "\"../../img/products/{$product["image"]}\""?>>
        </div>
        <div class="card-body">
            <h4 class="item-title"><a href=<?= "\"../../product-page.php?id={$product["id"]}\"";?>><?= $product["name"]?></a></h4>
            <div class="card-btn">
                <div class="card-btn__price">
                    <?= strrev(wordwrap(strrev($product["price"]), 3, " ", true))?> ₽
                </div>
                <a href="/payPage/pay.php?id=<?= $product["id"];?>" class="card-btn__btn">
                    Оформить
                </a>
            </div>
            <div class="card-btn delete">
                <a href="./cart.php?deleteid=<?= $product["id"];?>" class="card-btn__btn delete">
                    Убрать
                </a>
            </div>
        </div>
    </article>
</div>








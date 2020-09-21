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
									<img src=<?= "\"{$product["image"]}\""?>>
								</div>
								<div class="card-body">
									<h4 class="item-title"><a href=<?= "\"product-page.php?id={$product["id"]}\"";?>><?= $product["name"]?></a></h4>
									<div class="card-btn">
										<div class="card-btn__price">
											<?= strrev(wordwrap(strrev($product["price"]), 3, " ", true))?> ₽
										</div>

										<?php if($_GET["productid"] == $product["id"] OR $_SESSION["cart"][$product["id"]]){?>
										<div class="card-btn__btn">
											 В корзине
										</div>
										<?php  }else{?>
										<a href="index.php?productid=<?= $product["id"]?>" class="card-btn__btn">
											Купить
										</a>
										<?php }?>

									</div>
								</div>
							</article>
						</div>
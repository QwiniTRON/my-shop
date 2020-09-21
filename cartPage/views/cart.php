<?php
session_start();
require_once "../modules/connetDB.php";
require_once "../cartPageSql.php";

require_once "../controlers/userInfoController.php";
require_once "../controlers/deleteItemController.php";
require_once "../controlers/getItemsController.php";


$prefix = "../../";
$MainBrowserTitle = "Корзина";
$notCart = true;



?>
<?php include_once "../../templates/_head.php"; ?>
	<!-- white-plate -->
<div class="white-plate">
	<div class="container-fluid">
        <?php include_once "../../templates/_header.php"; ?>
        <div class="line-between"></div>
        <!-- content block -->
        <div class="row">
            <h1 class="col-6 offset-3 cart__title">Корзина</h1>
        </div>
        <div class="row">
            <!-- Center Part -->
            <div class="col-md-9 col-lg-10">
                <div class="row">

                    <?php
                        if(!empty($products) And count($products) == 0){
                            echo "<div class=\"cart__notice\">Корзина пуста</div>";
                        }elseif(!empty($products)){
                            foreach($products as $product){
                                include "../views/item.php";
                            }
                        }
                        if(empty($_SESSION["userdata"][0]["id"])){
                            ?>
                                <div class="col-sm-6 col-md-6 col-lg-4 itemfix">
                                    <article class="card mb-4 itemfix cart__notice-login">
                                        Для оформления заказа необходимо пройти регистрацию или авторизироваться
                                        <a href="/login.php">Авторизация</a>
                                    </article>
                                </div>
                            <?php
                        }
                    ?>

                </div>
            </div>
            <!-- // Center Part -->
        </div>
        <!-- content block -->
    </div>
</div>
<div class="topArrow">
		<i class="fa fa-arrow-up" onclick="window.scrollTo(0, 0);" aria-hidden="true"></i>		
</div>
	<!-- // white-plate -->
<script defer src="../cart.js"></script>
<?php include_once "../../templates/footer.php" ;?>
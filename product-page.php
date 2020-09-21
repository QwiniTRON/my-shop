<?php
	session_start();
	require_once "./connectDB.php";
	$MainBrowserTitle = "Страничка товара";

	function getSqlCheckToken(string $token): string{
		$token = pg_escape_string($token);
		return "SELECT * FROM users WHERE token='{$token}'";
	}

	function checkToken($dbc, $token){
		$sqlToken = getSqlCheckToken($_COOKIE["token"]);
		$queryResult = $dbc->query($sqlToken);
		$response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
		return $response;
	}

	// product
	$id = intval($_GET["id"]);

	// token
	if(!empty($_COOKIE["token"])){
		$response = checkToken($dbc, $_COOKIE["token"]);
		if(count($response) > 0){
			$statusLogin = 1;
			$_SESSION["userdata"] = $response;
		}
	}

	if($id > 0){
		$sql = "SELECT product.id, product.name, description, category.name AS category,image, issale, isnew, price FROM product
		join category ON product.categoryid = category.id
		where product.id = {$id}
		";
		$queryResult = $dbc->query($sql);
		$products = $queryResult->fetchAll(PDO::FETCH_ASSOC);
		$mainProduct = $products[0];
	}else{
		header("Refresh: 3; url=index.php");
	}
?>
<?php include_once "./templates/_head.php";?>
	<!-- white-plate -->
	<div class="white-plate">
		<div class="container-fluid">
			<!-- header -->
			<?php include_once "./templates/_header.php";?>
			<!-- // header -->
			<div class="line-between"></div>
			<!-- content block -->
			<div class="row">
				<!-- Left aside -->
				<?php //include_once "./templates/_aside.php";?>
				<div class="product-page__back-block">
					<a href="index.php" class="product-page__back-arrow"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
					<div class="product-page__back-love"><i class="fa fa-heart" aria-hidden="true"></i></div>
				</div>
				<!-- // Left aside -->
				<!-- Center Part -->
				<div class="col-md-9">
					<?php if($id > 0){?>
					<div class="product-title"><?= $mainProduct["name"];?></div>
					
					<div class="row">
						<div class="col-6">
							<img src="img/products/<?= $mainProduct["image"]?>" alt="">
						</div>
						<div class="col-6">
							<div class="product-price"><?= strrev(wordwrap(strrev($mainProduct["price"]), 3, " ", true));?></div>

							<?php
							?>

							<?php if($_SESSION["cart"][$_GET["id"]]){?>
								<div class="product-btn-order">
									В корзине
								</div>
							<?php  }else{?>
								<a href="index.php?productid=<?= $mainProduct["id"]?>" class="product-btn-order fix">
									Купить
								</a>
							<?php }?>

							<div class="product-desc">
								<?= $mainProduct["description"]?>
							</div>
						</div>
					</div>
					<?php }else{?>
						<div class="error-notice">Что-то пошлое не так...</div>	
						<p class="error-subnotice">Перенаправление через 3 сек</p>
					<?php }?>
				</div>
				<!-- // Center Part -->
			</div>
			<!-- content block -->
		</div>
	</div>
	<!-- // white-plate -->

	<<?php include_once "./templates/footer.php";?>
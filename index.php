<?php
	session_start();
	require_once "./connectDB.php";
	require_once "./sqlIndex/sql.php";
	$MainBrowserTitle = "Главная страница  MyStore";

	//
	// вычисляемые поля $currentMinPrice, $currentMaxPrice, $categoryMain
	// 

	// pass
	// $hash = password_hash("lockword", PASSWORD_DEFAULT);
	// print_r($hash);
	// echo "<br>";
	// echo password_verify("lockword1", $hash);

	$statusLogin = 0; // Кастомизация header

	// paginator
	$page = $_GET["page"] ?? 0;
	$step = 9;
	$pageCount;

	//search
	if(!empty($_GET["search"])){
		$sql = getSqlSearchWithParam(iconv("cp1251", "utf-8", urldecode($_GET["search"])), iconv("cp1251", "utf-8", urldecode($_GET["category"])) ?? $_SESSION["oldCategory"], $_GET["sort"], $_GET["pricemin"] ?? $_SESSION["oldCurrentMinPrice"], $_GET["pricemax"] ?? $_SESSION["oldCurrentMaxPrice"]);
		$searchStatus = 1;// Поиск произошёл
		$_SESSION["oldSearch"] = iconv("cp1251", "utf-8", urldecode($_GET["search"]));
	}

	// token
	if(!empty($_COOKIE["token"])){
		$sqlToken = getSqlCheckToken($_COOKIE["token"]);
		$queryResult = $dbc->query($sqlToken);
		$response = $queryResult->fetchAll(PDO::FETCH_ASSOC);
		if(count($response) > 0){
			$statusLogin = 1;
			$_SESSION["userdata"] = $response;
		}
	}
	
	// category main
	if(!isset($_GET["category"]) OR empty($_GET["category"])){
		$categoryMain = "all";
	}else{
		$categoryMain = iconv("cp1251", "utf-8", urldecode($_GET["category"]));
	}

	// categoryes
	$sqlCategory = "SELECT name FROM category";
	$sqlCategoryResult = $dbc->query($sqlCategory);
	$categoryes = $sqlCategoryResult->fetchAll();
	$categoryes = array_map(function($item){
		return $item["name"];
	}, $categoryes);

	// cart
	if(!empty($_GET["productid"]) AND empty($_SESSION["cart"][$_GET["productid"]]) ){
		$_SESSION["cart"][$_GET["productid"]] = 1;
		if( !empty($_SESSION["userdata"][0]["id"]) ){
			$sqlAddCart = getSqlAddProductToCart($_SESSION["userdata"][0]["id"], $_GET["productid"]);
			$dbc->query($sqlAddCart);
		}
	}

	// price
	if($searchStatus != 1){
		if($categoryMain == "all"){
			$sqlPrice = $sqlMinMaxAllProducts;
		}else{
			$sqlPrice = getMinMaxByCategory($categoryMain);
		}
		

		$queryResult = $dbc->query($sqlPrice);
		$pricesArr = $queryResult->fetchAll(PDO::FETCH_ASSOC);
	
		$minPrice = $pricesArr[0]["min"];
		$maxPrice = $pricesArr[0]["max"];
	}

	// current prices
	if(!empty($_SESSION["oldCategory"]) AND $_SESSION["oldCategory"] == $categoryMain){
		$currentMinPrice = !empty($_GET["pricemin"])? $_GET["pricemin"] : $minPrice;
	}else{
		$currentMinPrice = $minPrice;
	}
	if(!empty($_SESSION["oldCategory"]) AND $_SESSION["oldCategory"] == $categoryMain){
		$currentMaxPrice = !empty($_GET["pricemax"])? $_GET["pricemax"] : $maxPrice;
	}else{
		$currentMaxPrice = $maxPrice;
	}

	// old category
	$_SESSION["oldCategory"] = $categoryMain;
	$_SESSION["oldCurrentMinPrice"] = $currentMinPrice;
	$_SESSION["oldCurrentMaxPrice"] = $currentMaxPrice;

	// Sort 
	if($searchStatus != 1){
		if($categoryMain!="all"){
			if(empty($categoryMain)){
				if($_GET["sort"] == "maxprice"){
					$sql = getSqlProductsByMinMaxAllSortMinPrice($currentMinPrice, $currentMaxPrice);
				}else{
					$sql = getSqlProductsByMinMaxAll($currentMinPrice, $currentMaxPrice);
				}
				$activeCategory = "all";
			}elseif( in_array(strtolower($categoryMain), $categoryes) ){
				if($_GET["sort"] == "maxprice"){
					$sql = getSqlProductsByMinMaxCategory($currentMinPrice ?? 0, $currentMaxPrice ?? 0, $categoryMain);
				}else{
					$sql = getSqlProductsByMinMaxCategorySortMinPrice($currentMinPrice ?? 0, $currentMaxPrice ?? 0, $categoryMain);
				}
				$activeCategory = $categoryMain;
			}else{
				header("Location: index.php");
			}
		}else{
			// sort=maxprice
			if($_GET["sort"] == "minprice"){
				$sql = getSqlProductsByMinMaxAllSortMinPrice($currentMinPrice, $currentMaxPrice);
			}else{
				$sql = getSqlProductsByMinMaxAll($currentMinPrice, $currentMaxPrice);
			}
			$activeCategory = "all";
		}
	}

	// products
	$queryResult = $dbc->query($sql);
	$products = $queryResult->fetchAll(PDO::FETCH_ASSOC);

	// prices если был произведён поиск
	if($searchStatus == 1 && count($products)>0){
		$min = min($products[0]["price"], $products[count($products)-1]["price"]);
		$max = max($products[0]["price"], $products[count($products)-1]["price"]);
		$minPrice = $min;
		$maxPrice = $max;
		$currentMinPrice = $min;
		$currentMaxPrice = $max;
		$_SESSION["oldCurrentMinPrice"] = $currentMinPrice;
		$_SESSION["oldCurrentMaxPrice"] = $currentMaxPrice;
	}

	// сделанно костыльно, должно реализовываться через sql limit и offset
	$pageCount = ceil(count($products)/$step);
	$page = $page >=$pageCount || $page<0? 0 : $page;
	$products = array_slice($products, $page*9, $step);
	$cat = urlencode(iconv("utf-8", "cp1251", $categoryMain));
	$serch = urlencode(iconv("utf-8", "cp1251", $_GET['search']));
	$dataUrl = "search={$_GET['search']}&category={$cat}&pricemin={$currentMinPrice}&pricemax={$currentMaxPrice}&sort={$_GET['sort']}";

?>
<?php include_once "templates/_head.php"; ?>
	<!-- white-plate -->
	<div class="white-plate">
		<div class="container-fluid">
			<?php include_once "./templates/_header.php"; ?>
			<div class="line-between"></div>
			<!-- content block -->
			<div class="row">
				<?php include_once "./templates/_aside.php"; ?>
				<!-- Center Part -->
				<div class="col-md-9 col-lg-10">
					<div class="row">
						<!-- Товар 1 -->
						<?php
							if(count($products) == 0){
								$notFinded = true;
								echo "<div class=\"Search__notice\">Ничего не нашлось...</div>";
							}
							for($i = 0; $i<count($products); $i++){
								$product = $products[$i];
								$product["image"] = "./img/products/" . $product["image"];
								include "./templates/prodict-itme.php";
							}
						?>
						<!-- // Товар 1 -->
					</div>

					<?php if(!$notFinded)include_once "./paginator.php";?>
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

	<?php include_once "./templates/footer.php" ;?>

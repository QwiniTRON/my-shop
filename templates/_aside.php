<?php // Принимает массив категорий $categoryes ?>

<!-- Left aside -->
<div class="col-md-3 col-lg-2 asideMenu"> 
	<ul class="nav">
	<form action="/index.php" method="GET" class="filters">
		<input type="hidden" value="<?= $_GET["search"]?>" name="search">
			<div class="nav__element categoryes">
				<label>
					<input class="filters-category__radio" name="category" <?= $activeCategory =="all"? "checked" :"";?> value="all" type="radio">
					<div href="index.php?category=all" class="nav__link <?= $activeCategory!="all"?:"nav__link--active";?>">Все товары ❯</div>
				</label>
				<!-- выпадающее меню категорий -->
				<div class="categoryes-block">
					<?php
					foreach($categoryes as $i => $name){
					?>
						<li class="nav__element">
							<label>
								<input <?= $activeCategory == $name? "checked" :"";?> class="filters-category__radio" value="<?= urlencode(iconv("utf-8", "cp1251", $name));?>" name="category" type="radio">
								<div class="nav__link<?= $name == $activeCategory? " nav__link--active":"";?>">
									<?= $name?>
								</div>
							</label>
						</li>
					<?php
						}
					?>
				</div>
				<!-- // выпадающее меню категорий -->
			</div>
		<!--  -->
		<div class="filter">
			<div class="filter__price">
				<span class="filter__price-ltext"><?= $minPrice?></span>
				<span class="filter__price-user-min" id="filter_price_min"></span>
				<input value="<?= $currentMinPrice?>" name="pricemin" class="filter__price-min" min="<?= $minPrice?>" max="<?= $maxPrice?>" step="1" type="range">
				<input class="filter__price-max" name="pricemax" value="<?= $currentMaxPrice?>" min="<?= $minPrice?>" max="<?= $maxPrice?>" step="1" type="range">
				<span class="filter__price-user-max" id="filter_price_max"></span>
				<span class="filter__price-rtext"><?= $maxPrice?></span>
			</div>
			<div class="filter__order">
				<select id="sort_select" class="filter__order-select" name="sort">
					<option <?= $_GET["sort"] == "maxprice"? "selected" : "" ;?> value="maxprice">Дороже</option>
					<option <?= $_GET["sort"] == "minprice"? "selected" : "" ;?> value="minprice">Дешевле</option>
					<option <?= $_GET["sort"] == "maxorder"? "selected" : "" ;?> value="maxorder">Популярнее</option>
				</select>
				<label class="filter__order-arrow" for="sort_select"></label>
			</div>
		</div>
		<button class="filter__do">Применить</button>
	</form>
	</ul>
	<script defer src="../js/asideleft.js"></script>
</div>
<!-- // Left aside -->
<!-- header -->
<div class="header">
	<div class="row">
		<div class="col-sm-5">
				<a href="<?= $prefix?>index.php" class="site-logo">
					<span>техно</span>Store
				</a>
		</div>

		<?php if(!$isNotSearch){?>
		<div class="col-sm-5">
			<form action="<?= $prefix?>index.php" Method="GET" class="search">
				<input required class="search__text" class="" value="<?= $_GET["search"]?>" placeholder="search" name="search" type="text">
				<input class="search__do" class="" value="найти" name="serchSubmit" type="submit">
			</form>
		</div>
		<?php }?>

		<?php if(!$isNotSearch){?>
		<div class="col-sm-1">
			<?php if(!$notCart):?>
			<a href="<?= $prefix?>cartPage/views/cart.php">
				<i data-hint="Корзина" class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i>
			</a>
			<?php endif?>
		</div>
		<div class="col-sm-1">

			<?php if($statusLogin == 0):?>
			<div class="admin-link">
				<a href="<?= $prefix?>login.php">
					<img title="Войти" width="38" src="<?= $prefix?>img/icons/padlock.svg" alt="">
				</a>
			</div>
			<?php endif;?>

			<?php if($statusLogin == 1):?>
			<div class="admin-link header__profile-menu">
				<?= explode(" ", $_SESSION["userdata"][0]["fio"])[1] ;?> <div class="header__profile-arrow"></div>
				<div class="header__profile-content">
					<a href="/profilePage/profile.php" class="header__profile-item">Профиль</a>
					<a href="/ordersPage/ordersPage.php" class="header__profile-item">Заказы</a>
					<a href="<?= $prefix?>logout.php" class="header__profile-item">Выйти</a>
				</div>
				<!-- <a href="logout.php" class="logout">
					<i title="Выйти" class="fa fa-sign-out logout-icons" aria-hidden="true"></i>
				</a> -->
			</div>
			<?php endif;?>

		</div>
		<?php }?>

	</div>
</div>
			<!-- // header -->
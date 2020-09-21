<?php
	$MainBrowserTitle = "Сделать заказ";

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
				<!-- Center Part -->
				<div class="col-md-9">

					<div class="title-1">Сделать заказ</div>

					<div class="order-item">
						<div class="order-img">
							<img class="order-img" src="img/products/iphone.jpg">
						</div>
						<div class="order-desc">
							<h4 class="order-title">Apple iPhone X 256 ГБ «серый космос»</h4>
							<div class="order-price">75 990 ₽</div>
						</div>
					</div>

					<form>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Имя и Фамилия">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Телефон">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email">
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Адрес">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">Оформить заказ</button>
						</div>
					</form>

				</div>
				<!-- // Center Part -->
			</div>
			<!-- content block -->
		</div>
	</div>
	<!-- // white-plate -->

	<?php include_once "./templates/footer.php";?>

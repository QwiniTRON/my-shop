<?php
session_start();
require_once "../connectDB.php";
require_once "sql/OrdersSql.php";

$prefix = "../";

require_once "controllers/userInfoController.php";
require_once "controllers/itemController.php";
require_once "controllers/payController.php";


?>



<?php include_once "../templates/_head.php"; ?>
	<!-- white-plate -->
	<div class="white-plate">
		<div class="container-fluid">
			<?php include_once "../templates/_header.php"; ?>
			<div class="line-between"></div>
			<!-- content block -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-6 offset-3 pay__title">
						<h1 class="order__title">Оформаление заказа</h1>
					</div>
				</div>
				<form method="POST" id="pay__form">
				<input name="id" type="hidden" value="<?= $_GET["id"];?>">

				<?php if(urldecode($_GET["succsess"]) == 1): ?>
				<div class="alert alert-success" id="succsess" role="alert">
					Заказ успешно оформлен
				</div>
				<?php endif ?>

				<?php if($statusError != 0 OR urldecode($_GET["succsess"]) == 2 ): ?>
				<div class="alert alert-danger" role="alert">
					Что-то пошло не так попробуйте позже
				</div>
				<?php endif ?>

				<?php if(!isset($_GET["succsess"])): ?>
				<div class="row">

					<?php
						include "views/orderItem.php";
					?>

					<div class="col-sm-8">
						<div class="card">
						<div class="card-body">
							<h5 class="card-title">Данные по оплате</h5>
							
								<div class="form-row fix">
									<div class="col-3"><label for="formGroupExampleInput">Банковская карта</label></div>
									<div class="col-md-4 normal-input2"><input pattern="\d{4}\s\d{4}\s\d{4}\s\d{4}" required onkeydown="if(event.keyCode==13){return false;}" name="card" type="text" class="form-control" id="card_input" placeholder="____ ____ ____ ____"><span class="validation-notice">Введите номер карты</span></div>
								</div>
								<div class="form-group form-check">
									<input type="checkbox" class="form-check-input" name="cash" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">Оплата наличными при получении</label>
								</div>
								<span id="error_notice" class="pay__validation-notice">Введите номер карты</span>
								<button class="btn btn-primary">Подтвердить заказ</button>
							
						</div>
						</div>
					</div>
				</div>

				<?php endif ?>

				</form>
			</div>
			<!-- content block -->
		</div>
	</div>
	<div class="topArrow">
		<i class="fa fa-arrow-up" onclick="window.scrollTo(0, 0);" aria-hidden="true"></i>		
    </div>
	<!-- // white-plate -->
	<script defer src="js/pay.js"></script>

<?php include_once "../templates/footer.php" ;?>

















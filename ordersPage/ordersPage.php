<?php
session_start();
require_once "../connectDB.php";
require_once "sql/OrdersSql.php";

$prefix = "../";

require_once "controllers/userInfoController.php";

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
					<div class="col-4 offset-4">
						<h1 class="order__title">Заказы</h1>
					</div>
				</div>
				<div class="row">
					<?php foreach($orders as $order){
						include "views/orderItem.php";
					}?>

				</div>
			</div>
			<!-- content block -->
		</div>
	</div>
	<div class="topArrow">
		<i class="fa fa-arrow-up" onclick="window.scrollTo(0, 0);" aria-hidden="true"></i>		
    </div>
	<!-- // white-plate -->
	<script defer src="js/orders.js"></script>

<?php include_once "../templates/footer.php" ;?>

















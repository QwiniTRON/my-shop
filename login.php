<?php
	require_once "./check-login.php";
	$MainBrowserTitle = "Login";
	$isNotSearch = true;



?>
<?php include_once "./templates/_head.php";?>
	<!-- white-plate -->
	<div class="white-plate white-plate--login">
		<div class="container-fluid">

			<!-- header -->
			<?php include_once "./templates/_header.php";?>
			<!-- // header -->

			<div class="line-between"></div>
			<form id="login_form" method="POST">
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["login"])? $_POST["login"] : "" ;?>" title="Ваш email" required pattern="\w+@\w{2,5}\.(ru|com)$"  type="text" name="login" class="form-control" placeholder="  Логин">
					<span class="validation-notice">Введите свой email</span>
				</div>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["password"])? $_POST["password"] : "" ;?>" title="Пароль" required type="password" minlength="6" maxlength="16" name="password" class="form-control" placeholder="  Пароль">
					<span class="validation-notice">Введите свой пароль</span>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Войти</button>
				</div>
			</form>
<?php if($status > 0):?><p class="text-center"><a href="index.php" class="text-secondary orange">Неверный логин или пароль</a></p><?php endif;?>
			<p class="text-center"><a href="index.php" class="text-secondary">Вернуться назад</a></p>
			<p class="text-center"><a href="registration.php" class="text-secondary green">Регистрация</a></p>
		</div>
		<script defer src="./js/login.js"></script>
	</div>
	<!-- // white-plate -->

<?php include_once "./templates/footer.php";?>
<?php
	session_start();
	require_once "./check-registration.php";

	// стилизация
	$MainBrowserTitle = "Регистрация";
	$isNotSearch = true;

	// if($status == 4){
	// 	header("Location: index.php");
	// }
?>
<?php include_once "./templates/_head.php";?>
	<!-- white-plate -->
	<div class="white-plate white-plate--login">
		<div class="container-fluid">

			<!-- header -->
			<?php include_once "./templates/_header.php";?>
			<!-- // header -->

			<div class="line-between"></div>

			<?php if($status != 4):?>
			<form id="reg_form" method="POST">
				<?php if($status == 2):?><p class="text-center"><a href="index.php" class="text-secondary orange">Такой mail уже зарегистрирован</a></p><?php endif;?>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["email"])? $_POST["email"] : "" ;?>" required type="text" pattern="\w+@\w{2,5}\.(ru|com)$" name="email" class="form-control" placeholder="  email">
					<span class="validation-notice">Введите свой email</span>
				</div>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["login"])? $_POST["login"] : "" ;?>" required type="password" minlength="6" maxlength="16" name="login" class="form-control" placeholder="  Пароль">
					<span class="validation-notice">Введите свой пароль от 6 до 16 символов</span>
				</div>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["rlogin"])? $_POST["rlogin"] : "" ;?>" required type="password" id="rpas" minlength="6" maxlength="16" name="rlogin" class="form-control" placeholder="  Пароль снова">
					<span class="validation-notice" id="rpas_notice">Введите свой пароль от 6 до 16 символов</span>
				</div>
				<?php if($status == 3):?><p class="text-center"><a href="index.php" class="text-secondary orange">Такой номер уже зарегистрирован</a></p><?php endif;?>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["phone"])? $_POST["phone"] : "" ;?>" title="8**********" pattern="(\+79[0-9]{9}|8[0-9]{10})" required type="tel" name="phone" class="form-control" placeholder="  ваш телефон">
					<span class="validation-notice">Введите свой номер в формате 8**********</span>
				</div>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["adress"])? $_POST["adress"] : "" ;?>" title="Город улица дом" pattern="[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{2,20}\s[0-9]{1,4}" required type="text" name="adress" class="form-control" placeholder="  Адрес: Город улица дом">
					<span class="validation-notice">Введите адрес своего проживания</span>
				</div>
				<div class="form-group normal-input">
					<input value="<?= !empty($_POST["fio"])? $_POST["fio"] : "" ;?>" title="Фамилия Имя Отчество" pattern="[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{1,20}" required type="text" name="fio" class="form-control" placeholder="  Фамилия Имя Отчество">
					<span class="validation-notice">Введите своё ФИО</span>
				</div>
				<div class="form-group normal-input">
					<button type="submit" class="btn btn-primary btn-block">Зарегистрироваться!</button>
				</div>
			</form>
			<?php endif?>

			<?php if($status == 4):?><p class="text-center"><a href="index.php" class="text-secondary green">Вы успешно зарагистрированы</a></p><?php endif;?>
			<p class="text-center"><a href="index.php" class="text-secondary">вернуться обратно</a></p>
			<p class="text-center"><a href="login.php" class="text-secondary green">Залогиниться</a></p>
		</div>
		<script defer src="./js/registration.js"></script>
    </div>
	<!-- // white-plate -->

<?php include_once "./templates/footer.php";?>
<?php
session_start();
require_once "../connectDB.php";
require_once "sql/ProfileSql.php";

$prefix = "../";

require_once "controllers/userInfoController.php";
require_once "./controllers/EditUserInfoController.php";

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
					<div class="col-8 offset-2">
						<form id="profile_form" method="POST">
						
							<?php if($statusEditUserInfo == 2):?>
								<div id="succsess" class="alert alert-success" role="alert">
									ФИО успешно изменено
								</div>
							<?php endif;?>

							<div class="form-row fix">
								<div class="col-2"><label for="formGroupExampleInput">ФИО</label></div>
								<div class="col-md-8 normal-input" data-hint="между словами 1 пробел"><input  pattern="[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{1,20}" required id="fio" onkeydown="if(event.keyCode==13){return false;}" name="fio" value="<?= $_SESSION["userdata"][0]["fio"]?>" disabled  type="text" class="form-control" id="formGroupExampleInput" placeholder="ФИО"><span class="validation-notice">Введите новое ФИО</span></div>
								<div class="col-2"><button id="fioBut" class="btn btn-primary" name="fioBut" type="submit">изменить</button></div>
							</div>

							<?php if($statusEditUserInfo == 3):?>
							<div id="succsess" class="alert alert-success" role="alert">
								Адресс успешно изменён
							</div>
							<?php endif;?>

							<div class="form-row fix">
								<div class="col-2"><label for="formGroupExampleInput">Адрес</label></div>
								<div class="col-md-8 normal-input" data-hint="между словами 1 пробел"><input pattern="[а-яА-ЯёЁ]{2,20}\s[а-яА-ЯёЁ]{2,20}\s[0-9]{1,4}" required id="adres" onkeydown="if(event.keyCode==13){return false;}" name="adres" value="<?= $_SESSION["userdata"][0]["adress"]?>" disabled type="text" class="form-control" id="formGroupExampleInput" placeholder="Адрес"><span class="validation-notice">Введите новый адрес</span></div>
								<div class="col-2"><button id="adresBut" class="btn btn-primary" name="adresBut" type="submit">изменить</button></div>
							</div>

							<?php if($statusEditUserInfo == 4):?>
								<div id="succsess" class="alert alert-success" role="alert">
									Телефон успешно изменён
								</div>
							<?php endif;?>

							<div class="form-row fix">
								<div class="col-2"><label for="formGroupExampleInput">Телефон</label></div>
								<div class="col-md-8 normal-input"><input pattern="(\+79[0-9]{9}|8[0-9]{10})" required id="phone" onkeydown="if(event.keyCode==13){return false;}" name="phone" value="<?= $_SESSION["userdata"][0]["phone"]?>" disabled type="text" class="form-control" id="formGroupExampleInput" placeholder="Телефон"><span class="validation-notice">Введите новый телефон</span></div>
								<div class="col-2"><button id="PhoneBut" class="btn btn-primary" name="PhoneBut" type="submit">изменить</button></div>
							</div>

							<?php if($statusEditUserInfo == 1):?>
								<div id="succsess" class="alert alert-success" role="alert">
									Пароль успешно изменён
								</div>
							<?php endif;?>

							<div class="form-row fix">
								<div class="col-2"><label for="formGroupExampleInput">Пароль</label></div>
								<div class="col-md-8 normal-input"><input minlength="6" maxlength="16" required id="password" onkeydown="if(event.keyCode==13){return false;}" name="password" disabled type="password" class="form-control" id="formGroupExampleInput" placeholder="Введите старый пароль"><span class="validation-notice">Введите старый Пароль</span></div>
								<div class="col-2"><button id="paswBut" class="btn btn-primary" name="paswBut" type="submit">изменить</button></div>
							</div>
							<div class="form-row fix hide">
								<div class="col-4"><label for="formGroupExampleInput">Введите новый пароль</label></div>
								<div class="col-md-6 normal-input"><input minlength="6" maxlength="16" required id="rpassword" onkeydown="if(event.keyCode==13){return false;}" name="rpassword" class="form-control" id="formGroupExampleInput" placeholder="Новый пароль"><span id="new_pass_notice" class="validation-notice">Введите новый пароль</span></div>
							</div>

							<?php if($statusEditUserInfo == 5):?>
								<div id="succsess" class="alert alert-success" role="alert">
									Маил успешно изменён
								</div>
							<?php endif;?>

							<div class="form-row fix">
								<div class="col-2"><label for="formGroupExampleInput">Маил</label></div>
								<div class="col-md-8 normal-input"><input pattern="\w+@\w{2,5}\.(ru|com)$" required id="mail" onkeydown="if(event.keyCode==13){return false;}" name="mail" value="<?= $_SESSION["userdata"][0]["mail"]?>" disabled type="text" class="form-control" id="formGroupExampleInput" placeholder="Маил"><span class="validation-notice">Введите новый маил</span></div>
								<div class="col-2"><button id="mailBut" name="mailBut" class="btn btn-primary" type="submit">изменить</button></div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- content block -->
		</div>
	</div>
	<div class="topArrow">
		<i class="fa fa-arrow-up" onclick="window.scrollTo(0, 0);" aria-hidden="true"></i>		
    </div>
	<!-- // white-plate -->
	<script defer src="js/profile.js"></script>

<?php include_once "../templates/footer.php" ;?>

















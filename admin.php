<?php
	$MainBrowserTitle = "Админ панель";
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
				<div class="col-12">
					<div class="title-1">Добавить товар</div>

					<form>
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название">
						</div>
						<div class="form-group">
							<select class="form-control">
								<option value="">Телефоны</option>
								<option value="">Планшеты</option>
								<option value="">Ноутбуки</option>
								<option value="">Компьютеры</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Цена">
						</div>

						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
							<label class="form-check-label" for="inlineCheckbox1">распродажа</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
							<label class="form-check-label" for="inlineCheckbox2">новинка</label>
						</div>

						<div class="form-group pt-3">
							<label for="exampleFormControlFile1">Фото:</label>
							<input type="file" class="form-control-file" id="exampleFormControlFile1">
						</div>

						<div class="form-group">
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Описание:</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
							</div>
							<button type="submit" class="btn btn-primary">Добавить</button>
						</div>
					</form>

				</div>

			</div>
			<!-- content block -->
		</div>
	</div>
	<!-- // white-plate -->

	<?php include_once "./templates/footer.php";?>

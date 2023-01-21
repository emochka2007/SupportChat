<!DOCTYPE html>
<html>

<head>
	<title>Регистрация</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./css/style.css">
	<style>
		body {
			background: rgb(4, 2, 111);
			background: linear-gradient(90deg, rgba(4, 2, 111, 1) 0%, rgba(172, 237, 255, 1) 100%);
		}

		#signup_form {
			width: 350px;
			height: 530px;
			position: relative;
			top: 50px;
			margin: auto;
			padding: auto;
		}
	</style>
</head>

<body>
	<div class="container">
		<div id="signup_form" class="well">
			<h2>
				<center><span class="glyphicon glyphicon-user"></span> Регистрация </center>
			</h2>
			<hr>
			<form method="POST" action="register.php">
				Имя: <input type="text" name="name" class="form-control" required>
				<div style="height: 10px;"></div>
				Логин: <input type="text" name="username" class="form-control" required>
				<div style="height: 10px;"></div>
				Пароль: <input type="password" name="password" class="form-control" required>
				<div style="height: 10px;"></div>
				Роль: <select name="role" class="form-control" required>
					<option value="2">Сотрудник</option>
					<option value="3">Клиент</option>
				</select>
				Компания <select name="company" class="form-control" required>
					<option>IT-Target</option>
					<option>random</option>
				</select>
				Сикрет-фраза<input name="keyphrase" class="form-control" type="text">
				<div style="height: 10px;"></div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Регистрация</button> <a href="index.php" style="color:white;">Обратно к логину</a>
			</form>
			<div style="height: 15px;"></div>
			<div style="color: red; font-size: 15px;">
				<center>
					<?php
					session_start();
					if (isset($_SESSION['sign_msg'])) {
						echo $_SESSION['sign_msg'];
						unset($_SESSION['sign_msg']);
					}
					?>
				</center>
			</div>
		</div>
	</div>
</body>

</html>
<!DOCTYPE html>
<!-- http://localhost:8888/chat%20sys%20PHP/chat%20system/index.php -->

<html>

<head>
	<title>Логин</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		body {
			background: rgb(4, 2, 111);
			background: linear-gradient(90deg, rgba(4, 2, 111, 1) 0%, rgba(172, 237, 255, 1) 100%);
		}

		#login_form {
			width: 350px;
			height: 450px;
			position: relative;
			top: 50px;
			margin: auto;
			padding: auto;
		}
	</style>
</head>

<body>

	<div class="container">
		<div id="login_form" class="well">
			<h2>
				<center><span class="glyphicon glyphicon-lock"></span>Поддержка IT Target</center>
			</h2>
			<hr>
			<form method="POST" action="login.php">
				Логин: <input type="text" name="username" class="form-control" id="username-reg" required>
				<div style="height: 10px;"></div>
				Пароль: <input type="password" name="password" class="form-control" id="password-reg" required>
				<div style="height: 10px;"></div>
				<!-- Компания <select name="company" class="form-control" required>
					<option>IT-Target</option>
					<option>random</option>
				</select> -->
				<button type="submit" class="btn btn-primary" id="basechat"><span class="glyphicon glyphicon-log-in"></span> Логин</button> Нет аккаунта?<a href="signup.php"> Регистрация</a>
			</form>
			<div style="height: 15px;"></div>
			<div style="color: red; font-size: 15px;">
				<center>
					<!-- создание сессии -->
					<?php
					session_start();
					if (isset($_SESSION['msg'])) {
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
				</center>
			</div>
		</div>
	</div>
</body>

</html>
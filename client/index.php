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
			font-family: "Courier New", Courier, monospace;
			background: rgb(4, 2, 111);
			background: linear-gradient(90deg, rgba(4, 2, 111, 1) 0%, rgba(172, 237, 255, 1) 100%);
		}

		#login_form {
			width: 350px;
			height: 400px;
			position: relative;
			top: 50px;
			margin: auto;
			padding: auto;
		}
	</style>
</head>

<body>
	<?php
	include('../conn.php');
	include('./session.php');
	echo $_SESSION['chatroomid'];
	echo $_SESSION['id'];
	?>
	<div class="container">
		<div id="login_form" class="well">
			<h2>
				<center><span class="glyphicon glyphicon-envelope"></span>Создать задачу</center>
			</h2>
			<hr>
			<form id="form" method="POST" action="./add_task.php">
				Название задачи: <input type="text" name="username" class="form-control" id="task_name" placeholder="Введите название задачи" required>
				<div style="height: 10px;"></div>
				Описание: <textarea type="text" style="height: 100px" name="text" class="form-control" id="task_description" placeholder="Опишите вашу задачу" required></textarea>

				<div style="height: 10px;"></div>
				Компания <input type="text" class="form-control" name="client-company" id="client_company" />
				<button type="submit" class="btn btn-primary" id="addtask" style="margin-top: 20px; background-color: rgb(155, 92, 214);"><span class="glyphicon glyphicon-log-in"></span>
			</form>
		</div>
		<div style="display:flex; width: 350px; flex-direction:column;font-size: 10px; margin:80px auto; ">
			<h1 style="font-size: 15px; font-style:italic; color: white">Если вам нужно простой перейти в чат, то нажмите на кнопку</h1>
			<button id="goToChat">Переход в чат</button>
		</div>
		<script>
			//тут мы отправляем данные в задачу
			$(document).on('click', '#addtask', function() {

				taskname = $('#task_name').val();
				company = $('#company').val();
				chatname = taskname + "IT-Target";
				chatpass = $('#task_description').val();
				clientCompany = $('#client_company').val();
				console.log(chatname, chatpass);
				$.ajax({
					url: "add_task.php",
					method: "POST",
					data: {
						chatname: chatname,
						chatpass: chatpass,
						clientCompany: clientCompany
					},
					success: function(data) {
						window.location.href = './chatroom.php?id=' + <?php echo $_SESSION['chatroomid']; ?>;
					}
				});


			});
			//сразу переход в чат
			const goToChatBtn = document.querySelector("#goToChat");
			goToChatBtn.addEventListener("click", () => {
				window.location.href = './chatroom.php?id=' + <?php echo $_SESSION['chatroomid']; ?>;
			})
		</script>
</body>

</html>
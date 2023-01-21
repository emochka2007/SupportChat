<?php
include('conn.php');
// подключаем сессию
session_start();
// создаем проверку инпутов
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
// // проверка инпута
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = check_input($_POST['username']);
	$role = $_POST["role"];
	if ($role == "2") {


		$keyphrase = $_POST["keyphrase"];
		if ($keyphrase == "123") {


			if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {


				$_SESSION['sign_msg'] = "Нельзя использовать специальные знаки";
				header('location: signup.php');
			} else {

				// задаем значения
				$username = check_input($_POST['username']);

				//задаем пароль
				$password = check_input($_POST["password"]);
				//передаем роль(1,2,3)

				//компания 
				$company = $_POST["company"];
				//пароль
				$fpassword = md5($password);
				$name = check_input($_POST["name"]);

				//путь к фото
				$photo = "user.png";
				//проверка на существование логина
				$check_if_user_exists = mysqli_query($conn, "select username from user where username='$username'");

				//возвращаем на страницу, если такой логин уже есть
				$num_rows = mysqli_num_rows($check_if_user_exists);
				if ($num_rows  > 0) {

					$_SESSION['sign_msg'] = "Такой логин уже существует";
					header('location: signup.php');
				} else {
					// добавляем в датубазу
					mysqli_query($conn, "INSERT INTO `user`(`username`, `password`, `uname`, `photo`, `access`, `company`) VALUES ('$username','$password','$name','$photo','$role', '$company')");
					//добавляем в компнату
					mysqli_query($conn, "insert into chatroom (chat_name, chat_password, date_created, userid) values ('$company - $username', '$password', NOW(), '" . $_SESSION['id'] . "')");
					//вставялем id
					$cid = mysqli_insert_id($conn);

					//вставляем участника чата
					mysqli_query($conn, "insert into chat_member (chatroomid, userid) values ('$cid', '" . $_SESSION['id'] . "')");

					echo $cid;
					$_SESSION['msg'] = "Успешная регистрация, пожалуйста войдите";
					$_SESSION['company'] = $company;
					$_SESSION['chatroomid'] = $cid;
					header('location: index.php');
				}
			}
		} else {
			$_SESSION['msg'] = "Неправильная ключевая фраза";
			header('location: index.php');
		}
	} else if ($role == "3") {
		if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {


			$_SESSION['sign_msg'] = "Нельзя использовать специальные знаки";
			header('location: signup.php');
		} else {

			// задаем значения
			$username = check_input($_POST['username']);

			//задаем пароль
			$password = check_input($_POST["password"]);
			//передаем роль(1,2,3)

			//компания 
			$company = $_POST["company"];
			//пароль
			$fpassword = md5($password);
			$name = check_input($_POST["name"]);

			//путь к фото
			$photo = "user.png";
			//проверка на существование логина
			$check_if_user_exists = mysqli_query($conn, "select username from user where username='$username'");

			//возвращаем на страницу, если такой логин уже есть
			$num_rows = mysqli_num_rows($check_if_user_exists);
			if ($num_rows  > 0) {

				$_SESSION['sign_msg'] = "Такой логин уже существует";
				header('location: signup.php');
			} else {
				// добавляем в датубазу
				mysqli_query($conn, "INSERT INTO `user`(`username`, `password`, `uname`, `photo`, `access`, `company`) VALUES ('$username','$password','$name','$photo','$role', '$company')");
				//добавляем в компнату
				mysqli_query($conn, "insert into chatroom (chat_name, chat_password, date_created, userid) values ('$company - $username', '$password', NOW(), '" . $_SESSION['id'] . "')");
				//вставялем id
				$cid = mysqli_insert_id($conn);

				//вставляем участника чата
				mysqli_query($conn, "insert into chat_member (chatroomid, userid) values ('$cid', '" . $_SESSION['id'] . "')");

				echo $cid;
				$_SESSION['msg'] = "Успешная регистрация, пожалуйста войдите";
				$_SESSION['company'] = $company;
				$_SESSION['chatroomid'] = $cid;
				header('location: index.php');
			}
		}
	}
}

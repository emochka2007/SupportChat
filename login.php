<?php
//подключаем датубазу
include('conn.php');
//создание сессии
session_start();
//проверка инпутов
function check_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = check_input($_POST['username']);

	if (!preg_match("/^[a-zA-Z0-9_]*$/", $username)) {
		$_SESSION['msg'] = "Нельзя использовать специальные знаки";
		header('location: index.php');
	} else {
		$_SESSION['company'] = "IT-Target";
		$password = check_input($_POST["password"]);
		$fpassword = md5($password);
		//проверям логин и пароль
		$query = mysqli_query($conn, "select * from `user` where username='$username' and password='$password'");
		//
		$row = mysqli_fetch_array($query);
		//добавляем в сессию id 
		$_SESSION['id'] = $row['userid'];
		$userid = $_SESSION['id'];

		//выбираем комнату, где есть юзер
		$chatroomid = mysqli_query($conn, "select * from `chatroom` where userid='$userid'");

		//если уже есть чат, то добавляем в сессию имя комнаты
		if (mysqli_num_rows($chatroomid) > 0) {
			$chatroom = mysqli_fetch_array($chatroomid);
			$_SESSION['chatroomid'] = $chatroom['chatroomid'];
		}

		//проверка на совпадения логина и пароль
		if (mysqli_num_rows($query) == 0) {
			$_SESSION['msg'] = "Неверные данные";
			header('location: index.php');
		} else {

			//досутп админа
			if ($row['access'] == 1) {

?>
				<script>
					window.alert('Успешный логин, Админ');
					window.location.href = 'admin/';
				</script>
			<?php
				//доступ сотрудника
			} else if ($row['access'] == 2) {
				$_SESSION['id'] = $row['userid'];
			?>
				<script>
					window.alert('Успешый Логин Пользователь');
					window.location.href = 'user/';
				</script>
			<?php
				//доступ клиента
			} else {
				$_SESSION['id'] = $row['userid'];
			?>
				<script>
					window.alert('Успешый Логин Клиент');
					window.location.href = 'client/';
				</script>
<?php
			}
		}
	}
}
?>
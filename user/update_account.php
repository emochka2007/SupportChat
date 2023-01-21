<?php
include('session.php');


//получаем через пост реквест данные 
$mname = $_POST['mname'];
$cpassword = md5($_POST['cpassword']);
$apassword = md5($_POST['apassword']);
$mpassword = $_POST['mpassword'];
$musername = $_POST['musername'];

//выбиарем юзера из таблицы
$myq = mysqli_query($conn, "select * from `user` where userid='" . $_SESSION['id'] . "'");
$myqrow = mysqli_fetch_array($myq);

//тут проверка правильно ли два раза написали пароль
if ($cpassword != $apassword) {
?>
	<script>
		window.alert('Verification Password did not match!');
		window.history.back();
	</script>
<?php
}

//проверка на пароль из таблицы
elseif ($cpassword != $myqrow['password']) {
?>
	<script>
		window.alert('Current Password did not match!');
		window.history.back();
	</script>
<?php
} else {
	if ($mpassword == $myqrow['password']) {
		$newpassword = $mpassword;
	} else {
		$newpassword = md5($mpassword);
	}
	//обновляем данные о пользователе
	mysqli_query($conn, "update `user` set username='$musername', password='$newpassword', uname='$mname' where userid='" . $_SESSION['id'] . "'");
?>
	<script>
		window.alert('Changes Saved!');
		window.history.back();
	</script>
<?php
}

?>
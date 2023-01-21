<?php
include('session.php');

//получаем id чата
$cid = $_POST['chatid'];
//получаем пароль чата
$pass = $_POST['chat_pass'];

//выбираем чат руму по id
$query = mysqli_query($conn, "select * from chatroom where chatroomid='$cid'");
$row = mysqli_fetch_array($query);


//если пароль совпадает, то добавляем пользователя в чат
if ($row['chat_password'] == $pass) {
	mysqli_query($conn, "insert into chat_member (chatroomid, userid) values ('$cid', '" . $_SESSION['id'] . "')");
	header('location: chatroom.php?id=' . $cid);
} else {
?>
	<script>
		window.alert('Incorrect Password!');
		//на прошлую вкладку переход
		window.history.back();
	</script>
<?php
}
?>
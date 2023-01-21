<?php
include('../conn.php');
session_start();
//получаем данные 
if (isset($_POST['msg'])) {
	$msg = $_POST['msg'];
	$id = $_POST['id'];
	//добавляем в чат данные
	mysqli_query($conn, "insert into `chat` (chatroomid, message, userid, chat_date) values ('$id', '$msg' , '" . $_SESSION['id'] . "', NOW())") or die(mysqli_error());
}

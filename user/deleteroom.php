<?php
	include('../conn.php');
	//проверка на наличие пост реквеста
	if (isset($_POST['del'])){
		$id=$_POST['id'];
		//удаляем отовсюду чат
		mysqli_query($conn,"delete from `chatroom` where chatroomid='$id'");
		mysqli_query($conn,"delete from `chat` where chatroomid='$id'");
		mysqli_query($conn,"delete from `chat_member` where chatroomid='$id'");
	}

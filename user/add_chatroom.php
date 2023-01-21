<?php 
	include('session.php');
	//получаем имя чата и пароль
	if (isset($_POST['chatname'])){
	$cid="";
	$chat_name=$_POST['chatname'];
	$chat_password=$_POST['chatpass'];

	//добавляем в комнату
	mysqli_query($conn,"insert into chatroom (chat_name, chat_password, date_created, userid) values ('$chat_name', '$chat_password', NOW(), '".$_SESSION['id']."')");
	$cid=mysqli_insert_id($conn);


	//добавляем участника чата
	mysqli_query($conn,"insert into chat_member (chatroomid, userid) values ('$cid', '".$_SESSION['id']."')");
	
	echo $cid;
	}
	echo $_POST['chatname'];

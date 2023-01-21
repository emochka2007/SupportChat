<?php
	include('../conn.php');
	//получаем id
	$id=$_REQUEST['id'];
	//получаем имя юзера
	$user=$_POST['user'];
	
	//проверка на существование
	if (empty($user)){
	?>
		<script>
			window.alert('Please select user');
			window.history.back();
		</script>
	<?php
	}
	else{
		//если все ок, то вставляем в таблицу пользователей чата
	mysqli_query($conn,"insert into chat_member (userid, chatroomid) values ('$user','$id')");
	
	?>
		<script>
			window.alert('Member Added Successfully');
			window.history.back();
		</script>
	<?php
	}
?>
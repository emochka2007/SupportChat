<?php
include('session.php');
if (isset($_POST['chatname'])) {
	$cid = "";
	//получаем из пост запроса все данные
	$chat_name = $_POST['chatname'];
	$chat_password = $_POST['chatpass'];
	$createdById = $_SESSION['id'];
	$clientCompany = $_POST['clientCompany'];

	$cid = mysqli_insert_id($conn);
	//добавляем задачу
	mysqli_query($conn, "INSERT INTO `tasks` (`taskid`, `name`, `description`, `status_task`, `createdBy`, `clientCompany`) VALUES ('$cid', '$chat_name', '$chat_password', 'not in work', '$createdById', '$clientCompany')");
}
echo $_POST['chatname'];

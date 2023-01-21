<?php
//подключаем сессию
	session_start();
	include('../conn.php');
	
	//проверка на наличие id
	if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
	header('location:../');
    exit();
	}
	
	//выбираем пользователя
	$sq=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'");
	$srow=mysqli_fetch_array($sq);
		
	//если пользователь перезаходит выходил со страницы
	if ($srow['access']!=2){
		header('location:../');
		exit();
	}
	
	$user=$srow['username'];

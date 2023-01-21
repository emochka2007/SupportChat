<?php
	include('../conn.php');
	
	if (isset($_POST['del'])){
		$id=$_POST['id'];
		//удаляем задачу
		mysqli_query($conn,"delete from `tasks` where taskid='$id'");
	}

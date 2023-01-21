<?php
include('../conn.php');
include('session.php');
session_start();
$workerId = $_SESSION['id'];

//получаем id и берем задачу за сотрудника
$id = $_POST['id'];
$inWork = "in Work";
mysqli_query($conn, "UPDATE `tasks` SET `workerId`='$workerId', `status_task`='$inWork', `start_time`=NOW() WHERE taskid=$id");

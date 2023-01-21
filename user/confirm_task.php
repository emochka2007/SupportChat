<?php
include('../conn.php');
include('session.php');
session_start();
$workerId = $_SESSION['id'];

//получаем id и берем задачу за сотрудника
$id = $_POST['id'];
$inWork = "Done";
mysqli_query($conn, "UPDATE `tasks` SET `status_task`='$inWork', `end_time`=NOW() WHERE taskid=$id");
$start_time_query = mysqli_query($conn, "SELECT `start_time` FROM tasks WHERE taskid=$id");
$start_time = mysqli_fetch_assoc($start_time_query);
$start = $start_time['start_time'];

$end_time_query =  mysqli_query($conn, "SELECT `end_time` FROM tasks WHERE taskid=$id");
$end_time = mysqli_fetch_assoc($end_time_query);
$end = $end_time['end_time'];
$result_time_query = "SELECT time_to_sec(timediff('$end','$start')) / 60";
$hours_query = mysqli_query($conn, $result_time_query);
$hours = mysqli_fetch_assoc($hours_query);
$result = $hours["time_to_sec(timediff('$end','$start')) / 60"];
mysqli_query($conn, "UPDATE `tasks` SET `result_time`='$result' WHERE taskid=$id");
mysqli_query($conn, "UPDATE `Reviews` SET `result_time`=0 ");
mysqli_query($conn, "UPDATE `Reviews` SET `result_time`=result_time+'$result' WHERE WorkerId=$workerId");
?>
<script>
    console.log(<?= json_encode($hours); ?>);
</script>
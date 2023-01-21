<?php
include('../conn.php');
include('session.php');
$clientId = $_SESSION['id'];
//выбираем пользователя
$query = ("SELECT workerId FROM `tasks` WHERE createdBy='$clientId'");
$result = mysqli_query($conn, $query);
?>
<?php
include('../conn.php');
$count = $_POST['count'];
$data = mysqli_fetch_assoc($result);
$initialReviewSum = 0;
$initialReviewCount = 0;
$workerId = $data['workerId'];
$check_if_exists = mysqli_query($conn, "select * from Reviews where WorkerId='$workerId'");
//если работника еще нет в таблице, то добавляем его
if (mysqli_num_rows($check_if_exists) == 0) {
    mysqli_query($conn, "insert into Reviews (WorkerId,reviewSum,reviewCount) values ('$workerId', '$initialReviewSum', '$initialReviewCount')");
}
//обновляем данные у работника в таблице
mysqli_query($conn, "UPDATE Reviews SET reviewSum = reviewSum + $count WHERE workerId = $workerId");
mysqli_query($conn, "UPDATE Reviews SET reviewCount = reviewCount + 1 WHERE workerId = $workerId");
//обновляем статус у пользователя, который проголосовал на тру
mysqli_query($conn, "UPDATE user SET has_review ='true' where userId=$clientId");
$query_reviewCount = ("SELECT workerId FROM `Reviews` WHERE WorkerId='$workerId'");
$reviewCount = mysqli_query($conn, $query_reviewCount);
$num_of_reviews = mysqli_num_rows($reviewCount);
?>

<script>
    console.log(<?= json_encode($workerId); ?>);
    console.log(<?= json_encode($initialReviewSum); ?>);
    console.log(<?= json_encode($initialReviewCount); ?>);
    console.log(<?= json_encode($data['workerId']); ?>);
</script>
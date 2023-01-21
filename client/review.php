<?php
include('./header.php');
include('./session.php');
include('../conn.php');
$clientid = $_SESSION['id'];
//проверям голосовал
$hasReview_query = mysqli_query($conn, "select has_review from user where userid = $clientid");
$hasReview = mysqli_fetch_array($hasReview_query);
//проверяем статус задачи
$taskTaken_data = mysqli_query($conn, "select status_task from tasks where createdBy=$clientid");
$taskTaken = mysqli_fetch_array($taskTaken_data);

//если задачу не взята, то не показываем отзыв
if ($taskTaken['status_task'] !== 'not in work') {

    //если пользователь уже голосовал, то не показываем отзыв
    if ($hasReview['has_review'] !== 'true') {


?>
        <div class="review">
            <form method="post" id="review-form" action="review.php">
                <h3>Оставьте отзыв о нашей работе</h3>
                <select name="count" id="review-count" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit" id="post-review">Оставить отзыв</button>
            </form>

        </div>
        <script>
            //добавляем отзыв в таблицу
            $(document).on('submit', '#review-form', function() {
                let reviewCount = document.querySelector('#review-count').value;
                $.ajax({
                    url: "add_review.php",
                    method: "POST",
                    data: {
                        count: reviewCount,
                    },
                    success: function() {
                        console.log("added to db");
                        window.location.href = "chatroom.php?id=" + <?php echo $_SESSION['chatroomid'] ?>;
                    }
                });
            });
        </script>
<?php }
} ?>
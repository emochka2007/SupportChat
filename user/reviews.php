<?php
include('../conn.php');
include('session.php');
include('./navbar.php');
include('./header.php');
//выбираем все отзывы
$query = "SELECT * FROM Reviews";
$result = mysqli_query($conn, $query);
?>
<section class="page-container">
    <?php
    //тут выгружаем через цикл отзывы
    if (mysqli_num_rows($result) > 0) {
        $sn = 1;
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
            <?php
            $sum = $data['reviewSum'];
            $count = $data['reviewCount'];
            $kpd = round($sum / $count, 2);
            ?>
            <div class="data-card">
                <h3>ID-работника
                    <?php echo $data['WorkerId']; ?>
                </h3>
                <h4> КПД
                    <?php echo $kpd ?>
                </h4>
                <span class="link-text">
                    Кол-во отзывов
                    <?php echo $data['reviewCount']; ?>
                </span> <span class="link-text">
                    Время работы
                    <?php echo $data['result_time']; ?>
                </span>
            </div>
    <?php
        }
    }
    ?>
</section>
<script>
    // const reviewsArray = Array.from(document.querySelectorAll("#taskid"));
    // let sum = 0;
    // reviewsArray.map(item => sum += Number(item.innerHTML))
    // console.log(sum);
    console.log(<?= json_encode($data); ?>);
</script>
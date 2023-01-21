<?php
include('../conn.php');
include('session.php');
//запрос на получение задач по компании
$query = "SELECT taskid, name, description, workerId, status_task, clientCompany, result_time FROM tasks WHERE name LIKE '%{$_SESSION['company']}%'";
$result = mysqli_query($conn, $query);
?>
<?php
if (mysqli_num_rows($result) > 0) {
  //выгружаем задачи 
  $sn = 1;
  while ($data = mysqli_fetch_assoc($result)) {
?>
    <?php
    if ($data['status_task'] == 'Done') {
    ?>
      <div class="data-card done">
      <?php
    } else {
      ?>
        <div class="data-card">
        <?php } ?>
        <h3 id="id"><?php echo $data['taskid'] ?></h3>
        <h3>
          <?php echo $data['name']; ?>
        </h3>
        <h4> Описание:
          <?php echo $data['description']; ?>
        </h4>
        <span class="link-text">

          Статус:
          <?php echo $data['status_task'] ?>
        </span>
        <span class="link-text">
          Компания клиента:
          <?php echo $data['clientCompany'] ?>
        </span>
        <span class="link-text">
          <?php
          if ($data['result_time'] !== null) {
          ?>
            Время выполнения
            <?php echo $data['result_time'] ?>
            мин
        </span>
      <?php       } ?>
      <div class="button-flex">
        <?php
        if ($data['status_task'] !== 'Done' && $data['status_task'] !== "in Work") {
        ?>
          <button class='btn-primary-new btn-take'>Взять задачу</button>
        <?php
        }
        if ($data['status_task'] !== 'not in work' && $data['status_task'] !== 'Done') {
        ?>
          <button class='btn-primary-new btn-confirm'>Выполнил задачу</button>
        <?php } ?>
        <button class='btn-primary-new btn-remove'>Удалить задачу</button>
      </div>
        </div>

      <?php
    }
  } else { ?>
      <tr>
        <td colspan="8">No data found</td>
      </tr>
    <?php } ?>
    <script>
      //удалить задачу
      const buttonRemoveArr = Array.from(document.querySelectorAll('.btn-remove'));
      buttonRemoveArr.map((item, index) => item.addEventListener('click', () => {
        let id = document.querySelectorAll('#id')[index];
        console.log(id.innerHTML)
        $.ajax({
          type: "POST",
          url: "deletetask.php",
          data: {
            id: id.innerHTML,
            del: 1,
          },
          success: function() {
            window.location.href = 'tasks.php';
          }
        });
      }))
      //взять задачу
      const buttonTakeArr = Array.from(document.querySelectorAll('.btn-take'));
      buttonTakeArr.map((item, index) => item.addEventListener('click', () => {
        let id = document.querySelectorAll('.data-card')[index].children[0];
        console.log(id.innerHTML)
        $.ajax({
          type: "POST",
          url: "take_task.php",
          data: {
            id: id.innerHTML,
            take: 1,

          },
          success: function() {
            window.alert("Задача взята")
            window.location.href = 'tasks.php';
          }
        })
      }))
      const confirmBtnArray = Array.from(document.querySelectorAll('.btn-confirm'));
      confirmBtnArray.map((item, index) => item.addEventListener('click', () => {
        let id = document.querySelectorAll('.data-card')[index].children[0];
        console.log(id.innerHTML)
        $.ajax({
          type: "POST",
          url: "confirm_task.php",
          data: {
            id: id.innerHTML,
            confirm: 1,

          },
          success: function() {
            window.alert("Задача выполнена")
            window.location.href = 'tasks.php';
          }
        })
      }))
    </script>
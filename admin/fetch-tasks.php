<?php
include('../conn.php');
include('session.php');
$query = "SELECT taskid, name, description, workerId, status_task FROM tasks WHERE name LIKE '%{$_SESSION['company']}%'";
$result = mysqli_query($conn, $query);
?>
<?php
if (mysqli_num_rows($result) > 0) {
  $sn = 1;
  while ($data = mysqli_fetch_assoc($result)) {
?>

    <div class="data-card">
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
      <div class="button-flex">
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
  const buttonTakeArr = Array.from(document.querySelectorAll('.btn-take'));
  buttonTakeArr.map((item, index) => item.addEventListener('click', () => {
    let id = document.querySelectorAll('.data-card')[index];
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
</script>
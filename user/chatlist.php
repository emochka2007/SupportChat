<div class="col-lg-8" style="font-family: 'didot', serif">
	<div class="panel panel-default" style="height:50px;">
		<span style="font-size:18px; margin-left:10px; position:relative; top:13px;">Список чатов</span>
		<h1>Компания <?php echo $_SESSION['company']; ?></h1>
		<div class="pull-right" style="margin-right:10px; margin-top:7px;">
			<a href="#add_chatroom" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Добавить</a>
		</div>
	</div>
	<table width="100%" class="table table-striped table-bordered table-hover" id="chatRoom">
		<thead>
			<tr>
				<th>Название чата </th>
				<th>Дата Создания</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include('session.php');
			//тут показываем чаты
			$query = mysqli_query($conn, "select * from chatroom where chat_name LIKE '%{$_SESSION['company']}%'");
			while ($row = mysqli_fetch_array($query)) {
			?>
				<tr>
					<input type="hidden" value="
				<?php
				$usera = array();
				$m = mysqli_query($conn, "select * from chat_member where chatroomid='" . $row['chatroomid'] . "'");
				while ($mrow = mysqli_fetch_array($m)) {
					$usera[] = $mrow['userid'];
				}
				//1 member
				if (in_array($_SESSION['id'], $usera)) {
					echo "1";
				} else {
					//2 not member w/ pass
					if (!empty($row['chat_password'])) {
						echo "2";
					} else {
						//3 not member w/o pass
						echo "3";
					}
				}
				?>
				
				" id="status<?php echo $row['chatroomid']; ?>">
					<td>
						<?php
						$num = mysqli_query($conn, "select * from chat_member where chatroomid='" . $row['chatroomid'] . "'");
						?>
						<span class="badge"><?php echo mysqli_num_rows($num); ?></span> <?php echo $row['chat_name']; ?>
					</td>
					<td><?php echo date('M d, Y - h:i A', strtotime($row['date_created'])); ?></td>
					<td><button value="<?php echo $row['chatroomid']; ?>" class="btn btn-info join_chat"><span class="glyphicon glyphicon-comment"></span>Зайти</button> &nbsp;
						<?php
						if (!empty($row['chat_password'])) {
							echo '<span class="glyphicon glyphicon-lock"></span>&nbsp;';
						}
						$qq = mysqli_query($conn, "select * from chat_member where chatroomid='" . $row['chatroomid'] . "' and userid='" . $_SESSION['id'] . "'");
						?>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
<script>
	console.log(<?= json_encode($user); ?>);
</script>
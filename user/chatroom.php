<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php

//получаем id
$id = $_REQUEST['id'];

//проверка на существование чата
$chatq = mysqli_query($conn, "select * from chatroom where chatroomid='$id'");
$chatrow = mysqli_fetch_array($chatq);

//проверка на существование пользователя чата
$cmem = mysqli_query($conn, "select * from chat_member where chatroomid='$id'");
?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row">
			<?php include('room.php'); ?>
		</div>
	</div>
	<?php include('room_modal.php'); ?>
	<?php include('out_modal.php'); ?>
	<?php include('modal.php'); ?>

	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.responsive.js"></script>
	<script>
		//отправить сообщение
		let value = document.querySelector('#send_msg').value;
		$(document).ready(function() {

			$('#myChatRoom').DataTable({
				"sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
				"bLengthChange": false,
				"bInfo": false,
				"bPaginate": true,
				"bFilter": false,
				"bSort": false,
				"pageLength": 8
			});

			//показать чат
			displayChat(value);

			//отправить сообщение
			$(document).on('click', '#send_msg', function() {
				let id = $(this).val();
				if ($('#chat_msg').val() == "") {
					alert('Please write message first');
				} else {
					$msg = $('#chat_msg').val();
					$.ajax({
						type: "POST",
						url: "send_message.php",
						data: {
							msg: $msg,
							id: id,
						},
						success: function() {
							$('#chat_msg').val("");
							displayChat(id);
						}
					});
				}
			});

			//подтвердить выход
			$(document).on('click', '#confirm_leave', function() {
				id = <?php echo $id; ?>;
				$('#leave_room').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					type: "POST",
					url: "leaveroom.php",
					data: {
						id: id,
						leave: 1,
					},
					success: function() {
						window.location.href = 'index.php';
					}
				});

			});

			//подвтердить удаление
			$(document).on('click', '#confirm_delete', function() {
				id = <?php echo $id; ?>;
				$('#confirm_delete').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					type: "POST",
					url: "deleteroom.php",
					data: {
						id: value,
						del: 1,
					},
					success: function() {
						window.location.href = 'index.php';
					}
				});

			});

			//отправка сообщений на клавишу enter
			$(document).keypress(function(e) {
				if (e.which == 13) {
					$("#send_msg").click();
				}
			});

			//
			$("#user_details").hover(function() {
				$('.showme').removeClass('hidden');
			}, function() {
				$('.showme').addClass('hidden');
			});

			//удалить
			$(document).on('click', '.delete2', function() {
				var rid = $(this).val();
				$('#delete_room2').modal('show');
				$('.modal-footer #confirm_delete2').val(rid);
			});


			//удаление комнаты
			$(document).on('click', '#confirm_delete2', function() {
				var nrid = $(this).val();
				$('#delete_room2').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					url: "deleteroom.php",
					method: "POST",
					data: {
						id: nrid,
						del: 1,
					},
					success: function() {
						window.location.href = 'index.php';
					}
				});
			});

			//покинуть комнату
			$(document).on('click', '.leave2', function() {
				var rid = $(this).val();
				$('#leave_room2').modal('show');
				$('.modal-footer #confirm_leave2').val(rid);
			});

			//подтвердить выход из комнаты
			$(document).on('click', '#confirm_leave2', function() {
				var nrid = $(this).val();
				$('#leave_room2').modal('hide');
				$('body').removeClass('modal-open');
				$('.modal-backdrop').remove();
				$.ajax({
					url: "leaveroom.php",
					method: "POST",
					data: {
						id: nrid,
						leave: 1,
					},
					success: function() {
						window.location.href = 'index.php';
					}
				});
			});
		});

		//показывать чат
		function displayChat(id) {
			$.ajax({
				url: 'fetch_chat.php',
				type: 'POST',
				async: false,
				data: {
					id: id,
					fetch: 1,
				},
				success: function(response) {
					$('#chat_area').html(response);
					$("#chat_area").scrollTop($("#chat_area")[0].scrollHeight);
				}
			});
		}
	</script>
</body>

</html>
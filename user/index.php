<?php include('session.php'); ?>
<?php include('header.php'); ?>

<body>
	<?php include('navbar.php'); ?>
	<div class="container-fluid">
		<div class="row">

			<?php include('chatlist.php'); ?>
		</div>
	</div>
	<?php include('password_modal.php'); ?>
	<?php include('out_modal.php'); ?>
	<?php include('modal.php'); ?>

	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
	<script src="../js/dataTables.responsive.js"></script>
	<script>
		$(document).ready(function() {

			// $('#chatRoom').DataTable({
			// 	"bLengthChange": true,
			// 	"bInfo": true,
			// 	"bPaginate": true,
			// 	"bFilter": true,
			// 	"bSort": false,
			// 	"pageLength": 7
			// });

			$('#myChatRoom').DataTable({
				"sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
				"bLengthChange": false,
				"bInfo": false,
				"bPaginate": true,
				"bFilter": false,
				"bSort": false,
				"pageLength": 8
			});

			//зайти в чат
			$(document).on('click', '.join_chat', function() {
				var cid = $(this).val();
				console.log(cid);
				if ($('#status' + cid).val() == 1) {
					window.location.href = 'chatroom.php?id=' + cid;
				} else if ($('#status' + cid).val() == 2) {
					window.location.href = 'chatroom.php?id=' + cid;
				} else {
					$.ajax({
						url: "addmember.php",
						method: "POST",
						data: {
							id: cid,
						},
						success: function() {
							window.location.href = 'chatroom.php?id=' + cid;
						}
					});
				}
			});


			//добавить комнату
			$(document).on('click', '#addchatroom', function() {
				chatname = $('#chat_name').val();
				chatpass = $('#chat_password').val();
				$.ajax({
					url: "add_chatroom.php",
					method: "POST",
					data: {
						chatname: chatname,
						chatpass: chatpass,
					},
					success: function(data) {
						data = data.split('').slice(0, 2).join('');
						window.location.href = 'chatroom.php?id=' + data;
					}
				});

			});
			//удалить 
			$(document).on('click', '.delete2', function() {
				var rid = $(this).val();
				$('#delete_room2').modal('show');
				$('.modal-footer #confirm_delete2').val(rid);
			});


			//подтвердить удаление комнаты
			$(document).on('click', '#confirm_delete2', function() {
				var nrid = $(this).val();
				console.log(nrid);
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
					// success: function() {
					// 	window.location.href = 'index.php';
					// }
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
	</script>
</body>

</html>
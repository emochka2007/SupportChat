<?php
include('session.php');


$fileInfo = PATHINFO($_FILES["image"]["name"]);

//проверка на то, что фото было загружено
if (empty($_FILES["image"]["name"])) {
	$location = $srow['photo'];
?>
	<script>
		window.alert('Uploaded photo is empty!');
		window.history.back();
	</script>
	<?php
} else {
	if ($fileInfo['extension'] == "jpg" or $fileInfo['extension'] == "png") {
		$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
		move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $newFilename);
		$location = "upload/" . $newFilename;

		//обновляем фото
		mysqli_query($conn, "update `user` set photo='$location' where userid='" . $_SESSION['id'] . "'");

	?>
		<script>
			window.alert('Фото обновлено');
			window.history.back();
		</script>
	<?php
	} else {
		//какая-то ошибка(скорее всего в разрешение)
	?>
		<script>
			window.alert('Ошибка в заргузке.Проверьте разрешение(png, jpg)');
			window.history.back();
		</script>
<?php
	}
}



?>
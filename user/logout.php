<?php
//удаляем сессию и перекидываем на сайт
	session_start();
	session_destroy();
	header('location:../');

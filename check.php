<?php
	$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
	$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
	$pass2 = filter_var(trim($_POST['pass2']), FILTER_SANITIZE_STRING);

	if(mb_strlen($login) < 5 || mb_strlen($login) > 90)
	{
		echo "Недопустимая длина логина";
		exit();
	}
	else if($pass != $pass2)
	{
		echo "Пароли не совпадают";
		exit();
	}
	else if(mb_strlen($pass) < 8 || mb_strlen($pass) > 90)
	{
		echo "Недопустимая длина пароля";
		exit();
	}

	$pass = md5($pass."shgdl435bdv");

	$mysql = new mysqli('localhost','root','1234','register-bd');
	$mysql -> query("INSERT INTO `users` (`login`, `pass`) VALUES('$login','$pass')");

	$mysql->close();

	header('Location: /');
?>
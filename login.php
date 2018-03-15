<?php
	defined("S") or session_start();
	if (isset($_POST["login"])) {
		$login = include __DIR__."/credentials.php";
		if (isset($login[$_POST["username"]]) && $login[$_POST["username"]]["pass"] === $_POST["password"]) {
			$_SESSION["path"] = $login[$_POST["username"]]["doc_root"];
			header("location:index.php");
			exit();
		} else {
			$alert = 1;
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		.dv {
			margin-top: 20px;
		}
	</style>
	<?php if (isset($alert)): ?>
	<script type="text/javascript">alert("Invalid username or password!");</script>
	<?php endif ?>
</head>
<body>
<center>
	<form method="post" action="">
		<div class="dv">
			<div>Username:</div>
			<div><input type="text" name="username"/></div>
		</div>
		<div class="dv">
			<div>Password: </div>
			<div><input type="password" name="password"/></div>
		</div>
		<div class="dv">
			<input type="submit" name="login" value="Login">
		</div>
	</form>
</center>
</body>
</html>
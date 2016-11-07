<?php

	include 'lib/include.php';

	if (isset($_POST['username']) && isset($_POST['password'])){

		$sql = "SELECT * FROM users WHERE username='" . $_POST['username'] . "' AND password='" . sha1($_POST['password']) . "'";

		$select = $db->query($sql);
		if ($select->rowCount() > 0){
			$_SESSION['Auth'] = $select->fetch();
			// setFlash('Vous êtes connecté');
			
			header('Location:' . WEB_ROOT . 'views/index.php');  
			die();
		}
	}

?>

<?php
	include 'partials/header.php'
?>

<ul class="menu">
	<li>
		<div class="connection">
			<h2 class="subtitle">Login</h2>
			<form action="#" method="post">
				<div class="formulaire username">
					<input type="text" name="username" placeholder="username">
				</div>
				<div class="formulaire password">
					<input type="password" id="password" name="password" placeholder="password">
				</div>
				<div class="btn-formulaire">
					<input type="submit" value="Se connecter">
				</div>
			</form>
		</div>
	</li>
	<li>
		<a class="btn-double" href="<?php echo WEB_ROOT . 'newuser.php'; ?>">New user</a>
		<a class="btn-double" href="<?php echo WEB_ROOT . 'forget.php'; ?>">forget my password</a>
	</li>
</ul>

<?php
	include 'partials/footer.php'
?>
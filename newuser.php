<?php

	include 'lib/include.php';

	if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){

		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

			$select = $db->query("SELECT * FROM users WHERE username='" . $_POST['username'] . "' OR " . "email='" . $_POST['email'] . "'");
			if ($select->rowCount() == 0) {
				if ($db->query("INSERT INTO users SET username='" . $_POST['username'] . "', password='" . sha1($_POST['password']) . "', email='" . $_POST['email'] + "'")) {
					mail( $_POST['email'] , "new count" , "Welcom to you " . $_POST['username'] . ", you successefully regiter to Camagru. lets start !!" );
					header('Location:'.WEB_ROOT.'index.php');
				} else {
					// FAIL
				}
			} else {
	//			setFlash('someone already use this username or email', 'error');		
			}
		} else {
			// MAIL IS NOT VALID
		}
	}

?>

<?php
	include 'partials/header.php'
?>

<ul class="menu">
	<li>
		<div class="connection">
			<h2 class="subtitle">New USER</h2>
			<form action="#" method="post">
				<div class="formulaire username">
					<input type="text"  name="username" placeholder="username">
				</div>
				<div class="formulaire email">
					<input type="email" name="email" placeholder="email">
				</div>
				<div class="formulaire password">
					<input type="password" id="password" name="password" placeholder="password">
				</div>
				<div class="btn-formulaire">
					<input type="submit" value="Creer mon compte">
				</div>
			</form>

		</div>
	</li>
	<li>
		<a class="btn-double" href="<?php echo WEB_ROOT.'index.php'; ?>">Login</a>
		<a class="btn-double" href="<?php echo WEB_ROOT.'forget.php'; ?>">forget my password</a>
	</li>
</ul>

<?php 
	include 'partials/footer.php'; 
?>

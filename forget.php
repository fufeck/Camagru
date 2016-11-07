<?php

	include 'lib/include.php';

	if (isset($_POST['email'])){

		$select = $db->query("SELECT * FROM users WHERE email='" . $_POST['email'] . "'");
		if ($select->rowCount() >= 1) {
			$token = hash('sha512', KEY . $_POST['email']);
			$reseturl = HTTP_ROOT . 'reset.php?token=' . $token;

			$bodymail = "Hello,\nIf you really want to reset your password follow this link " . $reseturl . "\nYour camagru Team";
			mail( $_POST['email'] , "Forget password" ,  $bodymail);
			// setFlash('an email have been sent');
		} else {
			// MAIL NON TROUVER
		}
	}

?>

<?php
	include 'partials/header.php'
?>

<ul class="menu">
	<li>
		<div class="connection">
		<h2 class="subtitle">Forget my password</h2>
			<form action="#" method="post">
				<div class="formulaire email">
					<input type="email" name="email" placeholder="email">
				</div>
				<div class="btn-formulaire">
					<input type="submit" value="Send mail">
				</div>
			</form>

		</div>
	</li>
	<li>
		<a class="btn-double" href="<?php echo WEB_ROOT.'index.php'; ?>">Login</a>
		<a class="btn-double" href="<?php echo WEB_ROOT.'newuser.php'; ?>">New user</a>
	</li>
</ul>

<?php 
	include 'partials/footer.php'; 
?>

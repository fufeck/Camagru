<?php

	include 'lib/include.php';

	if (isset($_POST['username']) && isset($_POST['q']) && isset($_POST['password'])){

		$select = $db->query("SELECT * FROM users WHERE username='" . $_POST['username'] . "'");
		if ($select->rowCount() >= 1) {

			$user = $select->fetch();
			$token = hash('sha512', KEY . $user['email']);

			if ($token == $_POST['q']) {
				$password = $db->quote(hash('sha1' , $_POST['password']));
				$db->query("UPDATE users SET password=" . $password . "WHERE username=" . $username);
				mail( $_POST['email'] , "new count" , $_POST['username'] . ", your password was successefully changed. lets start !!" );
				header('Location:' . WEB_ROOT . 'index.php');  

			} else {
				// hash Email and link doesn't match
				// setFlash('a problem happend la', 'error');
			}
		} else {
			// NPT FOUND
		}
	}

?>

<?php
	include 'partials/header.php'
?>

<div class="connection">
	<h2 class="subtitle">RESET PASSWORD</h2>
	<form action="#" method="post">
		<div class="formulaire username">
			<input type="text"  name="username" placeholder="username">
		</div>
		<div class="formulaire password">
			<input type="password" id="password" name="password" placeholder="new password">
		</div>
		<input type="hidden" name="q" value="<?php if (isset($_GET["token"])) { echo $_GET["token"];} ?>" />		
		<div class="btn-formulaire">
			<input type="submit" value="Reset">
		</div>
	</form>
</div>


<?php
	include 'partials/footer.php'; 
?>


<?php 
include_once 'partial/header.php';
include_once 'partial/navbar.php'; 
if(isLogin()){
	header('location:'.URLROOT);
}
?>

<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="card-panel center-align">
				<h3>Login here</h3>
			</div>
		</div>
		<?php if(isset($_GET['msg'])){ ?>
		<div class="col s12 red z-depth-3 mb4">
			<p class="white-text"><?php echo $_GET['msg']; ?></p>
		</div>
		<?php } ?>
		<form action="inc/login.inc.php" method="POST" class="col s12 mt4">
			<div class="input-field">
				<input type="text" name="user_name" value="<?php echo(empty($_GET['user_name'])?"":$_GET['user_name']);?>">
				<label for="user_name">User name or email</label>
			</div>
			<div class="input-field">
				<input type="password" name="user_password" value="<?php echo(empty($_GET['password'])?"":$_GET['password']);?>">
				<label for="user_password">password</label>
			</div>
			<button type="submit" name="submit" class="btn">Login</button>
		</form>
	</div>
</div>


<?php include_once 'partial/footer.php'; ?>
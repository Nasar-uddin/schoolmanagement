<nav class="teal lighten-1">
	<div class="nav-wraper">
		<div class="container">
			<a href="<?php echo URLROOT; ?>" class="brand-logo">MRSH</a>
			<ul class="right">
				<li><a href="<?php echo URLROOT; ?>">Home</a></li>
				<?php if(!isLogin()){?>
				<li><a href="<?php echo URLROOT ?>/login">Login</a></li>
				<?php } if(isLogin()){?>
					<li><a href="<?php echo URLROOT;?>/dashbord">Dashbord</a></li>
					<li><a href="<?php echo URLROOT ?>/inc/logout.inc.php">Log out</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</nav>

<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<style>
	html,
	body {
		height: 100%;
		margin: 0;
		padding: 0;
		font-family: sans-serif;
	}

	body {
		display: flex;
		justify-content: center;
		align-items: center;
		background: linear-gradient(to right, #fc5c7d, #6a82fb);
	}

	.background-picture {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
		z-index: -1;
		opacity: 20%;
	}

	.login-box {
		width: 400px;
		padding: 40px;
		background: rgba(0, 0, 0, .8);
		box-sizing: border-box;
		box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
		border-radius: 10px;
	}

	.login-box h2 {
		margin: 0 0 30px;
		padding: 0;
		color: #fff;
		text-align: center;
	}

	.login-box-msg {
		color: #cfcfcf;
	}

	.login-box .user-box {
		position: relative;
	}

	.login-box .user-box input {
		width: 100%;
		padding: 10px 0;
		font-size: 16px;
		color: #ffffff;
		margin-bottom: 30px;
		border: none;
		border-bottom: 1px solid #fff;
		outline: none;
		background: transparent;
	}

	.login-box .user-box label {
		position: absolute;
		top: 0;
		left: 0;
		padding: 10px 0;
		font-size: 16px;
		color: #fff;
		pointer-events: none;
		transition: .5s;
	}

	.login-box .user-box input:focus~label,
	.login-box .user-box input:valid~label {
		top: -20px;
		left: 0;
		color: #ff8080;
		font-size: 12px;
	}

	.button-container {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.login-box form button {
		position: relative;
		background: transparent;
		border: none;
		display: inline-block;
		padding: 10px 20px;
		color: #ff8080;
		font-size: 16px;
		text-decoration: none;
		text-transform: uppercase;
		overflow: hidden;
		transition: .5s;
		margin-top: 40px;
		letter-spacing: 4px
	}

	.login-box button:hover {
		background: #ff8080;
		color: #fff;
		border-radius: 5px;
		box-shadow: 0 0 5px #ff8080,
			0 0 25px #ff8080,
			0 0 50px #ff8080,
			0 0 100px #ff8080;
	}

	.login-box button span {
		position: absolute;
		display: block;
	}

	.login-box button span:nth-child(1) {
		top: 0;
		left: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(90deg, transparent, #ff8080);
		animation: btn-anim1 1s linear infinite;
	}

	@keyframes btn-anim1 {
		0% {
			left: -100%;
		}

		50%,
		100% {
			left: 100%;
		}
	}

	.login-box button span:nth-child(2) {
		top: -100%;
		right: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(180deg, transparent, #ff8080);
		animation: btn-anim2 1s linear infinite;
		animation-delay: .25s
	}

	@keyframes btn-anim2 {
		0% {
			top: -100%;
		}

		50%,
		100% {
			top: 100%;
		}
	}

	.login-box button span:nth-child(3) {
		bottom: 0;
		right: -100%;
		width: 100%;
		height: 2px;
		background: linear-gradient(270deg, transparent, #ff8080);
		animation: btn-anim3 1s linear infinite;
		animation-delay: .5s
	}

	@keyframes btn-anim3 {
		0% {
			right: -100%;
		}

		50%,
		100% {
			right: 100%;
		}
	}

	.login-box button span:nth-child(4) {
		bottom: -100%;
		left: 0;
		width: 2px;
		height: 100%;
		background: linear-gradient(360deg, transparent, #ff8080);
		animation: btn-anim4 1s linear infinite;
		animation-delay: .75s
	}

	@keyframes btn-anim4 {
		0% {
			bottom: -100%;
		}

		50%,
		100% {
			bottom: 100%;
		}
	}
</style>

<body>
	<img class="background-picture" src="images/login-background.png">

	<div class="login-box">
		<h2>SUC Online Voting System</h2>
		<form action="login.php" method="POST">
			<div class="user-box">
				<input type="text" name="username" placeholder="Username" required>
				<span class="glyphicon glyphicon-user form-control-feedback"></span>
			</div>
			`
			<div class="user-box">
				<input type="password" name="password" placeholder="Password" required>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="button-container">
				<button type="submit" name="login">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					Sign In
				</button>
			</div>
			<p class="voter-link" style="color:whitesmoke; text-align:center; margin-top: 10px;">Are you an voter? <a href="../login.php" style="color:#fc5c7d"><b>Log in here</b></a>.</p>
		</form>
	</div>

	<?php
	if (isset($_SESSION['error'])) {
		echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
		unset($_SESSION['error']);
	}
	?>
	</div>

	<?php include 'includes/scripts.php' ?>
</body>

</html>
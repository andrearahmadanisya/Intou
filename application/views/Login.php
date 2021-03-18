<html>

<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php base_url(); ?>assets/css/login.css" type="text/css" />
	<!------ Include the above in your HEAD tag ---------->
</head>

<body class="login">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="row" style="margin-top:70px">
					<div class="col-md-6">
						<ul class="text-center"><a>USER LOGIN</a></ul>
						<form action="<?= site_url('LoginController') ?>" method="post" accept-charset="utf-8">
							<div class="form-group">
								<label class="label control-label">Username</label>
								<input type="username" class="form-control" name="username" placeholder="Username">
							</div>

							<div class="form-group">
								<label class="label control-label">Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>

							<button type="submit" class="btn btn-info">Login</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

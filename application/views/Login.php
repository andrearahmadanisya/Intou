<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-lg-7">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Wellcome to IntoU</h1>
								</div>

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
								<hr>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

</div>

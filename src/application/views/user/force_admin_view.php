<div class="halaman-user" style="height: calc(100vh - 100px)">
	<div class="container p-3">
		<div class="text-center">
			<h5>Admin Forced Login</h5>
		</div>
		<form action="force-admin?r=login" method="post">
			<div class="row">
				<div class="mx-auto col-md-6">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input type="password" class="form-control" name="admin-password" placeholder="Password" minlength="6" required>
					</div>
					<input type="submit" class="btn btn-block btn-dark" value="Login">
				</div>
			</div>
		</form>
	</div>
</div>

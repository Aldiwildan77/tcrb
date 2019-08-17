<div class="container p-3" style="height: 65vh">
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
					<input type="password" class="form-control" name="admin-password" placeholder="Password">
				</div>
				<input type="submit" class="btn btn-block btn-outline-primary" value="Login">
			</div>
		</div>
	</form>
</div>

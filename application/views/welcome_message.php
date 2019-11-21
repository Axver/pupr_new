<?php
if($this->session->userdata("privilage"))
{
	if($this->session->userdata("privilage")==1)
	{
		redirect(base_url('admin'));
	}
	else if($this->session->userdata("privilage")==2)
	{
		redirect(base_url('user'));
	}
}
else
{
//	Ubah Redirectnya

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<?php $this->load->view('component/header') ?>
	<script src="<?php echo base_url('assets/myscript.js') ?>"></script>

</head>

<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-lg-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block" style="background-image: url('<?php echo base_url("assets/img/login_bg.jpg") ?>');background-size: cover;">

						</div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
								</div>
								<form class="user" action="login" method="post">
									<div class="form-group">
										<input type="text" class="form-control form-control-user" id="username" name="username"  placeholder="Username">
									</div>
									<div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
									</div>

									<input  type="submit" class="btn btn-primary btn-user btn-block">
									<hr>
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


</body>

</html>

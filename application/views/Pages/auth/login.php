<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url('/assets/mazer/') ?>assets/extensions/sweetalert2/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url('/assets/mazer/') ?>assets/compiled/css/app.css">
	<link rel="stylesheet" href="<?= base_url('/assets/mazer/') ?>assets/compiled/css/app-dark.css">
	<link rel="stylesheet" href="<?= base_url('/assets/mazer/') ?>assets/compiled/css/auth.css">
</head>

<body>
	<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/initTheme.js"></script>
	<div id="auth">
		<div class="row h-100">
			<div class="col-lg-5 col-12">
				<div id="auth-left">
					<div class="auth-logo">
						<a href="index.html"><img src="<?= base_url('/assets/mazer/') ?>assets/compiled/svg/logo.svg" alt="Logo"></a>
					</div>
					<h1 class="auth-title">Log in.</h1>
					<p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

					<?= form_open('Auth/Login/process');?>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="text" id="username" name="username" class="form-control form-control-xl" placeholder="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
					<?= form_close(); ?>
					<div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Don't have an account? <a href="<?= site_url('auth/register') ?>" class="font-bold">Sign up</a>.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">

				</div>
			</div>
		</div>
	</div>

	<!-- JQuery -->
	<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>
	<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/sweetalert2/sweetalert2.min.js"></script>
	<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/pages/sweetalert2.js"></script>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			document.getElementById('username').focus();
		});
	</script>

	<!-- //? Alert if success -->
	<?php if ($this->session->flashdata('success')): ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: '<?php echo $this->session->flashdata('success'); ?>'
			});
		</script>
	<?php endif; ?>

	<!-- //? Alert if error -->
	<?php if ($this->session->flashdata('error')): ?>
		<script>
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: '<?php echo $this->session->flashdata('error'); ?>'
			});
		</script>
	<?php endif; ?>
</body>

</html>

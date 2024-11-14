<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
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
						<a href="<?= site_url('Index') ?>"><img src="<?= base_url('/assets/mazer/') ?>assets/compiled/svg/logo.svg" alt="Logo"></a>
					</div>
					<h1 class="auth-title">Sign Up</h1>
					<p class="auth-subtitle mb-5">Input your data to register to our website.</p>

					<?= form_open('Auth/Register/process'); ?>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" name="namaLengkap" class="form-control form-control-xl" id="full-name" placeholder="Name">
						<div class="form-control-icon">
							<i class="bi bi-person"></i>
						</div>
						<?= form_error('namaLengkap', '<h6 class="text-danger mt-2">', '</h6>') ?>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="text" name="username" class="form-control form-control-xl" placeholder="Username">
						<div class="form-control-icon">
							<i class="bi bi-person"></i>
						</div>
						<?= form_error('username', '<h6 class="text-danger mt-2">', '</h6>') ?>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
						<div class="form-control-icon">
							<i class="bi bi-envelope"></i>
						</div>
						<?= form_error('email', '<h6 class="text-danger mt-2">', '</h6>') ?>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<textarea name="alamat" class="form-control form-control-xl" placeholder="Address" id=""></textarea>
						<div class="form-control-icon">
							<i class="bi bi-geo-alt"></i>
						</div>
						<?= form_error('alamat', '<h6 class="text-danger mt-2">', '</h6>') ?>
					</div>
					<div class="form-group position-relative has-icon-left mb-4">
						<input type="password" name="password" class="form-control form-control-xl" placeholder="Password">
						<div class="form-control-icon">
							<i class="bi bi-shield-lock"></i>
						</div>
						<?= form_error('password', '<h6 class="text-danger mt-2">', '</h6>') ?>
					</div>
					<button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
					<?= form_close() ?>
					<div class="text-center mt-5 text-lg fs-4">
						<p class='text-gray-600'>Already have an account? <a href="<?= site_url('auth/login') ?>" class="font-bold">Log in</a>.</p>
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">
					<!-- Optional content -->
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
			document.getElementById('full-name').focus();
		});
	</script>

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

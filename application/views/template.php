<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Perpustakaan</title>
	<!-- Connection CSS  -->
	<?php include 'Pages/assets/__css.php' ?>

	<style>
		.togel {
			display: flex;
			justify-content: flex-end;
			align-items: center;
		}
	</style>
</head>

<body>
	<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/initTheme.js"></script>
	<div id="app">
		<div id="main" class="layout-horizontal">
			<header class="mb-5">
				<div class="header-top">
					<div class="container">
						<div class="logo">
							<a href="index.html"><img src="<?= base_url('/assets/mazer/') ?>assets/compiled/svg/logo.svg" alt="Logo"></a>
						</div>
						<div class="header-top-right">
							<?php if ($this->session->userdata('level') == TRUE): ?>
								<div class="dropdown">
									<a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
										<div class="avatar avatar-md2">
											<img src="<?= base_url('/assets/mazer/') ?>assets/compiled/jpg/1.jpg" alt="Avatar">
										</div>
										<div class="text">
											<h6 class="user-dropdown-name"><?= $this->session->userdata('username') ?></h6>
											<p class="user-dropdown-status text-sm text-muted"><?= $this->session->userdata('level') ?></p>
										</div>
									</a>
									<ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
										<li>
											<a class="dropdown-item" href="#">My Account</a>
										</li>
										<li>
											<a class="dropdown-item" href="#">Settings</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="<?= site_url('Auth/Logout') ?>">Logout</a></li>
									</ul>
								</div>
							<?php endif; ?>

							<!-- Burger button responsive -->
							<a href="#" class="burger-btn d-block d-xl-none">
								<i class="bi bi-justify fs-3"></i>
							</a>
						</div>
					</div>
				</div>

				<!-- Config Navbar -->
				<?php include 'Pages/assets/__navbar.php' ?>
			</header>

			<!-- Section content -->
			<div class="content-wrapper container">
				<?= $contents; ?>
			</div>
			<!-- End Section Content -->

			<!-- Connection Footer  -->
			<?php include 'Pages/assets/__footer.php' ?>
		</div>
	</div>

	<!-- Connection Js  -->
	<?php include 'Pages/assets/___js.php' ?>

	<!-- Alert if success -->
	<?php if ($this->session->flashdata('success')): ?>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: '<?php echo $this->session->flashdata('success'); ?>'
			});
		</script>
	<?php endif; ?>

</body>

</html>

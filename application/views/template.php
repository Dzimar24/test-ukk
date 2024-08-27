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
				<?php include 'Pages/assets/__header.php' ?>

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

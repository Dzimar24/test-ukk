<div class="header-top">
	<div class="container">
		<div class="logo">
			<a href="index.html"><img src="<?= base_url('/assets/mazer/') ?>assets/compiled/svg/logo.svg" alt="Logo"></a>
		</div>
		<div class="header-top-right">
			<?php if ($this->session->userdata('level') == TRUE): ?>
				<div class="dropdown">
					<a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
						data-bs-toggle="dropdown" aria-expanded="false">
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
						<li><a class="dropdown-item button-log-out" href="<?= site_url('Auth/Logout') ?>">Logout</a></li>
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

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<script>
	$('.button-log-out').on('click', function(e) {
		e.preventDefault();
		const url = $(this).attr('href');
		
		Swal.fire({
			title: "Are you sure?",
			text: "Are you sure you want to log out ?",
			icon: "question",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!"
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = url;
			}
		});
	});
</script>

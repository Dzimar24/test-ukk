<nav class="main-navbar">
	<div class="container">
		<ul class="d-flex justify-content-start">
			<li class="menu-item">
				<a href="<?= site_url('Index') ?>" class='menu-link'>
					<span><i class="bi bi-collection"></i> Collection</span>
				</a>
			</li>
			<li class="menu-item">
				<a href="#" class='menu-link'>
					<span><i class="bi bi-list-task"></i> Category Book</span>
				</a>
			</li>
			<li class="menu-item">
				<a href="<?= site_url('Admin/User') ?>" class='menu-link'>
					<span><i class="bi bi-person"></i> User</span>
				</a>
			</li>
			<?php if($this->session->userdata('level') == true) : ?>
				
			<?php else: ?>
				<li class="menu-item">
					<a href="<?= site_url('Auth/Login') ?>" class='menu-link'>
						<span><i class="bi bi-box-arrow-in-right"></i> Login</span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</nav>

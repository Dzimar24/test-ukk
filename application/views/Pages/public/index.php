<!-- Title Content -->
<div class="page-heading">
	<h3>Collection Book</h3>
</div>
<!-- End Title Content -->
<style>
	.custom-card {
		box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset;
	}

	.custom-card:hover {
		box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
	}

	.span-custom {
		font-size: 13px;
	}

	/* Single line truncation */
	.truncate-text {
		color: #435EBE;
		white-space: nowrap;      /* Membuat teks berada dalam satu baris */
		overflow: hidden;         /* Menyembunyikan teks yang melebihi lebar elemen */
		text-overflow: ellipsis;  /* Menambahkan elipsis (...) di akhir teks yang terpotong */
		max-width: 150px;         /* Sesuaikan dengan panjang maksimum teks yang diizinkan */
		display: inline-block;    /* Membuat elemen berperilaku sebagai block di dalam baris */
	}

	.book-cover-container {
		width: 100%;
		padding-top: 150%;
		/* Aspect ratio 2:3 (typical book cover ratio) */
		position: relative;
		overflow: hidden;
		border-radius: 0.5rem;
		/* Rounded corners, adjust as needed */
	}

	.book-cover-image {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		object-fit: cover;
	}

	.popover {
		max-width: 400px;
	}

	.popover-body {
		font-size: 0.9em;
		color: #333;
	}

	.popover-header {
		background-color: #f0f0f0;
		font-weight: bold;
		color: #333;
		border-bottom: 1px solid #ddd;
	}
</style>
<!-- Page Content -->
<div class="page-content">
	<div class="row">
		<?php foreach ($viewDataBook as $vdb): ?>
			<div class="col-md-2 col-sm-12 rounded-5">
				<div class="card custom-card">
					<div class="card-content">
						<a href="#" class="card-link" style="color: #25396F;" target="_blank">
							<div class="book-cover-container">
								<img class="book-cover-image" src="<?= base_url('/assets/uploads/coverBook/' . $vdb['coverBook']) ?>" alt="Cover buku <?= $vdb['Judul'] ?>" onerror="this.src='<?= base_url('path/to/fallback/image.jpg') ?>';">
							</div>
							<div class="card-body">
								<div class="d-inline-block mb-2 me-1">
									<a href="#" class="custom-tooltip" data-bs-toggle="popover" data-bs-html="true" title="<?= $vdb['Judul'] ?>" data-bs-content='
										<div>
											<p>
												<strong>By:</strong>
											</p>
											<p>
												<strong>Published:</strong>
											</p>
											<p>
												<strong>Views:</strong>  
												<strong>Avg Rating:</strong> 
												<strong>Reviews:</strong>
											</p>
											<p>
												<strong>Topics:</strong>
											</p>
											<p>
												<strong>Collections:</strong>
											</p>
										</div>'>
										<h5 class="truncate-text"><?= $vdb['Judul'] ?></h5>
									</a>
								</div>
								<span class="span-custom">Publisher 2018</span>
							</div>
							<div class="btn-group align-items-center mx-2 px-1">
								<button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
									<i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
								</button>
								<button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
									<i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
								</button>
								<button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
									<i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
								</button>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- End Page Content -->

<script>
	document.addEventListener('DOMContentLoaded', function () {
		var popoverTriggerList = [].slice.call(document.querySelectorAll('.custom-tooltip'));
		var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
			return new bootstrap.Popover(popoverTriggerEl, {
				trigger: 'hover',
				placement: 'auto',
				html: true,
			});
		});
	});
</script>

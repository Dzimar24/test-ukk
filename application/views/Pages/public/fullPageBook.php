<style>
	.custom-title {
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
	}

	.custom-img-container {
		max-width: 300px;
		/* Ubah lebar sesuai kebutuhan */
		max-height: 500px;
		/* Ubah tinggi sesuai kebutuhan */
		border-radius: 1rem;
		margin-bottom: 10px;
		overflow: hidden;
		position: relative;
		box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
	}

	.custom-img {
		width: 100%;
		height: 100%;
		border-radius: 1rem;
		/* Opsional: menambahkan border radius */
		object-fit: contain;
		/* Atur agar gambar menyesuaikan dengan kontainer */
	}

	.container-custom {
		margin-bottom: auto;
	}

	.card-custom{
		background-color: #ffffff;
		border-radius: 1rem;
		box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
		margin-right: 10px;
	}

	.custom-p {
		color: #000000;
	}

	.info-container {
		margin-left: 10px;
		padding: 20px;
		border-radius: 8px; /* Membuat sudut melengkung */
		color: #000000; /* Warna teks putih */
	}

	.info-item {
		margin-bottom: 8px; /* Jarak antar item */
		font-size: 15px; /* Ukuran font */
	}

	.label {
		font-weight: bold; /* Membuat label tebal */
		display: inline-block;
		width: 100px; /* Lebar label yang konsisten */
	}

	.content {
		margin-left: 15px;
		color: #000000; /* Warna teks untuk konten */
	}

</style>

<?php foreach ($viewFullDataBook as $vfdb) : ?>
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="container container-custom">
					<h1 class="custom-title"><?= $vfdb['Judul'] ?></h1>
					<div class="row">
						<div class="col-md-4">
							<div class="custom-img-container">
								<img src="<?= base_url('/assets/uploads/coverBook/'. $vfdb['coverBook']) ?>" alt="Image Error" class="custom-img">
							</div>
						</div>
						<div class="col-md-8 mt-4">
							<ul class="nav nav-tabs " id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Overview</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Details</a>
								</li>
							</ul>
							<div class="card mt-4">
								<div class="tab-content" id="myTabContent">
									<!-- Tab Content Description -->
									<div class="tab-pane fade show active card-content" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card-body card-custom">
											<p class="my-2 custom-p">
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut nulla
												neque. Ut hendrerit nulla a euismod pretium.
												Fusce venenatis sagittis ex efficitur suscipit. In tempor mattis fringilla. Sed id
												tincidunt orci, et volutpat ligula.
												Aliquam sollicitudin sagittis ex, a rhoncus nisl feugiat quis. Lorem ipsum dolor sit
												amet, consectetur adipiscing elit.
												Nunc ultricies ligula a tempor vulputate. Suspendisse pretium mollis ultrices.
											</p>
										</div>
									</div>
									<!-- End Tab Content Description -->

									<!-- Tab Content Information -->
									<div class="tab-pane fade card-content" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="card-body card-custom">
											<p class="">
												<div class="info-container">
													<div class="info-item">
														<span class="label">Title</span>
														<span class="content">별을 품은 소드마스터</span>
													</div>
													<div class="info-item">
														<span class="label">Author(s)</span>
														<span class="content">Hong Dae-Wui, Q10</span>
													</div>
													<div class="info-item">
														<span class="label">Artist(s)</span>
														<span class="content">Juno</span>
													</div>
													<div class="info-item">
														<span class="label">Genre(s)</span>
														<span class="content">Action, Adventure, Fantasy, Project</span>
													</div>
													<div class="info-item">
														<span class="label">Publisher</span>
														<span class="content">Manhwa</span>
													</div>
													<div class="info-item">
														<span class="label">Publish Date</span>
														<span class="content">Updating</span>
													</div>
													<div class="info-item">
														<span class="label">Status</span>
														<span class="content">Available</span>
													</div>
												</div>
											</p>
										</div>
									</div>
									<!-- End Tab Content Information -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

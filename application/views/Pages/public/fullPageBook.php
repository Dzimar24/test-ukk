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

	.span-custom {
		margin-top: 2px;
		height: 30px;
		width: 160px;
		font-size: 20px;
	}

	.card-custom-comment {
		margin: 25px 50px 10px 50px;
		background-color: #ffffff;
		border-radius: 1rem;
		box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
	}

	.p-custom-comment {
		color: #000000;
		font-size: 15px;
	}

	.row-custom {
		display: flex;
		align-items: center; /* Menyelaraskan elemen secara vertikal */
	}

	.h1-custom {
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
		margin: 0;
	}

	.button-custom {
		margin-left: auto;
	}

	.rating-section {
		margin-top: 10px;
	}

	.stars {
		display: flex;
		gap: 5px;
		justify-content: flex-start;
		margin-top: 5px;
	}

	.stars label {
		font-size: 24px;
		color: #ccc;
		cursor: pointer;
		transition: color 0.2s ease-in-out;
	}

	.stars input[type="radio"] {
		display: none; /* Sembunyikan input radio */
	}

	.stars input[type="radio"]:checked ~ label,
	.stars label:hover,
	.stars label:hover ~ label {
		color: gold; /* Warna bintang saat dipilih dan di-hover */
	}

	.stars label:hover ~ label,
	.stars input[type="radio"]:checked ~ label {
		color: #ccc; /* Mengembalikan bintang yang tidak di-hover ke warna abu-abu */
	}

	.star-custom {
		color: gold;
	}

	.dropdown-menu.dropdown-custom {
		margin-top: 0px !important; 
		top: 100%;
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
												<?= $vfdb['deskripsi'] ?>
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
														<span class="content"><?= $vfdb['Judul'] ?></span>
													</div>
													<div class="info-item">
														<span class="label">Author(s)</span>
														<span class="content"><?= $vfdb['Penulis'] ?></span>
													</div>
													<div class="info-item">
														<span class="label">Genre(s)</span>
														<span class="content"><?= $vfdb['NamaKategori'] ?></span>
													</div>
													<div class="info-item">
														<span class="label">Publisher</span>
														<span class="content"><?= $vfdb['Penerbit'] ?></span>
													</div>
													<div class="info-item">
														<span class="label">Publish Date</span>
														<span class="content"><?= date('l, d F Y', strtotime($vfdb['TahunTerbit'])); ?></span>
													</div>
													<div class="info-item">
														<span class="label">Status</span>
														<?php if ($vfdb['status_buku'] == 'available') : ?>
															<span class="badge bg-light-success span-custom content" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is available and can be borrowed.">Available</span>
														<?php else : ?>
															<span class="badge bg-light-danger span-custom content" style="cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is unavailable and cannot be borrowed.">Not Available</span>
														<?php endif; ?>
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

	<!-- Modal Rating -->
	<div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ratingModalLabel">Add Review</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<?= form_open('Index/Review', ['id' => 'reviewForm']); ?>
					<input type="hidden" name="idBook" value="<?= $vfdb['BukuID'] ?>">
					<div class="modal-body">
						<div class="mb-3">
							<label for="commentText" class="form-label">Comment:</label>
							<textarea class="form-control" id="dark" name="comment" rows="5" placeholder="Share your thoughts about this book..." required></textarea>
						</div>
						<div class="rating-section mb-3">
							<label for="rating">Rating:</label>
							<div class="stars">
								<input type="radio" id="rate-1" name="rating" value="1">
								<label for="rate-1" class="bi bi-star" onclick="updateStars(1)"></label>
								<input type="radio" id="rate-2" name="rating" value="2">
								<label for="rate-2" class="bi bi-star" onclick="updateStars(2)"></label>
								<input type="radio" id="rate-3" name="rating" value="3">
								<label for="rate-3" class="bi bi-star" onclick="updateStars(3)"></label>
								<input type="radio" id="rate-4" name="rating" value="4">
								<label for="rate-4" class="bi bi-star" onclick="updateStars(4)"></label>
								<input type="radio" id="rate-5" name="rating" value="5">
								<label for="rate-5" class="bi bi-star" onclick="updateStars(5)"></label>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" id="submitReview">Submit Review</button>
					</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
	<!-- End Modal Rating -->
<?php endforeach; ?>

<div class="card mt-5">
	<div class="card-content">
		<div class="card-body">
			<div class="container container-custom">
				<div class="row-custom align-items-center">
					<h1 class="text-center mx-auto h1-custom">Comment</h1>
					<button class="ms-auto button-custom btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ratingModal">
						<i class="bi bi-chat-right-dots"></i>
					</button>
				</div>
				<div class="row">
					<?php if(empty($viewDataReview)) : ?>
						<div class="tab-pane fade show active card-content" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="card-body card-custom-comment">
								<span>This book has not been reviewed</span>
							</div>
						</div>
					<?php else : ?>
						<?php foreach ($viewDataReview as $vdr) : ?>
							<div class="tab-pane fade show active card-content" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="card-body card-custom-comment">
									<div class="d-flex align-items-center">
										<h6 class="mb-0"><?= $vdr['Username'] ?></h6>
										<?php if ($vdr['UserID'] == $this->session->userdata('UserID')) : ?>
											<button class="ms-auto btn" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
												<i class="bi bi-three-dots-vertical"></i>
											</button>
										<?php else : ?>

										<?php endif; ?>
										<div class="dropdown-menu dropdown-custom" aria-labelledby="dropdownMenuOffset">
											<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ratingUpdateModal<?= $vdr['UlasanID'] ?>">Update Review</a>
											<a class="dropdown-item button-delete" href="<?= site_url('Index/DeleteReview/'. $vdr['UlasanID']) ?>">Delete Review</a>
										</div>
									</div>
									<input type="hidden" id="rating" value="<?= $vdr['Rating'] ?>">
									<div class="row mb-3">
										<i class="bi bi-star-fill" id="star1"></i>
										<i class="bi bi-star-fill" id="star2"></i>
										<i class="bi bi-star-fill" id="star3"></i>
										<i class="bi bi-star-fill" id="star4"></i>
										<i class="bi bi-star-fill" id="star5"></i>
									</div>
									<p class="my-2 p-custom-comment">
										<?= $vdr['Ulasan'] ?>
									</p>
								</div>
							</div>
							<!-- Modal Update Rating -->
							<div class="modal fade" id="ratingUpdateModal<?= $vdr['UlasanID'] ?>" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="ratingModalLabel">Add Review</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<?= form_open('Index/EditReview'); ?>
											<input type="hidden" name="idReview" value="<?= $vdr['UlasanID'] ?>">
											<div class="modal-body">
												<div class="mb-3">
													<label for="commentText" class="form-label">Comment:</label>
													<textarea class="form-control" id="dark" name="commentUpdate" rows="5"><?= $vdr['Ulasan'] ?></textarea>
												</div>
												<div class="rating-section mb-3">
													<label for="rating">Rating:</label>
													<div class="stars">
														<select name="ratingUpdate" id="rating" class="form-select">
															<option value="1" <?= $vdr['Rating'] == '1' ? 'selected' : ''; ?>>⭐</option>
															<option value="2" <?= $vdr['Rating'] == '2' ? 'selected' : ''; ?>>⭐⭐</option>
															<option value="3" <?= $vdr['Rating'] == '3' ? 'selected' : ''; ?>>⭐⭐⭐</option>
															<option value="4" <?= $vdr['Rating'] == '4' ? 'selected' : ''; ?>>⭐⭐⭐⭐</option>
															<option value="5" <?= $vdr['Rating'] == '5' ? 'selected' : ''; ?>>⭐⭐⭐⭐⭐</option>
														</select>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
												<button type="submit" class="btn btn-primary" id="submitReview">Submit Review</button>
											</div>
										<?= form_close(); ?>
									</div>
								</div>
							</div>
							<!-- End Modal Update Rating -->
						<?php endforeach; ?>
						
					<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
</div>

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<!-- //? Alert if success -->
<?php if ($this->session->flashdata('success')): ?>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			Swal.fire({
				icon: 'success',
				title: 'Success!',
				text: '<?php echo $this->session->flashdata('success'); ?>'
			});
		});
	</script>
<?php endif; ?>

<!-- //? Alert if error -->
<?php if ($this->session->flashdata('error')): ?>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: '<?php echo $this->session->flashdata('error'); ?>'
			});
		});
	</script>
<?php endif; ?>

<script>
	function updateStars(rating) {
		// Reset semua bintang menjadi warna default
		const stars = document.querySelectorAll('.stars label');
		stars.forEach((star, index) => {
			if (index < rating) {
				star.style.color = 'gold'; // Bintang hingga rating yang dipilih akan berwarna emas
			} else {
				star.style.color = '#ccc'; // Bintang di atas rating yang dipilih akan berwarna abu-abu
			}
		});

		// Set input radio sesuai rating yang dipilih
		document.querySelector(`input#rate-${rating}`).checked = true;
	}

	function setRating(rating) {
		// Loop melalui setiap ikon bintang
		for (let i = 1; i <= 5; i++) {
			const star = document.getElementById(`star${i}`);
			// Tambahkan atau hapus kelas 'star-custom' berdasarkan nilai rating
			if (i <= rating) {
				star.classList.add('star-custom');
			} else {
				star.classList.remove('star-custom');
			}
		}
	}

	const valueRating = document.getElementById('rating').value;

	// Atur rating (misalnya, rating 3)
	setRating(valueRating);

	$(".button-delete").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");

		Swal.fire({
			title: "Are you sure",
			text: "Are you sure you want to delete the review",
			icon: "question",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete !",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		});
	});
</script>

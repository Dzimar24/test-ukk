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

	.book-card {
		display: flex;
		flex-direction: column;
		justify-content: flex-start;
		height: 100%;
		padding: 10px; /* Tambahkan padding di sini untuk memberi ruang di dalam card */
	}

	.truncate-text {
		color: #435EBE;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		max-width: 150px;
		display: block; /* Ubah menjadi block untuk menghilangkan jarak inline */
		margin-bottom: 5px; /* Beri sedikit jarak ke bawah */
	}

	.card-body {
		padding: 0;
	}

	.card-footer {
		margin: 0;
		padding: 0;
	}

	.span-custom {
		margin-top: 10px;
		font-size: 13px;
		color: #7a7a7a;
		display: block; /* Ubah menjadi block untuk menghilangkan jarak inline */
		line-height: 1; /* Sesuaikan line-height agar tidak ada jarak ekstra */
	}

	.book-cover-container {
		width: 100%;
		padding-top: 150%;
		position: relative;
		overflow: hidden;
		border-radius: 0.5rem;
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
		<?php foreach ($viewDataBook as $vdb): 
			$popoverContent = htmlspecialchars(generate_popover_content($vdb), ENT_QUOTES);
		?>
			<div class="col-md-2 col-sm-12 rounded-5">
				<div class="card custom-card">
					<div class="card-content">
						<a href="#" class="card-link" style="color: #25396F;">
							<div class="book-cover-container">
								<img class="book-cover-image" src="<?= base_url('/assets/uploads/coverBook/' . $vdb['coverBook']) ?>" alt="Cover buku <?= $vdb['Judul'] ?>" onerror="this.src='<?= base_url('/assets/uploads/imageError/og.png') ?>';">
							</div>
							<div class="card-body">
								<a href="#" class="custom-tooltip" data-bs-toggle="popover" data-bs-html="true" title="<?= $vdb['Judul'] ?>" data-bs-content='<?= $popoverContent ?>'>
									<h5 class="truncate-text"><?= $vdb['Judul'] ?></h5>
								</a>
								<div class="card-footer">
									<span class="span-custom">Published <?= !empty($vdb['TahunTerbit']) ? date("Y", strtotime($vdb['TahunTerbit'])) : 'Unknown' ?></span>
								</div>
							</div>
						</a>
						<div class="btn-group align-items-center mx-2 px-1">
							<!-- //! Button Love -->
							<button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
								<i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
							</button>
							<!-- //! End Button Love -->
							<!-- //! Button Borrowing -->
							<?php if ($checkUserExists->idUser == $this->session->userdata('UserID') && $checkUserExists->idBuku == $vdb['BukuID'] && $checkUserExists->status != 'returned') : ?>
							<button type="button" class="btn btn-link p-2 m-1 text-decoration-none custom-button-check-borrowing">
								<i class="bi bi-folder-plus d-flex align-items-center justify-content-center text-secondary"></i>
							</button>
							<?php else : ?>
							<button type="button" class="btn btn-link p-2 m-1 text-decoration-none" data-bs-toggle="modal" data-bs-target="#borrowingModal<?= $vdb['BukuID']?>">
								<i class="bi bi-folder-plus d-flex align-items-center justify-content-center text-secondary"></i>
							</button>
							<?php endif; ?>
							<!-- //! End Button Borrowing -->
							<!-- //! Button Bookmark -->
							<button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
								<i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
							</button>
							<!-- //! End Button Bookmark -->
						</div>
					</div>
				</div>
			</div>
			<!-- //! Modal Borrowing Book -->
			<div class="modal fade" id="borrowingModal<?= $vdb['BukuID']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="modal-title fs-5" id="exampleModalLabel">Borrowing Book</h1>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<?= form_open('Index/Borrowing');?>
							<div class="modal-body">
								<input type="hidden" name="id" value="<?= $vdb['BukuID'] ?>">
								<div class="mb-3">
									<label for="startBorrowing" class="form-label">Start Borrowing Book :</label>
									<input type="date" name="startBorrowing" class="form-control" id="startBorrowing">
								</div>
								<div class="mb-3">
									<label for="endBorrowing" class="form-label">End Borrowing Book :</label>
									<input type="date" name="endBorrowing" class="form-control" id="endBorrowing">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Borrowing Book</button>
							</div>
						<?= form_close() ?>
					</div>
				</div>
			</div>
			<!-- //! End Modal Borrowing Book -->
		<?php endforeach; ?>
	</div>
</div>
<!-- End Page Content -->

<script>
	//? Ambil semua elemen dengan kelas 'custom-button-check-borrowing'
	const buttonTriggers = document.querySelectorAll('.custom-button-check-borrowing');

	//? Tambahkan event listener ke setiap elemen
	buttonTriggers.forEach(button => {
		button.addEventListener('click', function () {
			Swal.fire({
					icon: "warning",
					title: "Oops...",
					text: "The book is in the process of being borrowed",
			});
		});
	});

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

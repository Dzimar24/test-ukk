<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>	
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Bookmark</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page User -->

<!-- Style Table -->
<style>
	.text-title {
		font-weight: bold;
		color: #607080;
	}

	.col-unknown {
		width: 30px;
		/* Ubah sesuai kebutuhan */
	}

	.col-no {
		width: 50px;
		/* Ubah sesuai kebutuhan */
	}

	.col-view-data {
		width: 200px;
		/* Ubah sesuai kebutuhan */
	}

	.col-action {
		width: 100px;
		/* Ubah sesuai kebutuhan */
	}
</style>
<!-- End Style Table -->

<!-- //! Table User -->
<div class="row mt-4">
	<div class="col-1">

	</div>
	<div class="col-10">
		<section class="section custom-section">
			<div class="card">
				<div class="card-header">
					<div class="row mb-3">
						<div class="col-11 d-flex align-items-center">
							<h5 class="text-title">Table <?= $titlePage; ?></h5>
						</div>
						<div class="col-1 d-flex justify-content-start align-items-center">
							<input type="checkbox" class="form-check-input" id="selectAllCheckbox">
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th class="col-unknown">#</th>
									<th class="col-no">No</th>
									<th>Title Book</th>
									<th class="col-view-data">View Data</th>
									<th class="col-action">Action</th>
								</tr>
							</thead>
							<?php 
								$no = 1;
								foreach($viewDataBookmark as $vdb) :
							?>
							<tbody>
								<tr>
									<td><input type="checkbox" class="form-check-input row-checkbox"></td>
									<td><?= $no++; ?></td>
									<td><?= $vdb['Judul'] ?></td>
									<td>
										<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $vdb['BukuID'] ?>"><i class="bi bi-eye"></i> Views</button>
									</td>
									<td>
										<?= form_open('Public/Bookmark/delete/' . $vdb['BukuID']); ?>
											<div class="d-inline-block mb-2 me-1">
												<button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button Delete Bookmark">
													<i class="bi bi-x-circle"></i>
												</button>
											</div>
										<?= form_close(); ?>
									</td>
								</tr>
							</tbody>
							<!-- //! Modal View -->
							<div class="modal fade" id="modalView<?= $vdb['BukuID'] ?>" tabindex="-1" aria-labelledby="modalViewLabel<?= $vdb['BukuID'] ?>" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalViewLabel<?= $vdb['BukuID'] ?>">Book Details</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- Add your modal content here -->
											<div class="row">
												<!-- Input for book cover image -->
												<div class="col-md-3">
													<label for="bookCover" class="form-label" style="margin-left: 20px;">Cover Book</label>
													<div class="form-group">
														<div style="max-width: 200px; max-height: 500px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.8) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; margin-top: 10px; margin-left: 20px;">
															<img src="<?= base_url('/assets/uploads/coverBook/' . $vdb['coverBook']) ?>" alt="Image Error" style="width: auto; height: auto; max-width: 100%; max-height: 100%; object-fit: contain;">
														</div>
													</div>
												</div>
												<!-- Input fields for book details -->
												<div class="col-md-9">
													<div class="row">
														<!-- Title and Category -->
														<div class="col-md-9">
															<div class="form-group">
																<label for="bookTitle">Title:</label>
																<input type="text" class="form-control" value="<?= $vdb['Judul'] ?>" readonly id="bookTitle">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="bookCategory">Category Book:</label>
																<input type="text" name="categoryBook" class="form-control" value="<?= $vdb['NamaKategori'] ?>" id="bookCategory" readonly>
															</div>
														</div>
													</div>
													<div class="row">
														<!-- Author -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="bookAuthor">Author:</label>
																<input type="text" class="form-control" value="<?= $vdb['Penulis'] ?>" id="bookAuthor" readonly>
															</div>
														</div>
														<!-- Publisher -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="bookPublisher">Publisher:</label>
																<input type="text" class="form-control" value="<?= $vdb['Penerbit'] ?>" id="bookPublisher" readonly>
															</div>
														</div>
														<!-- Publication Year -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="publicationYear">Publication Year:</label>
																<input type="text" class="form-control" value="<?= date("l, d F Y", strtotime($vdb['TahunTerbit'])) ?>" id="publicationYear" readonly>
															</div>
														</div>
													</div>
													<!-- Book Description -->
													<div class="form-group mt-3">
														<label for="readonlyTinyMCE">Book Description:</label>
														<textarea cols="30" class="form-control" id="readonlyTinyMCE"  rows="10"><?= $vdb['deskripsi'] ?></textarea>
													</div>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- //! End Modal View -->
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- //! End Table User -->

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<script>
	// Get the 'select all' checkbox
	const selectAllCheckbox = document.getElementById('selectAllCheckbox');

	// Get all the individual checkboxes
	const rowCheckboxes = document.querySelectorAll('.row-checkbox');

	// Event listener for 'select all' checkbox
	selectAllCheckbox.addEventListener('change', function () {
		// When 'select all' is checked or unchecked, set the same state for all row checkboxes
		rowCheckboxes.forEach(checkbox => {
			checkbox.checked = selectAllCheckbox.checked;
		});
	});

	// Event listeners for individual checkboxes
	rowCheckboxes.forEach(checkbox => {
		checkbox.addEventListener('change', function () {
			// If any checkbox is unchecked, uncheck the 'select all' checkbox
			if (!checkbox.checked) {
					selectAllCheckbox.checked = false;
			}

			// If all checkboxes are checked, check the 'select all' checkbox
			if (Array.from(rowCheckboxes).every(checkbox => checkbox.checked)) {
					selectAllCheckbox.checked = true;
			}
		});
	});
</script>

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

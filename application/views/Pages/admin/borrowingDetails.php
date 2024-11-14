<!-- Header Page Add Borrowing -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(2); ?></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page Add Borrowing -->

<style>
	.col-no {
		width: 30px;
		/* Ubah sesuai kebutuhan */
	}

	.col-name {
		width: 200px;
	}

	.col-info-data {
		width: 100px;	
	}

	.col-view-data {
		width: 150px;
		/* Ubah sesuai kebutuhan */
	}

	.col-action {
		width: 200px;
	}

	.dropdown-menu.dropdown-custom {
		margin-top: 0px !important; 
		top: 100%;
	}

	.span-custom-modal-book {
		margin-top: 2px;
		height: 30px;
		width: 160px;
		font-size: 20px;
	}

	.span-custom {
		margin-top: 2px;
		height: 30px;
		width: 350px;
		font-size: 20px;
	}
</style>

<!-- Table All Borrowing -->
<div class="row mt-4">
	<div class="col-12">
		<section class="section custom-section">
			<div class="card">
				<div class="card-header">
					<div class="row mb-3">
						<div class="col-10 d-flex align-items-center">
							<h4 class="card-title mt-2"><?= $titleTableName ?></h4>
						</div>
						<div class="col-2 d-flex justify-content-start align-items-center">
							<button class="btn-sm btn btn-primary" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">
								<i class="bi bi-printer"></i> Data Borrowing
							</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<!-- Tabel Borrowing Temporary -->
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th class="col-no">No</th>
									<th>Name of Borrower</th>
									<th>Title Book</th>
									<th class="col-view-data">View Data</th>
									<th class="col-info-data">Information</th>
									<th class="col-action">Action</th>
								</tr>
							</thead>
							<?php 
								$no = 1;
								foreach ($viewAllDataBorrowing as $vadb) :
							?>
							<tbody>
								<tr>
									<td class="col-no"><?= $no++; ?></td>
									<td class="col-name"><?= $vadb['NamaLengkap'] ?></td>
									<td><?= $vadb['Judul'] ?></td>
									<td>
										<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $vadb['BukuID'] ?>">
											<i class="bi bi-eye"></i> Views
										</button>
									</td>
									<td>
										<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalInfo<?= $vadb['id'] ?>">
											<i class="bi bi-info-circle"></i>
										</button>
									</td>
									<td>
										<?php if ($vadb['status'] == 'rejected' || $vadb['status'] == 'completed' || $vadb['status'] == 'approved') : ?>
										
										<?php else : ?>
											<div class="btn-group dropdown me-1 mb-1">
												<button type="button" class="btn btn-primary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
													<i class="bi bi-gear"></i>
												</button>
												<div class="dropdown-menu dropdown-custom" aria-labelledby="dropdownMenuOffset">
													<?php if ($vadb['status'] == 'approved') : ?>
														<a class="dropdown-item" href="<?= site_url('Admin/BorrowingDetails/completed/'. $vadb['id']) ?>">Completed</a>
													<?php else : ?>
														<a class="dropdown-item" href="<?= site_url('Admin/BorrowingDetails/approved/'. $vadb['id']) ?>">Approved</a>
														<a class="dropdown-item button-delete" href="<?= site_url('Admin/BorrowingDetails/rejected/'. $vadb['id']) ?>">Rejected</a>
													<?php endif; ?>
												</div>
											</div>
										<?php endif; ?>
									</td>

									<!-- //! Modal View -->
									<div class="modal fade" id="modalView<?= $vadb['BukuID'] ?>" tabindex="-1" aria-labelledby="modalViewLabel<?= $vadb['BukuID'] ?>" aria-hidden="true">
										<div class="modal-dialog modal-xl modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalViewLabel<?= $vadb['BukuID'] ?>">Book Details</h5>
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
																	<img src="<?= base_url('/assets/uploads/coverBook/' . $vadb['coverBook']) ?>" alt="Image Error" style="width: auto; height: auto; max-width: 100%; max-height: 100%; object-fit: contain;">
																</div>
															</div>
														</div>
														<!-- Input fields for book details -->
														<div class="col-md-9">
															<div class="row">
																<!-- Title -->
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="bookTitle">Title:</label>
																		<input type="text" class="form-control" value="<?= $vadb['Judul'] ?>" readonly id="bookTitle">
																	</div>
																</div>
																<!-- End Title -->

																<!-- Category -->
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="bookCategory">Category Book:</label>
																		<input type="text" name="categoryBook" class="form-control" value="<?= $vadb['NamaKategori'] ?>" id="bookCategory" readonly>
																	</div>
																</div>
																<!-- End Category -->

																<!-- Status Book -->
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="bookStatus" class="d-flex">Book Status:</label>
																		<?php if ($vadb['status_buku'] == 'available') : ?>
																			<span class="badge bg-light-success span-custom-modal-book" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is available and can be borrowed.">Available</span>
																		<?php else : ?>
																			<span class="badge bg-light-danger span-custom-modal-book" style="cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is unavailable and cannot be borrowed.">Not Available</span>
																		<?php endif; ?>
																	</div>
																</div>
																<!-- End Status Book -->
															</div>
															<div class="row">
																<!-- Author -->
																<div class="col-md-4">
																	<div class="form-group mt-2">
																		<label for="bookAuthor">Author:</label>
																		<input type="text" class="form-control" value="<?= $vadb['Penulis'] ?>" id="bookAuthor" readonly>
																	</div>
																</div>
																<!-- Publisher -->
																<div class="col-md-4">
																	<div class="form-group mt-2">
																		<label for="bookPublisher">Publisher:</label>
																		<input type="text" class="form-control" value="<?= $vadb['Penerbit'] ?>" id="bookPublisher" readonly>
																	</div>
																</div>
																<!-- Publication Year -->
																<div class="col-md-4">
																	<div class="form-group mt-2">
																		<label for="publicationYear">Publication Year:</label>
																		<input type="text" class="form-control" value="<?= date("l, d F Y", strtotime($vadb['TahunTerbit'])) ?>" id="publicationYear" readonly>
																	</div>
																</div>
															</div>
															<!-- Book Description -->
															<div class="form-group mt-3">
																<label for="readonlyTinyMCE">Book Description:</label>
																<textarea cols="30" class="form-control" id="readonlyTinyMCE"  rows="10"><?= $vadb['deskripsi'] ?></textarea>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- //! End Modal View -->

									<!-- Modal Information -->
									<div class="modal fade" id="modalInfo<?= $vadb['id'] ?>" tabindex="-1" aria-labelledby="modalViewLabel<?= $vadb['BukuID'] ?>" aria-hidden="true">
										<div class="modal-dialog modal-xl modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="modalViewLabel<?= $vadb['id'] ?>">Information Borrowing</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label for="borrowerName">Borrower Name:</label>
																<input type="text" id="borrowerName" value="<?= $vadb['NamaLengkap'] ?>" class="form-control mt-1" readonly>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="borrowerBook">Borrowed Book:</label>
																<input type="text" id="borrowerBook" value="<?= $vadb['Judul'] ?>" class="form-control mt-1" readonly>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="statusBorrow" class="d-flex">Status Borrow:</label>
																<?php
																	if (isset($vadb['status'])) {
																		switch ($vadb['status']) {
																			case 'pending':
																				echo '<span class="badge bg-light-primary span-custom">Pending</span>';
																				break;
																			case 'approved':
																				echo '<span class="badge bg-light-success span-custom">The book has been approved</span>';
																				break;
																			case 'completed':
																				echo '<span class="badge bg-light-info span-custom">Books have been returned</span>';
																				break;
																			case 'rejected':
																				echo '<span class="badge bg-light-danger span-custom">Book Loan Rejected</span>';
																				break;
																			default:
																				echo '<span class="badge bg-light-dark span-custom">Unknown status</span>';
																				break;
																		}
																	} else {
																		echo '<span class="badge bg-light-dark span-custom">Status information not available</span>';
																	}
																	?>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="borrowingDate">Borrowing Date:</label>
																<input type="text" class="form-control mt-1" value="<?= date("l, d F Y", strtotime($vadb['tanggal_pinjam'])) ?>" id="borrowingDate" readonly>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="returnDate">Return Date:</label>
																<input type="text" class="form-control mt-1" value="<?= date("l, d F Y", strtotime($vadb['tanggal_kembali'])) ?>" id="returnDate" readonly>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End Modal Information -->
								</tr>
							</tbody>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- End Table All Borrowing -->

<!-- Modal For Print Data Borrow -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" aria-labelledby="modalViewLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalViewLabel">Information Borrowing</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('Admin/BorrowingDetails/print', ['target' => '_blank']); ?>
				<div class="modal-body">
					<div class="row">
						<div class="form-group">
							<label for="userBorrower">Borrowing User Name :</label>
							<select name="inputUser" id="userBorrower" class="form-control">
								<option selected>-- User --</option>
								<?php foreach ($getAllDataUserBorrowing as $gadub) : ?>
									<option value="<?= $gadub->UserID ?>"><?= $gadub->NamaLengkap ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="dateBorrow">Start Date :</label>
								<input type="date" class="form-control" name="startDate" id="dateBorrow">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="dateBorrow">End Date : </label>
								<input type="date" class="form-control" name="endDate" id="dateBorrow">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary btn-sm" data-bs-dismiss="modal">
						<i class="bi bi-printer"></i>
					</button>
				</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<!-- End Modal For Print Data Borrow -->

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<script>
	$(".button-delete").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");

		Swal.fire({
			title: "Are you sure",
			text: "Do you really want to deny this user a book?",
			icon: "question",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, rejected!",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
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

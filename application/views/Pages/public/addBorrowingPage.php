<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>	
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(2);?></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(3); ?></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page User -->

<!-- Style -->
<style>
	.col-no {
		width: 50px;
		/* Ubah sesuai kebutuhan */
	}

	#dataTables th.col-no {
		width: 50px !important;
	}

	.col-name{
		width: 100px;
	}
</style>
<!-- End Style -->

<!-- Start Table Borrowing Add Book Page -->
<div class="row mt-4">
	<div class="col-1">

	</div>
	<div class="col-10">
		<section class="section custom-section">
			<div class="card">
				<div class="card-header">
					<div class="row mb-3">
						<div class="col-10 d-flex align-items-center">
							<h5 class="text-title"><?= $titleTableName ?></h5>
						</div>
						<div class="col-2 d-flex justify-content-start align-items-center">
							<button class="btn-sm btn btn-primary" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="bi bi-plus"></i> Borrowing Book</button>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th class="col-no">No</th>
									<th>Title Book</th>
									<th class="col-view-data">View Data</th>
								</tr>
							</thead>
							<?php 
								$no = 1;
								foreach($viewDataBorrowingTemp as $dbt) :
							?>
							<tbody>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $dbt['Judul'] ?></td>
									<td>
										<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $dbt['BukuID'] ?>"><i class="bi bi-eye"></i> Views</button>
									</td>
								</tr>
							</tbody>
							<!-- //! Modal View -->
							<div class="modal fade" id="modalView<?= $dbt['BukuID'] ?>" tabindex="-1" aria-labelledby="modalViewLabel<?= $dbt['BukuID'] ?>" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="modalViewLabel<?= $dbt['BukuID'] ?>">Book Details</h5>
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
															<img src="<?= base_url('/assets/uploads/coverBook/' . $dbt['coverBook']) ?>" alt="Image Error" style="width: auto; height: auto; max-width: 100%; max-height: 100%; object-fit: contain;">
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
																<input type="text" class="form-control" value="<?= $dbt['Judul'] ?>" readonly id="bookTitle">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="bookCategory">Category Book:</label>
																<input type="text" name="categoryBook" class="form-control" value="<?= $dbt['NamaKategori'] ?>" id="bookCategory" readonly>
															</div>
														</div>
													</div>
													<div class="row">
														<!-- Author -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="bookAuthor">Author:</label>
																<input type="text" class="form-control" value="<?= $dbt['Penulis'] ?>" id="bookAuthor" readonly>
															</div>
														</div>
														<!-- Publisher -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="bookPublisher">Publisher:</label>
																<input type="text" class="form-control" value="<?= $dbt['Penerbit'] ?>" id="bookPublisher" readonly>
															</div>
														</div>
														<!-- Publication Year -->
														<div class="col-md-4">
															<div class="form-group mt-2">
																<label for="publicationYear">Publication Year:</label>
																<input type="text" class="form-control" value="<?= date("l, d F Y", strtotime($dbt['TahunTerbit'])) ?>" id="publicationYear" readonly>
															</div>
														</div>
													</div>
													<!-- Book Description -->
													<div class="form-group mt-3">
														<label for="readonlyTinyMCE">Book Description:</label>
														<textarea cols="30" class="form-control" id="readonlyTinyMCE"  rows="10"><?= $dbt['deskripsi'] ?></textarea>
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
<!-- End Table Borrowing Add Book Page -->

<!-- Modal View Data Book -->
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalScrollableTitle">Data Book</h5>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<i data-feather="x"></i>
					</button>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<div class="table-responsive">
								<?php if (!empty($viewDataBook)) : // Cek apakah data ada ?>
									<table class="table" id="dataTables">
										<thead>
												<tr>
													<th>#</th>
													<th class="col-name">Name</th>
													<th>Author</th>
													<th>Publisher</th>
													<th>Status</th>
												</tr>
										</thead>
										<tbody>
												<?php 
												foreach ($viewDataBook as $vdb) : ?>
													<tr>
														<td><input type="checkbox" class="form-check-input" name="" id=""></td>
														<td><?= $vdb['Judul'] ?></td>
														<td><?= $vdb['Penulis'] ?></td>
														<td><?= date("Y", strtotime($vdb['TahunTerbit'])) ?></td>
														<td>
															<span class="badge bg-success"><?= $vdb['bookStatus'] ?></span>
														</td>
													</tr>
												<?php endforeach; ?>
										</tbody>
									</table>
								<?php else : ?>
									<!-- Tampilkan pesan Not Found jika data kosong -->
									<div class="alert alert-warning">
										Data not found.
									</div>
								<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
						<i class="bx bx-x d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Close</span>
					</button>
					<button type="button" class="btn btn-primary ms-1" data-bs-dismiss="modal">
						<i class="bx bx-check d-block d-sm-none"></i>
						<span class="d-none d-sm-block">Accept</span>
					</button>
				</div>
		</div>
	</div>
</div>
<!-- End Modal View Data Book -->

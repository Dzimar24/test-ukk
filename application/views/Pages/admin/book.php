<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Book Page</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page User -->

<?= form_error(); ?>

<?php if ($parameter != "updatePage"): ?>
	<!-- //! Input Form Add User -->
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-journal-plus"></i> Book</h4>
					</div>
					<?= form_open_multipart('Admin/Book/Add') ?>
					<div class="card-body">
						<div class="row">
							<!-- Input for book cover image -->
							<div class="col-md-3">
								<label for="bookCover">Cover Book</label>
								<div class="form-group">
									<!-- Tambahkan class form-control jika perlu -->
									<input type="file" name="cover" class="form-control image-preview-filepond" id="bookCover" required>
								</div>
							</div>

							<!-- Input fields for book details -->
							<div class="col-md-9">
								<div class="row">
									<!-- Title and Category -->
									<div class="col-md-9">
										<div class="form-group">
											<label for="bookTitle">Title:</label>
											<input type="text" class="form-control" name="title" placeholder="Enter Book Title"
												id="bookTitle" required>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="bookCategory">Category Book:</label>
											<select name="categoryBook" class="form-control" id="categoryBook">
												<option selected>-- Category Book --</option>
												<?php foreach ($viewDataCategory as $key => $vdc): ?>
													<option value="<?= $vdc['KategoriID'] ?>"><?= $vdc['NamaKategori'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Author -->
									<div class="col-md-4">
										<div class="form-group mt-2">
											<label for="bookAuthor">Author:</label>
											<input type="text" class="form-control" name="author" placeholder="Enter Book Author"
												id="bookAuthor" required>
										</div>
									</div>
									<!-- Publisher -->
									<div class="col-md-4">
										<div class="form-group mt-2">
											<label for="bookPublisher">Publisher:</label>
											<input type="text" class="form-control" name="publisher"
												placeholder="Enter Book Publisher" id="bookPublisher" required>
										</div>
									</div>
									<!-- Publication Year -->
									<div class="col-md-4">
										<div class="form-group mt-2">
											<label for="publicationYear">Publication Year:</label>
											<input type="date" class="form-control" name="publication_year" id="publicationYear"
												required>
										</div>
									</div>
								</div>
								<!-- Book Description -->
								<div class="form-group mt-3">
									<label for="dark">Book Description:</label>
									<textarea id="dark" cols="30" placeholder="Enter Book Description" name="description" rows="10"></textarea>
								</div>
							</div>
						</div>
						<!-- Style Button Save Book -->
						<style>
							.button-custom {
								display: flex;
								justify-content: flex-end;
								margin-top: 20px;
								margin-right: 20px;
							}
						</style>
						<!-- Save Button -->
						<div class="button-custom">
							<button type="submit" class="btn btn-primary">Save Book</button>
						</div>
					</div>
					<?= form_close(); ?>
				</div>
			</section>
		</div>
	</div>
	<!-- //! End Input Form Add User -->
<?php else : ?>
	<!-- //! Input Form Update -->
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-pencil-square"></i> Book</h4>
					</div>
					<?= form_open_multipart('Admin/Book/UpdateBook') ?>
					<div class="card-body">
						<?php foreach($viewDataEdit as $vde) : ?>
							<div class="row">
								<input type="hidden" name="id" value="<?= $vde['BukuID'] ?>">
								<!-- Input for book cover image -->
								<div class="col-md-3">
									<label for="bookCover" class="form-label" style="margin-left: 20px;">Old Cover Book</label>
									<div class="form-group">
										<div style="max-width: 200px; max-height: 500px; overflow: hidden; box-shadow: rgba(0, 0, 0, 0.8) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px; margin-top: 10px; margin-left: 20px;">
											<img src="<?= base_url('/assets/uploads/coverBook/' . $vde['coverBook']) ?>" alt="Image Error" style="width: auto; height: auto; max-width: 100%; max-height: 100%; object-fit: contain;">
										</div>
									</div>
									<div class="mt-6">
										<label for="bookCoverUpdate">New Cover Book</label>
										<div class="form-group">
											<!-- Tambahkan class form-control jika perlu -->
											<input type="file" name="coverBookNew" class="form-control image-preview-filepond" id="bookCover">
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
												<input type="text" class="form-control" name="titleUpdate" value="<?= $vde['Judul'] ?>" id="bookTitle">
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label for="bookCategory">Category Book:</label>
												<select name="categoryBookUpdate" class="form-control" id="categoryBook">
													<?php foreach ($viewDataCategory as $vdc): ?>
														<option value="<?= $vdc['KategoriID'] ?>" <?= ($vde['idKategory'] == $vdc['KategoriID']) ? 'selected' : '' ?>>
															<?= $vdc['NamaKategori'] ?>
														</option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<!-- Author -->
										<div class="col-md-4">
											<div class="form-group mt-2">
												<label for="bookAuthor">Author:</label>
												<input type="text" class="form-control" name="authorUpdate" value="<?= $vde['Penulis'] ?>" id="bookAuthor">
											</div>
										</div>
										<!-- Publisher -->
										<div class="col-md-4">
											<div class="form-group mt-2">
												<label for="bookPublisher">Publisher:</label>
												<input type="text" class="form-control" name="publisherUpdate" value="<?= $vde['Penerbit'] ?>" id="bookPublisher">
											</div>
										</div>
										<!-- Publication Year -->
										<div class="col-md-4">
											<div class="form-group mt-2">
												<label for="publicationYear">Publication Year:</label>
												<input type="date" class="form-control" name="publication_year_update" value="<?= $vde['TahunTerbit'] ?>" id="publicationYear">
											</div>
										</div>
									</div>
									<!-- Book Description -->
									<div class="form-group mt-3">
										<label for="dark">Book Description:</label>
										<textarea id="dark" cols="30" name="descriptionUpdate" rows="10"><?= $vde['deskripsi'] ?></textarea>
									</div>
								</div>
							</div>
							<!-- Style Button Update Book -->
							<style>
									.button-container {
										display: flex;
										justify-content: space-between;
										margin-top: 20px;
										padding: 0 25px;
									}

									.button-custom-back{
										background-color: #4E31AA; /* Warna latar belakang */
										color: white; /* Warna teks */
										border: none; /* Hilangkan border default */
										padding: 10px 20px; /* Padding tombol */
										text-align: center; /* Rata tengah teks */
										text-decoration: none; /* Hilangkan garis bawah teks */
										display: inline-block; /* Display inline-block */
										font-size: 16px; /* Ukuran font */
										margin: 4px 2px; /* Margin */
										cursor: pointer; /* Kursor pointer */
										border-radius: 5px; /* Sudut border */
									}
								</style>
								<div class="button-container">
									<a class="button-custom-back" href="<?= site_url('Admin/Book') ?>"><i class="bi bi-arrow-left"></i> Back</a>
									<button type="submit" class="btn btn-primary">Update Data</button>
								</div>
						<?php endforeach; ?>
					</div>
					<?= form_close(); ?>
				</div>
			</section>
		</div>
	</div>
	<!-- //! End Input Form Update -->
<?php endif; ?>

<!-- Style Table -->
<style>
	.col-no {
		width: 50px;
		/* Ubah sesuai kebutuhan */
	}

	.col-action {
		width: 400px;
		/* Ubah sesuai kebutuhan */
	}
</style>
<!-- End Style Table -->

<!-- //! Table User -->
<div class="row">
	<div class="col-1">

	</div>
	<div class="col-10">
		<section class="section custom-section">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Table Book
					</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th class="col-no">No</th>
									<th>Title</th>
									<th class="col-action">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($viewDataBook as $key => $vdb): ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $vdb['Judul']; ?></td>
										<td>
											<button data-bs-toggle="modal" data-bs-target="#modalView<?= $vdb['BukuID'] ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> View</button>
											<a class="btn btn-sm btn-warning" href="<?= site_url('admin/book/edit/' . $vdb['BukuID']) ?>"><i class="bi bi-pencil-square"></i> Edit</a>
											<a href="<?= site_url('admin/book/delete/' . $vdb['BukuID']) ?>" class="btn btn-sm btn-danger button-delete"><i class="bi bi-trash"></i> Delete</a>
										</td>
									</tr>
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
													<button type="button" class="btn btn-outline-secondary"
														data-bs-dismiss="modal">Close</button>
												</div>
											</div>
										</div>
									</div>
									<!-- //! End Modal View -->
								<?php endforeach; ?>
							</tbody>
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

<!-- JS -->

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
	//? Buttons Deleted
	$(".button-delete").on("click", function (e) {
		e.preventDefault();
		const href = $(this).attr("href");

		Swal.fire({
			title: "Are you sure ?",
			text: "Are you sure delete this data ?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, Delete !",
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = href;
			}
		});
	});
</script>

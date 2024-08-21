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

<!-- //! Input Form Add User -->
<div class="row">
	<div class="col-1"></div>
	<div class="col-10">
		<section class="section mt-2">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title"><i class="bi bi-journal-plus"></i> Book</h4>
				</div>
				<div class="card-body">
					<?= form_open_multipart('Admin/Book/Add') ?>
					<div class="row">
						<!-- Input for book cover image -->
						<div class="col-md-3">
							<label for="bookCover">Cover Book</label>
							<div class="form-group">
								<input type="file" name="cover" class="image-preview-filepond" id="bookCover" required>
							</div>
						</div>

						<!-- Input fields for book details -->
						<div class="col-md-9">
							<div class="row">
								<!-- Title and Category -->
								<div class="col-md-9">
									<div class="form-group">
										<label for="bookTitle">Title:</label>
										<input type="text" class="form-control" name="title" placeholder="Enter Book Title" id="bookTitle" required>
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
								<label for="default">Book Description:</label>
								<textarea class="form-control" placeholder="Enter Book Description" name="description"
									id="default" required></textarea>
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
					<?= form_close(); ?>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- //! End Input Form Add User -->

<!-- Style Table -->
<style>
	.col-no {
		width: 50px; /* Ubah sesuai kebutuhan */
	}

	.col-action {
		width: 150px; /* Ubah sesuai kebutuhan */
	}
</style>
<!-- End Style Table -->

<!-- Table User -->
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
								foreach ($viewDataBook as $key => $vdb) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $vdb['Judul']; ?></td>
										<td><span>kkkk</span></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</section>
	</div>
</div>
<!-- End Table User -->

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

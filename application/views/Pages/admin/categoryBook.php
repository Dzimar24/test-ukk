<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">User Page</li>
				</ol>
			</nav>
		</div>
	</div>
</div>

<?php if ($parameter != "updatePage"): ?>
	<!-- //! Input Form Add Category -->
	<div class="row">
		<div class="col-1">

		</div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-plus"></i> Category Book</h4>
					</div>
					<div class="card-body">
						<?= form_open('Admin/CategoryBook/Add') ?>
						<div class="row">
							<div class="form-group">
								<label for="formName">Name Category Book: </label>
								<input type="text" name="name" placeholder="Enter Name Category Book" class="form-control"
									id="formName" required>
								<?= form_error('name', '<span class="text-danger mt-2">* ', '</span>') ?>
							</div>
							<style>
								.button-custom {
									display: flex;
									justify-content: end;
									margin-top: 20px;
									margin-right: 25px;
								}
							</style>
							<div class="button-custom">
								<button type="submit" class="btn btn-primary">Save Data</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- //! End Input Form Add Category -->
<?php else: ?>
	<!-- //! Input Form Update Category -->
	<div class="row">
		<div class="col-1">

		</div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-pencil-square"></i> Category Book</h4>
					</div>
					<div class="card-body">
						<?= form_open('Admin/CategoryBook/Update') ?>
						<div class="row">
							<?php foreach($editData as $ed) : ?>
							<input type="hidden" name="id" value="<?= $ed['KategoriID']; ?>">
							<div class="form-group">
								<label for="formName">Name Category Book: </label>
								<input type="text" name="nameCategoryUpdate" value="<?= $ed['NamaKategori']; ?>" class="form-control" id="formName">
								<?= form_error('nameCategoryUpdate', '<span class="text-danger mt-2">* ', '</span>') ?>
							</div>
							<?php endforeach; ?>
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
								<a class="button-custom-back" href="<?= site_url('Admin/CategoryBook') ?>"><i class="bi bi-arrow-left"></i> Back</a>
								<button type="submit" class="btn btn-primary btn-sm">Update Data</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- //! End Input Form Update Category -->
<?php endif; ?>

<!-- Table User -->
<div class="row">
	<div class="col-1">

	</div>
	<div class="col-10">
		<section class="section custom-section">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Table Category
					</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th>No</th>
									<th>Name Category Book</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1; foreach ($viewData as $vd): ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= ucwords($vd['NamaKategori']); ?></td>
										<td>
											<a class="btn btn-warning" href="<?= site_url('Admin/CategoryBook/Edit/' . $vd['KategoriID']) ?>"><i class="bi bi-pencil-square"></i> Update</a>
											<a class="btn btn-danger ml-2 button-delete" href="<?= site_url('Admin/CategoryBook/deleted/' . $vd['KategoriID']) ?>"><i class="bi bi-trash"></i> Delete</a>
										</td>
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

<!-- JS -->
<!-- //? Alert if success -->
<?php if ($this->session->flashdata('success')): ?>
	<script>
		Swal.fire({
			icon: 'success',
			title: 'Success!',
			text: '<?php echo $this->session->flashdata('success'); ?>'
		});
	</script>
<?php endif; ?>

<!-- //? Alert if error -->
<?php if ($this->session->flashdata('error')): ?>
	<script>
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: '<?php echo $this->session->flashdata('error'); ?>'
		});
	</script>
<?php endif; ?>

<script>
	//? Alert for button delete category book
	$('.button-delete').on('click', function(e) {
		e.preventDefault();
		const url = $(this).attr('href');
		
		Swal.fire({
			title: "Are you sure?",
			text: "Are you sure delete this data category book ?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!"
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = url;
			}
		});
	});
</script>

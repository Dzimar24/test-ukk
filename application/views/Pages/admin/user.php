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
<!-- End Header Page User -->

<?php if($parameter != 'updateUserPage') : ?>
	<!-- //! Input Form Add User -->
	<div class="row">
		<div class="col-1">

		</div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-person-fill-add"></i> User</h4>
					</div>
					<div class="card-body">
						<?= form_open('Admin/User/Add') ?>
						<div class="row">
							<div class="form-group">
								<label for="formName">Name : </label>
								<input type="text" name="name" placeholder="Enter Name" class="form-control" id="formName" required>
								<?= form_error('name', '<span class="text-danger mt-2">* ', '</span>') ?>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formEmail">Email :</label>
									<input type="email" name="email" class="form-control" placeholder="Enter Email" id="formEmail" required>
									<?= form_error('email', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
								<div class="form-group">
									<label for="formPassword">Password : </label>
									<input type="password" id="formPassword" name="password" class="form-control" placeholder="Enter Password" required>
									<?= form_error('password', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formUsername">Username : </label>
									<input type="text" class="form-control" name="username" placeholder="Enter Username" id="formUsername" required>
									<?= form_error('username', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>

								<div class="form-group">
									<label for="formLevel">Level : </label>
									<select name="level" id="formLevel" class="form-control">
										<option>-- Option Level --</option>
										<option value="admin">Admin</option>
										<option value="petugas">Petugas</option>
										<option value="peminjam">Peminjam</option>
									</select>
									<?= form_error('level', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
							</div>
							<div class="form-group mt-2">
								<div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here" name="alamat" id="floatingTextarea" required></textarea>
									<label for="floatingTextarea">Alamat</label>
									<?= form_error('alamat', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
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
	<!-- //! End Input Form Add User -->
<?php else : ?>
	<!-- //! Input Form Update User -->
	<div class="row">
		<div class="col-1">

		</div>
		<div class="col-10">
			<section class="section mt-2">
				<div class="card ">
					<div class="card-header">
						<h4 class="card-title"><i class="bi bi-person-fill-gear"></i> User</h4>
					</div>
					<?php foreach($viewDataEdit as $vde) : ?>
					<div class="card-body">
						<?= form_open('Admin/User/updateData/'. $vde['UserID']) ?>
						<div class="row">
							<div class="form-group">
								<label for="formName">Name : </label>
								<input type="text" value="<?= $vde['NamaLengkap']; ?>" name="nameUpdate" placeholder="Enter Name" class="form-control" id="formName" required>
								<?= form_error('name', '<span class="text-danger mt-2">* ', '</span>') ?>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formEmail">Email :</label>
									<input type="email" value="<?= $vde['Email']; ?>" name="emailUpdate" class="form-control" placeholder="Enter Email" id="formEmail" required>
									<?= form_error('email', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
								<div class="form-group mt-2">
								<div class="form-floating">
									<textarea class="form-control" placeholder="Leave a comment here" name="alamatUpdate" id="floatingTextarea" required><?= $vde['Alamat'] ?></textarea>
									<label for="floatingTextarea">Alamat</label>
									<?= form_error('alamat', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
							</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="formUsername">Username : </label>
									<input type="text" value="<?= $vde['Username']; ?>" class="form-control" name="usernameUpdate" placeholder="Enter Username" id="formUsername" required>
									<?= form_error('usernameUpdate', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>

								<div class="form-group">
									<label for="formLevel">Level : </label>
									<select name="levelUpdate" id="formLevel" class="form-control">
										<option value="admin" <?php if($vde['level'] == 'admin') echo('selected') ?>>Admin</option>
										<option value="petugas" <?php if($vde['level'] == 'petugas') echo('selected') ?>>Petugas</option>
										<option value="peminjam" <?php if($vde['level'] == 'peminjam') echo('selected') ?>>Peminjam</option>
									</select>
									<?= form_error('level', '<span class="text-danger mt-2">* ', '</span>') ?>
								</div>
							</div>
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
								<a class="button-custom-back" href="<?= site_url('Admin/User') ?>"><i class="bi bi-arrow-left"></i> Back</a>
								<button type="submit" class="btn btn-primary">Update Data</button>
							</div>
						</div>
						<?= form_close(); ?>
					</div>
					<?php endforeach; ?>
				</div>
			</section>
		</div>
	</div>
	<!-- //! End Input Form Update User -->

<?php endif; ?>

<style>
	.custom-table {
		width: 500px;
	}

	.custom-section {
		margin-left: 20px;
	}
</style>

<!-- Table User -->
<div class="row">
	<!-- <div class="col-1">

	</div> -->
	<!-- <div class="col-10"> -->
	<section class="section custom-section">
		<div class="card">
			<div class="card-header">
				<h5 class="card-title">
					Table User
				</h5>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="table1">
						<thead class="custom-table">
							<tr>
								<th>No</th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Alamat</th>
								<th>Level</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($viewData as $vd) : ?>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= ucwords($vd['NamaLengkap']); ?></td>
									<td><?= $vd['Username']; ?></td>
									<td><?= $vd['Email']; ?></td>
									<td><?= $vd['Alamat']; ?></td>
									<td><?= ucwords($vd['level']); ?></td>
									<td>
										<a class="btn btn-warning" href="<?= site_url('Admin/User/edit/' . $vd['UserID']); ?>"><i class="bi bi-pencil-square"></i> Edit</a>
										<a class="btn btn-danger button-delete" href="<?= site_url('Admin/User/delete/' . $vd['UserID']); ?>"><i class="bi bi-trash"></i> Delete</a>
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
<!-- </div> -->
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
	$('.button-delete').on('click', function(e) {
		e.preventDefault();
		const url = $(this).attr('href');
		
		Swal.fire({
			title: "Are you sure?",
			text: "Are you sure delete this data User ?",
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

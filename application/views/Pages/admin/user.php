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

<?= validation_errors(); ?>

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
							<input type="text" name="name" placeholder="Enter Name" class="form-control" id="formName"
								required>
						</div>
						<div class="col-md-6">

							<div class="form-group">
								<label for="formEmail">Email :</label>
								<input type="email" name="email" class="form-control" placeholder="Enter Email" id="formEmail"
									required>
							</div>
							<div class="form-group">
								<label for="formPassword">Password : </label>
								<input type="password" id="formPassword" name="password" class="form-control" placeholder="Enter Password"
									required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="formUsername">Username : </label>
								<input type="text" class="form-control" name="username" placeholder="Enter Username"
									id="formUsername" required>
							</div>

							<div class="form-group">
								<label for="formLevel">Level : </label>
								<select name="level" id="formLevel" class="form-control">
									<option>-- Option Level --</option>
									<option value="admin">Admin</option>
									<option value="petugas">Petugas</option>
									<option value="peminjam">Peminjam</option>
								</select>
							</div>
						</div>
						<div class="form-group mt-2">
							<div class="form-floating">
								<textarea class="form-control" placeholder="Leave a comment here" name="alamat" id="floatingTextarea"
									required></textarea>
								<label for="floatingTextarea">Alamat</label>
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
										<span class="badge bg-success">Active</span>
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
<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(2); ?></li>
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

	.col-name {
		width: 100px;
	}

	.checkbox-custom {
		margin-right: 50px;
	}

	.icon-custom {
		color: #E72929;
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
							<a href="<?= site_url('Public/Borrowing') ?>" class="me-3 mt-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button Back"><i class="bi bi-arrow-left"></i></a>
							<h4 class="card-title mt-2"><?= $titleTableName ?></h4>
						</div>
						<div class="col-2 d-flex justify-content-start align-items-center">
							<button class="btn-sm btn btn-primary" type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable"><i class="bi bi-plus"></i>
								Borrowing Book
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
									<th>Title Book</th>
									<th class="col-view-data">View Data</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($viewDataBorrowingTemp as $dbt):
									?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $dbt['Judul'] ?></td>
										<td>
											<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $dbt['BukuID'] ?>">
												<i class="bi bi-eye"></i> Views
											</button>
										</td>
										<td>
											<a href="<?= site_url('Public/Borrowing/deleteTemp/' . $dbt['idTemp']) ?>" class="m-2 custom-button-delete" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button Delete Borrowing Book">
												<i class="bi bi-trash3 icon-custom"></i>
											</a>
										</td>
									</tr>
									<input type="hidden" name="idTemp" value="<?= $dbt['idTemp'] ?>">
								<?php endforeach; ?>
							</tbody>
						</table>
						<!-- End Tabel Borrowing Temporary -->
					</div>
					<form id="borrowingForm" class="mt-3">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
						<div class="row">
							<div class="col-3">
								<input type="date" class="form-control" id="startDate" required>
							</div>
							<div class="col-3">
								<input type="date" class="form-control" id="endDate" required>
							</div>
							<div class="col-6 d-flex justify-content-end">
								<button type="submit" class="btn-sm btn btn-primary book-borrowing-btn">Book Borrowing</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- End Table Borrowing Add Book Page -->

<!-- Modal View Data Book -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalScrollableTitle">Data Book</h5>
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
					<i class="bx bx-x d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="card-body">
					<div class="table-responsive">
						<?php if (!empty($viewDataBook)): // Cek apakah data ada ?>
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
									foreach ($viewDataBook as $vdb):
										// var_dump($vdb); exit; ?>
										<tr>
											<td><input type="checkbox" value="<?= $vdb['BukuID'] ?>"
													class="form-check-input row-checkbox checkbox-many-book"></td>
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
						<?php else: ?>
							<!-- Tampilkan pesan Not Found jika data kosong -->
							<div class="alert alert-warning">
								Data not found.
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="checkbox" class="form-check-input checkbox-custom" name="" id="selectAllCheckbox">
				<button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal" id="borrowing-many-book">
					<i class="bx bx-check d-block d-sm-none"></i>
					<span class="d-none d-sm-block">Accept</span>
				</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal View Data Book -->

<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<script>
	// Fungsi untuk memperbarui tabel utama
	function updateMainTable(newData) {
		const mainTable = $('#table1 tbody');
		mainTable.empty(); // Kosongkan tabel terlebih dahulu

		newData.forEach((item, index) => {
			mainTable.append(`
					<tr>
						<td>${index + 1}</td>
						<td>${item.Judul}</td>
						<td>
							<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView${item.BukuID}">
									<i class="bi bi-eye"></i> Views
							</button>
						</td>
					</tr>
			`);
		});
	}

	// Event listener untuk tombol "Accept"
	$('#borrowing-many-book').on('click', function (event) {
		event.preventDefault();
		const bookBorrowed = [];

		$('.checkbox-many-book:checked').each(function () {
			bookBorrowed.push($(this).val());
		});

		if (bookBorrowed.length > 0) {
			$.ajax({
				url: "<?= base_url('Public/Borrowing/BorrowingBook') ?>",
				method: "POST",
				data: { buku: bookBorrowed },
				dataType: 'json',
				success: function (response) {
					if (response.status === 'success') {
						// Perbarui tabel utama
						updateMainTable(response.data);

						// Hapus baris yang telah dipilih dari modal
						$('.checkbox-many-book:checked').closest('tr').remove();

						// Perbarui tampilan tabel modal jika kosong
						const modalTable = $("#dataTables tbody");
						if (modalTable.children().length === 0) {
							modalTable.html('<tr><td colspan="5" class="text-center">Tidak ada data tersedia</td></tr>');
						}

						// Tampilkan pesan sukses
						Swal.fire({
							icon: "success",
							title: "Sukses",
							text: "Buku telah ditempatkan dalam peminjaman sementara dan siap untuk dipinjam.",
						});

						// Tutup modal
						$('#exampleModalScrollable').modal('hide');
					} else {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: response.message || "Terjadi kesalahan saat memproses permintaan Anda.",
						});
					}
				},
				error: function (xhr, status, error) {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Terjadi kesalahan saat memproses permintaan Anda.",
					});
				}
			});
		} else {
			Swal.fire({
				icon: "error",
				title: "Oops...",
				text: "Silakan pilih buku untuk dipinjam",
			});
		}
	});

	// Reset checkbox saat modal dibuka
	$('#exampleModalScrollable').on('show.bs.modal', function () {
		$('.checkbox-many-book').prop('checked', false);
		$('#selectAllCheckbox').prop('checked', false);
	});

	$('.custom-button-delete').on('click', function(e) {
		e.preventDefault();
		const url = $(this).attr('href');

		Swal.fire({
			title: 'Are you sure?',
			text: "You will Delete the data of this book !!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.isConfirmed) {
				document.location.href = url
			}
		})
	})
	
	document.addEventListener('DOMContentLoaded', function () {
		const borrowButton = document.querySelector('.book-borrowing-btn');
		const formBorrow = document.querySelector('#borrowingForm');

		if (!borrowButton) {
			console.error('Button not found!');
			return;
		}

		borrowButton.addEventListener('click', function (e) {
			e.preventDefault();

			const dateInputs = document.querySelectorAll('input[type="date"]');
			let datesValid = true;
			let dates = [];

			dateInputs.forEach(input => {
				if (!input.value) {
					datesValid = false;
				}
				dates.push(input.value);
			});

			if (!datesValid) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Silakan isi kedua tanggal terlebih dahulu!'
				});
				return;
			}

			// Ambil data dari tabel
			const table = document.getElementById('table1');
			if (!table) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Table not found!'
				});
				return;
			}

			// Kumpulkan data dari tabel
			const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
			let tableData = [];

			for (let row of rows) {
				const cells = row.getElementsByTagName('td');
				const bukuId = row.querySelector('button').getAttribute('data-bs-target').replace('#modalView', '');

				tableData.push({
					bukuId: bukuId,
					judul: cells[1].innerText
				});
			}

			// Data yang akan dikirim
			const formData = {
				tanggal_pinjam: dates[0],
				tanggal_kembali: dates[1],
				books: tableData
			};

			// Debug: log data yang akan dikirim
			console.log('Sending data:', formData);

			// Kirim data ke controller
			fetch('/public/Borrowing/BookBorrowing', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'Accept': 'application/json'
				},
				body: JSON.stringify(formData)
			})
				.then(response => {
					// Debug: log raw response
					console.log('Raw response:', response);
					return response.text();
				})
				.then(text => {
					// Debug: log response text
					console.log('Response text:', text);
					try {
						return JSON.parse(text);
					} catch (error) {
						throw new Error('Invalid JSON response: ' + text);
					}
				})
				.then(data => {
					if (data.success) {
						Swal.fire({
							icon: 'success',
							title: 'Success!',
							text: data.message
						}).then((result) => {
							if (result.isConfirmed) {
								window.location.reload();
							}
						});
					} else {
						throw new Error(data.message || 'Terjadi kesalahan');
					}
				})
				.catch(error => {
					console.error('Error:', error);
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: error.message
					});
				});
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

<!-- //? Alert if Error -->
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

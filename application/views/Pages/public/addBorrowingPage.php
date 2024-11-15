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
					<li class="breadcrumb-item active" aria-current="page"><?php echo $this->uri->segment(3); ?></li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page Add Borrowing -->

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

	.icon-x {
		color: #000000;
		font-size: 20px;
		text-shadow: 0 0 1px #000000; /* Menambah efek ketebalan */
	}

	.span-custom {
		margin-top: 2px;
		height: 30px;
		width: 160px;
		font-size: 20px;
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
									<tr data-id="<?= $dbt['idTemp'] ?>">
										<td><?= $no++; ?></td>
										<td><?= htmlspecialchars($dbt['Judul']) ?></td>
										<td>
											<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView<?= $dbt['BukuID'] ?>">
												<i class="bi bi-eye"></i> Views
											</button>
										</td>
										<td>
											<a href="#" class="m-2 custom-button-delete" data-buku-id="<?= $dbt['BukuID'] ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button Delete Borrowing Book">
												<i class="bi bi-trash3 icon-custom"></i>
											</a>
										</td>
									</tr>
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
																<!-- Title -->
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="bookTitle">Title:</label>
																		<input type="text" class="form-control" value="<?= $dbt['Judul'] ?>" readonly id="bookTitle">
																	</div>
																</div>
																<!-- End Title -->

																<!-- Category -->
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="bookCategory">Category Book:</label>
																		<input type="text" name="categoryBook" class="form-control" value="<?= $dbt['NamaKategori'] ?>" id="bookCategory" readonly>
																	</div>
																</div>
																<!-- End Category -->

																<!-- Status Book -->
																<div class="col-md-3">
																	<div class="form-group">
																		<label for="bookStatus" class="d-flex">Book Status:</label>
																		<?php if ($dbt['status_buku'] == 'available') : ?>
																			<span class="badge bg-light-success span-custom" style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is available and can be borrowed.">Available</span>
																		<?php else : ?>
																			<span class="badge bg-light-danger span-custom" style="cursor: not-allowed;" data-bs-toggle="tooltip" data-bs-placement="bottom" title="This book is unavailable and cannot be borrowed.">Not Available</span>
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
					<form id="borrowingForm" class="mt-3">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
						<div class="row">
							<div class="col-3">
								<input type="date" class="form-control" id="startDate" name="tanggal_pinjam" required>
							</div>
							<div class="col-3">
								<input type="date" class="form-control" id="endDate" name="tanggal_kembali" required>
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
						<?php if (!empty($viewDataBook)): // Cek apakah data ada  ?>
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
										// var_dump($vdb); exit; 
										$isPending = false;

										if($viewDataBookInBorrowing) {
											foreach($viewDataBookInBorrowing as $borrowing) {
												if($borrowing->buku_id == $vdb['BukuID'] && $borrowing->status == 'pending') {
													$isPending = true;
													break;
												}
											}
										}
									?>
										<tr>
											<td>
												<?php if($vdb['status_buku'] == 'not_available' || $isPending) : ?>
													<i class="bi bi-x-lg icon-x"></i>
												<?php else : ?>
													<input type="checkbox" value="<?= $vdb['BukuID'] ?>" class="form-check-input row-checkbox checkbox-many-book">
												<?php endif; ?>
											</td>
											<td><?= $vdb['Judul'] ?></td>
											<td><?= $vdb['Penulis'] ?></td>
											<td><?= date("Y", strtotime($vdb['TahunTerbit'])) ?></td>
											<td>
												<?php if($vdb['status_buku'] == 'available') :  ?>
													<span class="badge bg-success">Available</span>
												<?php else : ?>
													<span class="badge bg-danger">Not Available</span>
												<?php endif; ?>
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
	function updateMainTable(newData) {
		console.log("Data yang diterima:", newData);
		const mainTable = $('#table1 tbody');
		const deleteTempUrl = '<?= site_url('Public/Borrowing/deleteTemp/') ?>';

		// Tambahkan pengecekan elemen tabel
		if (!mainTable.length) {
			console.error('Table body element not found');
			return;
		}

		mainTable.empty();

		if (newData && newData.length > 0) {
			newData.forEach((item, index) => {
				mainTable.append(`
					<tr data-id="${item.idTemp}">
						<td class="col-no">${index + 1}</td>
						<td>${escapeHtml(item.Judul)}</td>
						<td class="col-view-data">
							<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modalView${item.BukuID}" title="View Book Details">
							<i class="bi bi-eye"></i> Views
							</button>
						</td>
						<td>
							<a href="#" class="m-2 custom-button-delete" data-buku-id="${item.BukuID}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Button Delete Borrowing Book">
							<i class="bi bi-trash3 icon-custom"></i>
							</a>
						</td>
					</tr>
				`);
			});

			// Inisialisasi ulang tooltips
			const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
			tooltipTriggerList.map(function(tooltipTriggerEl) {
				return new bootstrap.Tooltip(tooltipTriggerEl);
			});

			// Bind event handler untuk tombol delete
			bindDeleteHandlers(deleteTempUrl);

		} else {
			mainTable.append(`
				<tr>
					<td colspan="4" class="text-center">Tidak ada data peminjaman sementara</td>
				</tr>
			`);
		}
	}

	// Fungsi untuk mengikat event handler delete
	function bindDeleteHandlers(deleteTempUrl) {
		$('.custom-button-delete').each(function() {
			$(this).off('click').on('click', function(e) {
				e.preventDefault();
				const bukuID = $(this).data('buku-id');
				handleDelete(bukuID, deleteTempUrl);
			});
		});
	}

	// Fungsi escapeHTML yang aman
	function escapeHtml(unsafe) {
		if (!unsafe) return '';
		return unsafe
			.replace(/&/g, "&amp;")
			.replace(/</g, "&lt;")
			.replace(/>/g, "&gt;")
			.replace(/"/g, "&quot;")
			.replace(/'/g, "&#039;");
	}

	// Tempatkan fungsi handleDelete
	function handleDelete(bukuID, deleteTempUrl) {
		const url = `${deleteTempUrl}${bukuID}`;

		Swal.fire({
			title: 'Are you sure?',
			text: "You will Delete the data of this book !!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			cancelButtonText: 'Cancel'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: url,
					type: 'POST',
					data: {
						'<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>'
					},
					dataType: 'JSON',
					success: function(response) {
						console.log('Delete response:', response);
						if (response.success) {
							Swal.fire({
								icon: 'success',
								title: 'Terhapus!',
								text: 'Data berhasil dihapus.',
							}).then(() => {
								// Refresh halaman setelah sukses
								location.reload();
							});
						} else {
							Swal.fire('Error!', response.message || 'Gagal menghapus data.', 'error');
						}
					},
					error: function(xhr, status, error) {
						console.error('Delete error:', {
							status: xhr.status,
							statusText: xhr.statusText,
							responseText: xhr.responseText,
							error: error
						});
						Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
					}
				});
			}
		});
	}

	// Document ready event
	$(document).ready(function() {
		const deleteTempUrl = '<?= site_url('Public/Borrowing/deleteTemp/') ?>';

		// Event delegation untuk tombol delete
		$(document).on('click', '.custom-button-delete', function(e) {
			e.preventDefault();
			const bukuID = $(this).data('buku-id');
			handleDelete(bukuID, deleteTempUrl);
		});

		// Event handler untuk checkbox "Select All"
		$('#selectAllCheckbox').change(function() {
			$('.checkbox-many-book').prop('checked', $(this).prop('checked'));
		});

		// Event handler untuk checkbox individual
		$('.checkbox-many-book').change(function() {
			let allChecked = $('.checkbox-many-book:checked').length === $('.checkbox-many-book').length;
			$('#selectAllCheckbox').prop('checked', allChecked);
		});

		// Event handler untuk tombol peminjaman buku
		$('#borrowing-many-book').on('click', function(event) {
			event.preventDefault();
			const bookBorrowed = [];

			$('.checkbox-many-book:checked').each(function() {
				bookBorrowed.push($(this).val());
			});

			if (bookBorrowed.length > 0) {
				$.ajax({
					url: "<?= base_url('Public/Borrowing/BorrowingBook') ?>",
					method: "POST",
					data: {
						buku: bookBorrowed,
						'<?= $this->security->get_csrf_token_name() ?>': '<?= $this->security->get_csrf_hash() ?>'
					},
					dataType: 'json',
					success: function(response) {
						if (response.status === 'success') {
							// Update tabel dan UI
							updateMainTable(response.data);

							// Reset checkbox
							$('.checkbox-many-book:checked').prop('checked', false);
							$('#selectAllCheckbox').prop('checked', false);

							// Tampilkan pesan sukses
							Swal.fire({
								icon: "success",
								title: "Sukses",
								text: "Buku telah ditempatkan dalam peminjaman sementara.",
							}).then(() => {
								$('#exampleModalScrollable').modal('hide');
								window.location.reload();
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: response.message || "Terjadi kesalahan saat memproses permintaan.",
							});
						}
					},
					error: function(xhr, status, error) {
						console.error('Borrowing error:', {
							status: xhr.status,
							statusText: xhr.statusText,
							responseText: xhr.responseText,
							error: error
						});
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: "Terjadi kesalahan saat memproses permintaan.",
						});
					}
				});
			} else {
				Swal.fire({
					icon: "warning",
					title: "Perhatian",
					text: "Silakan pilih buku untuk dipinjam",
				});
			}
		});

		// Reset modal saat dibuka
		$('#exampleModalScrollable').on('show.bs.modal', function() {
			$('.checkbox-many-book').prop('checked', false);
			$('#selectAllCheckbox').prop('checked', false);
		});
	});

	// Form submission handler
	document.addEventListener('DOMContentLoaded', function() {
		const borrowButton = document.querySelector('.book-borrowing-btn');
		const formBorrow = document.querySelector('#borrowingForm');

		if (!borrowButton || !formBorrow) {
			console.error('Required elements not found');
			return;
		}

		formBorrow.addEventListener('submit', function(e) {
			e.preventDefault();

			const startDate = document.getElementById('startDate');
			const endDate = document.getElementById('endDate');

			if (!startDate.value || !endDate.value) {
				Swal.fire({
					icon: 'warning',
					title: 'Perhatian',
					text: 'Silakan isi kedua tanggal terlebih dahulu!'
				});
				return;
			}

			// Kumpulkan data buku
			const tableRows = document.querySelectorAll('#table1 tbody tr');
			if (tableRows.length === 0) {
				Swal.fire({
					icon: 'warning',
					title: 'Perhatian',
					text: 'Tidak ada buku yang dipilih untuk dipinjam!'
				});
				return;
			}

			const formData = {
				tanggal_pinjam: startDate.value,
				tanggal_kembali: endDate.value,
				books: Array.from(tableRows).map(row => {
					const button = row.querySelector('button');
					return {
						bukuId: button ? button.getAttribute('data-bs-target').replace('#modalView', '') : null,
						judul: row.cells[1].textContent
					};
				}).filter(book => book.bukuId)
			};

			// Kirim data peminjaman
			fetch('<?= base_url("public/Borrowing/BookBorrowing") ?>', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json',
					'X-Requested-With': 'XMLHttpRequest'
				},
				body: JSON.stringify(formData)
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					Swal.fire({
						icon: 'success',
						title: 'Sukses!',
						text: data.message
					}).then(() => {
						window.location.reload();
					});
				} else {
					throw new Error(data.message || 'Terjadi kesalahan');
				}
			})
			.catch(error => {
				console.error('Form submission error:', error);
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: error.message || 'Terjadi kesalahan saat memproses permintaan'
				});
			});
		});
	});
</script>

<!-- //? Alert if success -->
<?php if ($this->session->flashdata('success')): ?>
	<script>
		document.addEventListener('DOMContentLoaded', function() {
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
		document.addEventListener('DOMContentLoaded', function() {
			Swal.fire({
				icon: 'error',
				title: 'Oops...',
				text: '<?php echo $this->session->flashdata('error'); ?>'
			});
		});
	</script>
<?php endif; ?>

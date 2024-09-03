<!-- Header Page User -->
<div class="page-title">
	<div class="row">
		<div class="col-12 col-md-6 order-md-1 order-last">
			<h3><?= $titlePage; ?></h3>
		</div>	
		<div class="col-12 col-md-6 order-md-2 order-first">
			<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
				<ol class="breadcrumb">
					<li class="breadcrumb-item active" aria-current="page">Borrowing</li>
				</ol>
			</nav>
		</div>
	</div>
</div>
<!-- End Header Page User -->

<!-- Style Table -->
<style>
	.col-no {
		width: 50px;
		/* Ubah sesuai kebutuhan */
	}

	.col-view-data {
		width: 200px;
		/* Ubah sesuai kebutuhan */
	}

	.span-custom-wait{
		font-weight: bold;
		color: #0B2F9F;
		text-decoration: underline;
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
					<h5 class="card-title">
						Table Borrowing
					</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table" id="table1">
							<thead class="custom-table">
								<tr>
									<th class="col-no">No</th>
									<th>Title</th>
									<th class="col-view-data">View Data</th>
									<th>Status</th>
								</tr>
							</thead>
							<?php 
								$no = 1;
								foreach($viewDataBorrowing as $vdb) :
							?>
							<tbody>
								<tr>
									<td><?= $no++; ?></td>
									<td><?= $vdb['Judul'] ?></td>
									<td>
										<button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Views</button>
									</td>
									<td>
										<?php if($vdb['status'] == 'Please Wait') : ?>
											<span class="span-custom-wait">Please Wait</span>
										<?php elseif($vdb['status'] == 'returned') : ?>
											<span class="span-custom-wait">Please Wait</span>
										<?php elseif($vdb['status'] == 'borrowed') : ?>
											<span class="span-custom-wait">Please Wait</span>
										<?php endif; ?>
									</td>
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
<!-- //! End Table User -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Report Borrower</title>
	<style>
		table, th, td {
			border: 1px solid;
			border-collapse: collapse;
			padding: 8px;
		}

		.content {
			display: flex;
			justify-content: center;
		}

		.header {
			text-align: center;
		}

		.text-center {
			text-align: center;
		}
	</style>
</head>

<body>
	<div class="header">
		<h1>Report</h1>
		<h2>Period : <?= date("d F Y", strtotime($startDate)) ?> - <?= date("d F Y", strtotime($endDate)) ?></h2>
	</div>
	<div class="content">
		<table>
			<thead>
				<tr>
					<th class="col-no">No</th>
					<th>Name</th>
					<th>Email</th>
					<th>Books</th>
					<th>Borrow</th>
					<th>Returned</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php if (!empty($borrowingDetails)) : ?>
					<?php foreach ($borrowingDetails as $detail) : ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $detail->NamaLengkap ?></td>
							<td><?= $detail->Email ?></td>
							<td><?= $detail->Judul ?></td>
							<td><?= date("d-m-Y", strtotime($detail->tanggal_pinjam)) ?></td>
							<td><?= date("d-m-Y", strtotime($detail->tanggal_kembali)) ?></td>
							<td><?= $detail->status ?></td>
						</tr>
					<?php endforeach; ?>
				<?php else : ?>
					<tr>
						<td colspan="7" class="text-center">There is no borrowing data on that date</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

	<script>
		window.print();
		setTimeout(() => {
			window.close();
		}, 500);
	</script>
</body>

</html>

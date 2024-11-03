<style>
	.custom-title {
		text-align: center;
		font-size: 2rem;
		font-weight: bold;
	}

	.custom-img-container {
		max-width: 300px;
		/* Ubah lebar sesuai kebutuhan */
		max-height: 500px;
		/* Ubah tinggi sesuai kebutuhan */
		padding-top: 30px;
		overflow: hidden;
		position: relative;

	}

	.custom-img {
		width: 100%;
		height: 100%;
		border-radius: 1rem;
		/* Opsional: menambahkan border radius */
		object-fit: contain;
		/* Atur agar gambar menyesuaikan dengan kontainer */
	}

	.container-custom {
		margin-bottom: auto;
	}

	.card-custom{
		background-color: #ffffff;
		border-radius: 1rem;
		box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
		margin-right: 10px;
	}

	p{
		color: #000000;
	}
</style>

<?php foreach ($viewFullDataBook as $vfdb) : ?>
	<div class="card">
		<div class="card-content">
			<div class="card-body">
				<div class="container container-custom">
					<h1 class="custom-title"><?= $vfdb['Judul'] ?></h1>
					<div class="row">
						<div class="col-md-4">
							<div class="custom-img-container">
								<img src="<?= base_url('/assets/uploads/coverBook/'. $vfdb['coverBook']) ?>" alt="Image Error" class="custom-img">
							</div>
						</div>
						<div class="col-md-8 mt-4">
							<ul class="nav nav-tabs " id="myTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
								</li>
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
								</li>
							</ul>
							<div class="card mt-4">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active card-content" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="card-body card-custom">
											<p class='my-2'>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ut nulla
												neque. Ut hendrerit nulla a euismod pretium.
												Fusce venenatis sagittis ex efficitur suscipit. In tempor mattis fringilla. Sed id
												tincidunt orci, et volutpat ligula.
												Aliquam sollicitudin sagittis ex, a rhoncus nisl feugiat quis. Lorem ipsum dolor sit
												amet, consectetur adipiscing elit.
												Nunc ultricies ligula a tempor vulputate. Suspendisse pretium mollis ultrices.
											</p>
										</div>
									</div>
									<div class="tab-pane fade card-content" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="card-body card-custom">
											<p>
												Integer interdum diam eleifend metus lacinia, quis gravida eros mollis. Fusce non sapien
												sit amet magna dapibus
												ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis a mauris ex.
												Ut finibus risus sed massa
												mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer pretium dolor
												at sapien laoreet ultricies.
												Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie finibus. In nec
												odio tincidunt eros finibus
												ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu accumsan
												lacus felis at odio. Sed lacus
												quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel
												massa pretium ullamcorper vitae eu
												tortor.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

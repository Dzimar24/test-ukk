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
                    <h4 class="card-title"><i class="bi bi-journal-plus"></i> Add Book</h4>
                </div>
                <div class="card-body">
                    <?= form_open_multipart('Admin/Book/Add') ?>
                    <div class="row">
                        <!-- Input for book cover image -->
                        <div class="col-md-3">
                            <label for="bookCover">Cover Book</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="cover" id="bookCover" required>
                            </div>
                        </div>

                        <!-- Input fields for book details -->
                        <div class="col-md-9">
                            <div class="row">
                                <!-- Title and Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bookTitle">Title:</label>
                                        <input type="text" class="form-control" name="title" placeholder="Enter Book Title" id="bookTitle" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bookCategory">Category Book:</label>
                                        <input type="text" class="form-control" name="category" placeholder="Enter Book Category" id="bookCategory" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Author and Publisher -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bookAuthor">Author:</label>
                                        <input type="text" class="form-control" name="author" placeholder="Enter Book Author" id="bookAuthor" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bookPublisher">Publisher:</label>
                                        <input type="text" class="form-control" name="publisher" placeholder="Enter Book Publisher" id="bookPublisher" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Publication Year -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="publicationYear">Publication Year:</label>
                                        <input type="text" class="form-control" name="publication_year" placeholder="Enter Publication Year" id="publicationYear" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Book Description -->
                            <div class="form-group mt-3">
                                <label for="bookDescription">Book Description:</label>
                                <textarea class="form-control" placeholder="Enter Book Description" name="description" id="bookDescription" required></textarea>
                            </div>
                        </div>
                    </div>

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

<style>
    .button-custom {
        display: flex;
        justify-content: flex-end;
        margin-top: 20px;
        margin-right: 25px;
    }
</style>

<!-- //! End Input Form Add User -->


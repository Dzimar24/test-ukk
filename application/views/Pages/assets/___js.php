<!-- JQuery -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/jquery/jquery.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/datatables.net/js/jquery.dataTables.min.js"></script>
<script
	src="<?= base_url('/assets/mazer/') ?>assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/pages/datatables.js"></script>

<!-- JS Page -->
<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/components/dark.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/pages/horizontal-layout.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/compiled/js/app.js"></script>


<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS Quill -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/tinymce/tinymce.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/pages/tinymce.js"></script>
<script>
	// Inisialisasi TinyMCE
	tinymce.init({
		selector: '#dark',
		menubar: false,
		plugins: 'link image',
		toolbar: 'undo redo | bold italic | alignleft aligncenter alignright alignjustify | link image',
		setup: function (editor) {
			editor.on('change', function () {
					editor.save();  // Menyimpan perubahan ke textarea
			});
		}
	});
</script>

<!-- JS Image Preview -->
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-file-validate-type/filepond-plugin-file-validate-type.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-image-crop/filepond-plugin-image-crop.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-image-filter/filepond-plugin-image-filter.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond-plugin-image-resize/filepond-plugin-image-resize.min.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/filepond/filepond.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/extensions/toastify-js/src/toastify.js"></script>
<script src="<?= base_url('/assets/mazer/') ?>assets/static/js/pages/filepond.js"></script>

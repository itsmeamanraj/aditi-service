<footer class="d-footer">
  <div class="row align-items-center justify-content-between">
    <div class="col-auto">
      <p class="mb-0">© 2025 Your. All Rights Reserved.</p>
    </div>
    <div class="col-auto">
      <p class="mb-0">Made by <span class="text-primary-600">wowtheme7</span></p>
    </div>
  </div>
</footer>
</main>

<!-- PHP Function Call for Base URL -->
<script src="<?= base_url('assets/admin/js/lib/jquery-3.7.1.min.js') ?>"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/admin/js/lib/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/iconify-icon.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/jquery-jvectormap-2.0.5.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/jquery-jvectormap-world-mill-en.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/magnifc-popup.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/slick.min.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/prism.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/file-upload.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/lib/audioplayer.js') ?>"></script>
<script src="<?= base_url('assets/admin/js/app.js') ?>"></script>
  <!-- Summernote CSS -->
<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet"> -->
<!-- Summernote JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script> -->

<script src="https://cdn.tiny.cloud/1/iruq9y6itq591xv3nd2nccq5whftviq3ed7qhbfsdoaewfbi/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
  });
</script>
<script>
  let table = new DataTable('#dataTable');
</script>
<script>
$(document).ready(function () {
  $('.summernote').summernote({
    height: 250,

    // 🔥 Don't touch existing toolbar — just extend it
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'video', 'attachFile']], // 👈 added here
      ['view', ['fullscreen', 'codeview', 'help']]
    ],

    buttons: {
      attachFile: function () {
        return $.summernote.ui.button({
          contents: 'PDF',
          tooltip: 'Attach File',
          click: function () {
            $('#fileInput').trigger('click');
          }
        }).render();
      }
    }
  });

  // Handle file selection
  $('#fileInput').on('change', function () {
    const file = this.files[0];
    if (file) {
      const fileURL = URL.createObjectURL(file); // 🔗 Temporary blob URL
      const fileName = file.name;

      const linkHtml = `<a href="${fileURL}" download="${fileName}" target="_blank">${fileName}</a>`;
      $('.summernote').summernote('pasteHTML', linkHtml);
    }
  });
});

</script>
</body>
</html>

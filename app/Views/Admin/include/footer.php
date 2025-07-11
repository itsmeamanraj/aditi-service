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
<script src="<?= base_url('assets/admin/js/tinymce.min.js') ?>"></script>
<script>
  let table = new DataTable('#dataTable');
</script>
<script>
$(document).ready(function () {
  tinymce.init({
      selector: '.basic-conf',
      height: 300,
      plugins: [
          'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
          'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
          'table', 'emoticons', 'help'
      ],
      toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
          'forecolor backcolor emoticons | help',
      file_picker_types: 'image file', // allow both
      file_picker_callback: function (callback, value, meta) {
          const input = document.createElement('input');
          input.setAttribute('type', 'file');
          
          // PDF or Image types
          if (meta.filetype === 'image') {
              input.setAttribute('accept', 'image/*');
          } else if (meta.filetype === 'file') {
              input.setAttribute('accept', '.pdf');
          }

          input.onchange = function () {
              const file = this.files[0];
              const reader = new FileReader();

              reader.onload = function () {
                  const uri = reader.result;
                  
                  if (meta.filetype === 'image') {
                      // Insert image
                      callback(uri, { alt: file.name });
                  } else if (meta.filetype === 'file') {
                      // Insert link to PDF
                      callback(uri, { text: file.name });
                  }
              };

              reader.readAsDataURL(file); // convert to base64 (local preview only)
          };

          input.click();
      }
  });

});

</script>
</body>
</html>

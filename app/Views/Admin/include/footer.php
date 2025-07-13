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
  $(document).ready(function() {
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
      automatic_uploads: true,
      convert_urls: true,
      images_upload_url: '<?= base_url('admin/services/upload_file') ?>',
      images_reuse_filename: true,

      images_upload_handler: async function(blobInfo, success, failure) {
        try {
          const formData = new FormData();
          formData.append('file', blobInfo.blob(), blobInfo.filename());

          const response = await fetch('<?= base_url('admin/services/upload_file') ?>', {
            method: 'POST',
            body: formData
          });

          const data = await response.json();

          if (data.location) {
            success(data.location); // Valid image URL
          } else {
            failure(data.error || 'Upload failed.');
          }
        } catch (err) {
          console.error(err);
          failure('Unexpected error uploading file.');
        }
      },

      file_picker_types: 'image file', // Must support both
      file_picker_callback: function(callback, value, meta) {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');

        if (meta.filetype === 'image') {
          input.setAttribute('accept', 'image/*');
        } else if (meta.filetype === 'file') {
          input.setAttribute('accept', '.pdf');
        }

        input.onchange = async function() {
          const file = this.files[0];
          const formData = new FormData();
          formData.append('file', file);

          try {
            const response = await fetch('<?= base_url('admin/services/upload_file') ?>', {
              method: 'POST',
              body: formData
            });

            const data = await response.json();

            if (!data.location) {
              alert(data.error || 'File upload failed.');
              return;
            }

            if (meta.filetype === 'image') {
              // ✅ Return image URL directly
              callback(data.location, {
                alt: file.name
              });
            } else {
              // ✅ Return link for PDFs
              callback(data.location, {
                text: file.name
              });
            }

          } catch (err) {
            console.error(err);
            alert('Upload error: ' + err.message);
          }
        };

        input.click();
      }
    });

  });
</script>
</body>

</html>
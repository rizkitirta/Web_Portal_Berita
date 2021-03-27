 <!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>

  <!-- DataTables  & Plugins -->
  <script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

  <!-- bs-custom-file-input -->
  <script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
  <script>
      $(function() {
          bsCustomFileInput.init();
      });

  </script>

  <!-- Summernote -->
  <script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- CodeMirror -->
  <script src="{{ asset('AdminLTE/plugins/codemirror/codemirror.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/codemirror/mode/css/css.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/codemirror/mode/xml/xml.js') }}"></script>
  <script src="{{ asset('AdminLTE/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
  <!-- Page specific script -->
  <script>
      $(function() {
          // Summernote
          $('#summernote').summernote()

          // CodeMirror
          CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
              mode: "htmlmixed",
              theme: "monokai"
          });
      })

  </script>

  <script>
      $(function() {
          $("#example1").DataTable({
              "responsive": true,
              "lengthChange": false,
              "autoWidth": false,
              "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
          });
      });

  </script>

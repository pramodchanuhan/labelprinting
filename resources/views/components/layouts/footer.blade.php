<!-- jQuery -->
{{-- <script src="assets/js/jquery-3.5.1.min.js"></script> --}}

<!-- Bootstrap Core JS -->
{{-- <script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> --}}

<!-- Slimscroll JS -->
<script src="{{asset('')}}assets/js/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('')}}assets/plugins/morris/morris.min.js"></script>
<script src="{{asset('')}}assets/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('')}}assets/js/chart.js"></script>

<!-- Custom JS -->
<script src="{{asset('')}}assets/js/app.js"></script>




<!-- Select2 JS -->
<script src="{{asset('')}}assets/js/select2.min.js"></script>

<!-- Datetimepicker JS -->
<script src="{{asset('')}}assets/js/moment.min.js"></script>
<script src="{{asset('')}}assets/js/bootstrap-datetimepicker.min.js"></script>
<script>
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    // for displaying file name on file input
    $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<!-- Datatable JS -->
<script src="{{asset('')}}assets/js/jquery.dataTables.min.js"></script>
<script src="{{asset('')}}assets/js/dataTables.bootstrap4.min.js"></script>



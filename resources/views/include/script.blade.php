<!-- App js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>

<!-- Summernote js -->
<script src="{{asset('assets/libs/summernote/summernote-bs4.min.js')}}"></script>

<!-- use for summernote and you need to use hidden input to get the data -->
<script>
    $(document).ready(function() {
        $('#summernote-basic').summernote({
            // Summernote options
        });

        // Add an event listener to update the hidden input when Summernote content changes
        $('#summernote-basic').on('summernote.change', function() {
            var summernoteContent = $('#summernote-basic').summernote('code');
            $('#summernote-content').val(summernoteContent);
        });
    });
</script>

<!-- Init js -->
<script src="{{asset('assets/js/pages/form-summernote.init.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>

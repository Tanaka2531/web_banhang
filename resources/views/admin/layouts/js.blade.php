<script src="{{ asset('adminate/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminate/js/jquery-3.6.4.min.js') }}"></script>
<script src="{{ asset('adminate/js/app.js') }}"></script>
<script src="{{ asset('adminate/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('adminate/js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('adminate/js/cdn.ckeditor.com_ckeditor5_37.0.1_classic_ckeditor.js') }}"></script>
<script src="{{ asset('adminate/js/chart.umd.js') }}"></script>
<!-- <script src="{{ asset('adminate/js/helpers.js') }}"></script> -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '.form_textarea' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!--ADMIN JS FILES-->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('libs/node-waves/waves.min.js')}}"></script>
<!-- Pdfmake -->
<script src="{{asset('libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- Required datatable js -->
<script src="{{ asset('/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Summernote js -->
<script src="{{ asset('/libs/summernote/summernote-bs4.min.js') }}"></script>
<!-- init js -->
<script src="{{asset('js/admin/pages/form-editor.init.js')}}"></script>
<!-- App js -->
<script src="{{ asset('/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('/js/admin//pages/form-validation.init.js') }}"></script>
<script src="{{asset('js/admin/app.js')}}"></script>

<script src="{{asset('/js/admin//pages/sweetalert.min.js')}}"></script>
<script src="{{asset('/js/admin//pages/toastr.min.js')}}"></script>

<script>
    $(document).ready(function(){$("#datatable").DataTable()});
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
</script>

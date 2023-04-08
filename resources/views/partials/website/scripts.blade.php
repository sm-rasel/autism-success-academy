<!-- all js here -->
<script src="{{ asset('js/website/jquery.min.js') }}"></script>
<script src="{{ asset('js/website/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/website/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/website/aos.js') }}"></script>
<script src="{{ asset('js/website/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/website/magnific-popup-options.js') }}"></script>
<script src="{{ asset('js/website/parallax.min.js') }}"></script>
<script src="{{ asset('js/website/custom.js') }}"></script>
<script src="{{asset('/js/admin//pages/sweetalert.min.js')}}"></script>
<script src="{{asset('/js/admin//pages/toastr.min.js')}}"></script>
<script>
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
<script>
$(document).ready(function() {
    $('#playvid').on('click', function(ev) {
        $("#visualvideo")[0].src += "&autoplay=1";
        ev.preventDefault();
        $('.visual-svg').addClass("d-none");
        $('.visualimage').addClass("d-none");
        $('.visual-video').removeClass("d-none");
    });
});
</script>


<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "show",
        "hideMethod": "hide"
    }
</script>



@if ($message = Session::get('success'))
    <script>
        toastr.success("{{ $message }}");
    </script>
@endif

@if ($message = Session::get('warning'))
    <script>
        toastr.warning("{{ $message }}");
    </script>
@endif

@if ($message = Session::get('info'))
    <script>
        toastr.info("{{ $message }}");
    </script>
@endif

@if ($message = Session::get('error'))
    <p>
        <script>
            toastr.warning("{{ $message }}");
        </script>
    </p>
@else
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <script>
                    toastr.warning("{{ $error }}");
                </script>
            @endforeach
        </ul>
    @endif
@endif

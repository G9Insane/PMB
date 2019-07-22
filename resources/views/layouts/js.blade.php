@yield('before_js')
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('plugins/datatables/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
{{--<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>--}}
{{--<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>--}}
{{--<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.world.js')}}"></script>--}}
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('dist/js/adminlte.js')}}"></script>
{{--<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>--}}
<script src="{{asset('dist/js/demo.js')}}"></script>
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function showModal() {
            $('#modal-xl').modal('show');
        }
        $('#modal-xl').on('hidden.bs.modal', function () {
            $('form').trigger("reset");
        });
        function edit(url) {
            $.get(url, function (data) {
                $.each(data, function (k, v) {
                    $('#' + k).val(v);
                    console.log(k,v);
                })

            })
                .done(function () {
                    showModal();
                })
        }

        function save(url) {
            $.ajax({
                type: 'POST',
                url: url,
                data: $('form').serializeArray()
            })
                .done(function (data) {
                   // location.reload()
                });
        }
        function d(url) {
            $.ajax({
                type: 'POST',
                url: url
            })
                .done(function (data) {
                    location.reload()
                });
        }
        $(function () {
            $('#example1').DataTable({});
        });
</script>
@yield('after_js')

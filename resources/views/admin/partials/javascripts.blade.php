<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/jquery/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/popper.js/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- waves js -->
<script src="{{ URL::asset('ablepro/assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

<!-- modernizr js -->
<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/modernizr/js/modernizr.js') }}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('ablepro/bower_components/modernizr/js/css-scrollbars.js') }}"></script>--}}

<!-- Custom js -->
<script src="{{ URL::asset('ablepro/assets/js/pcoded.min.js') }}"></script>
{{--<script src="{{ URL::asset('ablepro/assets/js/tinymce/tinymce.min.js') }}"></script>--}}
<script src="{{ URL::asset('ablepro/assets/js/vertical/vertical-layout.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ablepro/assets/js/script.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('ablepro/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

@yield('js')



<script src="//cdn.ckeditor.com/4.5.4/full/ckeditor.js"></script>
{{--<script src="{{ url('quickadmin/js') }}/bootstrap.min.js"></script>--}}
{{--<script src="{{ url('quickadmin/js') }}/main.js"></script>--}}

{{--<script>--}}

    {{--$('.datepicker').datepicker({--}}
        {{--autoclose: true,--}}
        {{--dateFormat: "{{ config('quickadmin.date_format_jquery') }}"--}}
    {{--});--}}

    {{--$('.datetimepicker').datetimepicker({--}}
        {{--autoclose: true,--}}
        {{--dateFormat: "{{ config('quickadmin.date_format_jquery') }}",--}}
        {{--timeFormat: "{{ config('quickadmin.time_format_jquery') }}"--}}
    {{--});--}}

    {{--$('#datatable').dataTable( {--}}
        {{--"language": {--}}
            {{--"url": "{{ trans('quickadmin::strings.datatable_url_language') }}"--}}
        {{--}--}}
    {{--});--}}

{{--</script>--}}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>


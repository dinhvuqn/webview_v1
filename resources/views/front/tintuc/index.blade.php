@extends('front.templates.layout')
@section('title', "Thông báo")
@section('css')
<link type="text/css" href="{!! url('public/giapha/css/common.css') !!}" rel="stylesheet">
<link type="text/css" href="{!! url('public/giapha/css/default.css') !!}" rel="stylesheet">
<link href="{!! url('public/giapha/css/bootstrap.min.css') !!}" rel="stylesheet">
@stop
@section('content')
	@if (count($tintucs) > 0)
        <div class="articles">
            @include('front.tintuc.load')
        </div>
    @endif
@stop
@section('js')
	<script src="{!! url('public/giapha/js/jQuery-2.1.4.min.js') !!}"></script>
    <script src="{!! url('public/giapha/js/bootstrap.min.js') !!}"></script>
    <script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();
                var root = '{{url("/")}}';
                $('.tindiaphuong').append("<img style=' left: 40%; z-index: 10000 ;position: absolute ;' src='"+root+"/public/giapha/images/loading2.gif' />");

                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.articles').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>
@stop
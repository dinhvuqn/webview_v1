@extends('front.templates.layout')
@section('title', "Thông báo")
@section('content')
<link type="text/css" href="{!! url('public/giapha/css/common.css') !!}" rel="stylesheet">
<link type="text/css" href="{!! url('public/giapha/css/default.css') !!}" rel="stylesheet">
<div class="tindiaphuong">
    <div class="tieude-h1"><a>Tin tức</a></div>
        <div class="nd_tindiaphuong">

			<div class="news_detail">
			    <h2 style="text-align: center;" class="headline">{{ $tintuc->tieude }}</h2>
			    <div class="summary"><p>{!! $tintuc->motangan !!}</p>
				</div>
			    <div class="detail">
					{!! $tintuc->noidung !!}
				</div>
			</div>
			<div class="next_news">
				<h4 class="title">Tin tức liên quan</h4>
				@foreach($tintucs as $item)
					<p class="headline"><a href="{{ url('tintuc/'.$item->id) }}">{{ $item->tieude }}</a> {{ format_date($item->created_at) }}
					</p>
				@endforeach
			</div>

</div>
</div>
@stop
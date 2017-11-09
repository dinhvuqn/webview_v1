<div class="tindiaphuong">
    <div class="tieude-h1"><a>Tin tức</a></div>
        <div class="nd_tindiaphuong">
        	<div class="tintuc">
			    <div class="topic">
			    <?php  
			    	$i=0;
			     ?>
			    @foreach($tintucs as $item)
			    <?php  
			    	$i++;
			     ?>
					@if($i%2==0)
						<div class="item alt">
					@else
						<div class="item">
					@endif
			        
				        <div class="img"><a href="{{ url('tintuc/'.$item->id) }}"><img css="" src="{!! asset('public/hinhanh/'.$item->img) !!}" alt="{{ $item->name }}"></a>
				        </div>
				        <div class="headline"><a href="{{ url('tintuc/'.$item->id) }}">{{ $item->tieude }}</a></div>
				        <div class="dateNews">Ngày: {{ format_date($item->created_at) }}</div>
				        <div class="summary">
							<p>{!! cutstr($item->motangan,30).'...' !!}</p>
						</div>
					</div>
				@endforeach
			    </div>
			</div>
    	</div>
	</div>
	{{ $tintucs->links() }}
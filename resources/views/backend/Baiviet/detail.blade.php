<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#detail_vi">Mô tả ngắn</a></li>
        <li><a data-toggle="tab" href="#detail_en">Nội dung</a></li>
    </ul>
    <div class="tab-content">
        <div id="detail_vi" class="tab-pane fade in active">
           
            <br/>
            <div class="content-block">{!!$post->motangan!!}</div>
        </div>
        <div id="detail_en" class="tab-pane fade">
            <br/>
            <div class="content-block">{!!$post->noidung!!}</div>
        </div>
    </div>
</div>
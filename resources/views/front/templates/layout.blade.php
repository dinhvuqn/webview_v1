<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta content="vi_VN" property="og:locale">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{!! url('public/webview/assets/') !!}" rel="icon" />
    <script src="{!! url('public/webview/assets/js/jquery-2.1.1.min.js') !!}" type="text/javascript"></script>
    <link href="{!! url('public/webview/assets/css/bootstrap.min.css') !!}" rel="stylesheet" media="screen" />
    <script src="{!! url('public/webview/assets/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700&amp;subset=vietnamese" rel="stylesheet">
    <link href="{!! url('public/webview/assets/css/stylesheet.css') !!}" rel="stylesheet">
    <link href="{!! url('public/webview/assets/css/owl.carousel.css') !!}" type="text/css" rel="stylesheet" media="screen" />
    <script src="{!! url('public/webview/assets/js/common.js') !!}" type="text/javascript"></script>

    <script src="{!! url('public/webview/assets/js/script.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/webview/assets/js/owl.carousel.min.js') !!}" type="text/javascript"></script>
    <script src="{!! url('public/webview/assets/js/jQuery.scrollSpeed.js') !!}" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.min.css" />
    <script src="{!! url('public/webview/assets/js/bootstrap-notify.min.js') !!}"></script>
    @yield('css')
</head>
<!-- header-->
<body class="common-home">
    @include('front.templates.elements._menu')
<!-- #end header-->
@yield('content')
<div class="sidefloat-menu hidden-xs hidden-sm">
        <ul class="list-unstyled">
            <li><a href="http://talktv.vn/kingofwarrrrrrrr" target="_blank"><img src="https://shopacckow.vn/assets/img/talktvlogo.png" class="img-sideload" alt=""></a></li>
            <li><a href="tel:01646073333"><img src="https://shopacckow.vn/assets/img/calllogo.png"  class="img-sideload" alt=""></a></li>
            <li><a target="_blank" href="https://www.facebook.com/kingofwarrr"><img src="https://shopacckow.vn/assets/img/fblogo.png"  class="img-sideload"  alt=""></a></li>
            <li><a target="_blank" href="https://www.youtube.com/channel/UC7gtk3R1Ks4_P18hLGGwa9A"><img src="https://shopacckow.vn/assets/img/youtubelogo.png"  class="img-sideload"  alt=""></a></li>
        </ul>
    </div>
<!-- Modal -->
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                 <center>
                        <h3 class="ar-margin-remove"> <b> Thông Báo Cập Nhật </b></h3>
                    </center>

            </div>
            <div class="modal-body">
                <center>
                    <p>1.<B style="color: red;"> Website vừa cập nhật một số acc sever Hàn Quốc !</B></p>
                <p>Bấm vào mục <a href="https://shopacckow.vn/account-LMHTHQ.html" style="color: red;"> <b> ACC HÀN  </b> </a> ở đầu trang để sở hữu cho mình một acc bạn nhé !.</p>
                <p>2.<b style="color: red;"> Hiện tại một số acc đang không hiện ảnh , mong các bạn thông cảm , bọn mình đang update lại ảnh cho acc.</b></p>
                </center>
                
            </div>
            <div class="panel-heading">
                <center> <button type="button" class="btn btn-primary" data-dismiss="modal">OK baby</button></center>
               
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@include('front.templates.elements._footer')
@yield('js')

</body>

</html>
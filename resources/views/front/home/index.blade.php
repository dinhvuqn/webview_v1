@extends('front.templates.layout')
@section('title', 'Trang chủ')

@section('content')
<div class="container"  style="opacity: 1; display: block; padding-top: 70px;">
    <div id="bottom-c" class="bottom-c">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <center>
                        <h3 class="ar-margin-remove">Hướng dẫn mua acc</h3>
                    </center>
                    </div>
                    <div class="panel-body">
                         <iframe width="100%" height="315" src="https://www.youtube.com/embed/ErCdyrL20xE?rel=0&amp;showinfo=0?ecver=2&autoplay=1" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <center>
                        <h3 class="ar-margin-remove">Dịch Vụ</h3>
                    </center>
                    </div>
                    <div class="panel-body">
                         <img src="https://shopacckow.vn/uploads/e70f4ed44279eaf11c4910684db169f1dichvu.png"   width="100%" height="320"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div id="bottom-c" class="bottom-c">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <center>
                        <h3 class="ar-margin-remove">Giao dịch gần đây</h3>
                    </center>
                    </div>
                    <div class="table-responsive mygrid-wrapper-div">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 40%;">Bán Acc : <a  href="https://shopacckow.vn/acc-62769-LMHT.html" target="_blank"><b class="text-success">LMHT #62769</b></a>
                                        </td>
                                    <td style="width: 30%;"><b class="text-danger">30,000</b><sup class="text-muted"> vnđ</sup>
                                        </td>
                                    <td style="width: 30%;"> 1 phút trước</td>
                                    </tr>
                                    <tr><td style="width: 40%;">Bán Acc : <a  href="https://shopacckow.vn/acc-55357-LMHT.html" target="_blank"><b class="text-success">LMHT #55357</b></a>
                                        </td>
                                        <td style="width: 30%;"><b class="text-danger">30,000</b><sup class="text-muted"> vnđ</sup>
                                        </td>
                                    <td style="width: 30%;"> 6 phút trước</td>
                                    </tr>                        
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <center>
                        <h3 class="ar-margin-remove">Nạp tiền bằng thẻ</h3>
                    </center>
                    </div>
                    <div class="panel-body">
                        <div class="row text-center">
                            <form id="topup-card" name="topup-card">
                                <input type="hidden" name="_token" value="3e4LGd0YRkG8NXA2Pih1RXkqJWbL7S8SxRsVEGED">
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only">Số Seri</label>
                                        <input class="form-control input-sm" id="" name="serial" placeholder="Mã serial" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <label class="sr-only">Mã thẻ</label>
                                        <input class="form-control input-sm" id="" name="card_code" placeholder="Mã thẻ" type="text">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <select class="form-control input-sm input-block" name="type">
                                            <option value="VTT">Viettel</option>
                                            <option value="VMS">Mobiphone</option>
                                            <option value="VNP">Vinaphone</option>
                                            <option value="FPT">Gate</option>
                                            <option value="VNM">Vietnammobile</option>
                                            <option value="MGC">Megacard</option>
                                            <option value="ONC">OnCash</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="form-group">
                                        <button class="btn btn-success btn-sm btn-block" data-loading-text="Đang xử lý..." id="btn-topup" type="button">Nạp luôn
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <img src="assets/img/thenap.png" width="100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div id="top-block" class="top-block">
    <div class="container">
        <div id="bottom-c" class="bottom-b">
        <div class="row">
             <div id="slideshow0" class="owl-carousel owl-theme">
                    <div class="owl-wrapper-outer"><div class="item">
                     <img src="https://i.imgur.com/29ODzP3.jpg" alt="Slide 1" class="img-responsive">
                    </div>
                </div>
                <div class="owl-item">
                     <div class="item">
                        <img src="https://shopacckow.vn/uploads/58567d92af40574bcc3983b467ec5110bangiacay.png" alt="Slide 2" class="img-responsive">                        
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="owl-controls clickable">    
            <div class="owl-buttons">
                <div class="owl-prev">
                    
                </div>
            </div>
        </div>

    
    <script type="text/javascript">
        <!--
        $('#slideshow0')
            .owlCarousel({
                items: 6,
                singleItem: true,
                autoPlay: 3000,
                navigation: true,
                navigationText: ['<i class="fa fa-chevron-left fa-5x"></i>', '<i class="fa fa-chevron-right fa-5x"></i>'],
                pagination: false
            });
        -->
    </script>
    </div>
</div>

   @stop

   @section('js')
   <!-- Start of LiveChat (www.livechatinc.com) code -->
// <script type="text/javascript">
// window.__lc = window.__lc || {};
// window.__lc.license = 9110830;
// (function() {
//   var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
//   lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
//   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
// })();
// </script>
<!-- End of LiveChat code -->
        
 <!-- WhatsHelp.io widget -->
// <script type="text/javascript">
//     (function () {
//         var options = {
//             facebook: "1027460200673964", // Facebook page ID
//             company_logo_url: "//scontent.xx.fbcdn.net/v/t1.0-1/p50x50/15622678_1196514803768502_5859839950919074546_n.jpg?oh=976af7f1557dfd5b05b12ad752bc439a&oe=59C93F0E", // URL of company logo (png, jpg, gif)
//             greeting_message: "Chào mừng bạn đến với shopacckow.vn !\nBạn cần hỗ trợ gì không ạ ? Nhắn tin cho mình nhé !", // Text of greeting message
//             call_to_action: "Chào bạn ! Bạn cần hỗ trợ gì không ạ ?", // Call to action
//             position: "right", // Position may be 'right' or 'left'
//         };
//         var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
//         var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
//         s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
//         var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
//     })();
// </script>
<!-- /WhatsHelp.io widget -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.0/js.cookie.js"></script>

    </script>

        <script type="text/javascript">
        
//         $(document).ready(function () {
            
// setTimeout(function(){
//             // if(!Cookies.get('modalShow')) {
//             //  $('#memberModal').modal('show');
//             //   Cookies.set('modalShow', true);
//             // }
        			
//     },3000);
    
   

// });

            $(function() {

                // Default
                jQuery.scrollSpeed(100, 500);

            });
        </script>
        
        
<!--<script type="text/javascript" src="https://livesp.kingofwar.vn/php/app.php?widget-init.js"></script>-->


        <script type="text/javascript">
        $(".thongtin").each(function () {
            text = $(this).text();
            if (text.length > 200) {
                $(this).html(text.substr(0, 100) + '...');
            }
            });
            var Notify = function(notifyMsg, notifyType, notifyFrom, notifyAlign, notifyIcon, notifyUrl) {
            var $notify = $(this);
            var $notifyMsg = notifyMsg;
            var $notifyType = notifyType ? notifyType : 'info';
            var $notifyFrom = notifyFrom ? notifyFrom : 'top';
            var $notifyAlign = notifyAlign ? notifyAlign : 'right';
            var $notifyIcon = notifyIcon ? notifyIcon : '';
            var $notifyUrl = notifyUrl ? notifyUrl : '';
            $.notify(
              {
                icon: $notifyIcon,
                message: $notifyMsg,
                url: $notifyUrl
              },
              {
                element: 'body',
                type: $notifyType,
                allow_dismiss: true,
                newest_on_top: true,
                showProgressbar: false,
                placement: {
                  from: $notifyFrom,
                  align: $notifyAlign
                },
                offset: 20,
                spacing: 10,
                z_index: 1033,
                delay: 5000,
                    timer: 1000,
                animate: {
                  enter: 'animated fadeIn',
                  exit: 'animated fadeOutDown'
                }
              }
            );
          };
        </script>
        
    <script src="{!! url('public/webview/assets/js/bootstrap-typeahead.js') !!}"></script>
<script type="text/javascript" src="{!! url('public/webview/assets/js/skins.json') !!}"></script>
    <script type="text/javascript">
$(document).ready(function () {
      $('#filter_skin').typeahead({
          source: JSON.parse(skins)
      });
    });
        $(document).on('click', '.pagination a', function () {
            var link = $(this).attr('href');
                link = link.split('=');
                $('#pagination').attr('data-page', link[1]);
                loadAcc();
            return false;
        });

        $("#btn-topup").click(function() {
            var $btn = $(this);
                $btn.button('loading');

            req = $.ajax({
              url: "/api/v1.0/user/transaction",
              type: "POST",
              data: $('#topup-card').serialize()
            });
            req.done(function (response, textStatus, jqXHR){
              $btn.button('reset');
              if (response.result) {
                notifyTopCenter(response.msg, 'success', 'fa fa-check');
                setTimeout(function () {
                    window.location.reload();
                }, 2000);
              } else {
                notifyTopCenter(response.msg, 'danger', 'fa fa-times');
              }
            });
            req.error(function (response, a, b, c) {
                $btn.button('reset');
                data = JSON.parse(response.responseText);
                notifyTopCenter(data.error, 'danger', 'fa fa-times');
            });
            event.preventDefault();
            
        });

        // Load acc
        loadAcc();
        $('#filterbyrank, #price, #filter_skin').change(function () {
            $('#pagination').attr('data-page', 1);
            loadAcc();
        });
        function loadAcc() {
            var rank = $('#filterbyrank').find('option:selected').val();
            var price = $('#price').find('option:selected').val();
            var champ = $('#filter_skin').val();
            var page = $('#pagination').attr('data-page');
            
            $.ajax({
                data: {
                    rank: rank,
                    price: price,
                    champ: champ,
                    page: page,
                    ajax: true
                },
                success: function (data) {
                    $('#show_acc').html(data.list);
                    $('#pagination').html(data.page);
                }
            });
        }

        function notifyTopCenter ($notifyMsg, $notifyType, $notifyIcon) {
            Notify($notifyMsg, $notifyType, "", "center", $notifyIcon, "");
        }
    </script>
   @stop
   @extends('front.templates.layout')
   @section('title', 'Đăng nhập')

   @section('content')
   <div class="container" style="padding-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="https://shopacckow.vn/login">
                        <input type="hidden" name="_token" value="Kye6LmN4THk67mfPBLrcF1cwTAiuS0EuHZFIqudB">

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Địa chỉ E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Mật Khẩu: </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <center>
                                <button type="submit" class="btn btn-success">
                                    Đăng Nhập
                                </button>
                                
                                <a class="btn btn-info" href="https://shopacckow.vn/redirect"><i class="fa fa-facebook-official" aria-hidden="true"></i> Đăng nhập bằng Facebook</a>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
   @stop
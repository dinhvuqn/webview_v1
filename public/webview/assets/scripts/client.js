var URL_API_ACCOUNT = '../php-library/Api/0.account.php',
    URL_API_YOUTUBE = '../php-library/Api/1.youtube.php',
    icon_loading_15 = '<i class="fa fa-spinner fa-pulse fa-2x"></i>',
    icon_loading = '<i class="fa fa-spinner fa-pulse"></i>';

$(document).ready(function () {
    $('#clock-expiry').countdown(expiry, function(event) {
        $(this).html(event.strftime('%D days %H:%M:%S'));
    })
    .on('finish.countdown', function(event) {
        $(this).html('Expired!');
        initS._checkMembership();
    });

    $('.table-history').dataTable({
        "bSort": false,
        "iDisplayLength": 25,
        "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>'
    });

    initS._checkBalance();
	
    setBodySmall();

    $('.hide-menu').click(function(event){
        event.preventDefault();
        if ($(window).width() < 769) {
            $("body").toggleClass("show-sidebar");
        } else {
            $("body").toggleClass("hide-sidebar");
        }
    });

    $('#side-menu').metisMenu();

    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });

    $('.animate-panel').animatePanel();

    $('.showhide').click(function (event) {
        event.preventDefault();
        var hpanel = $(this).closest('div.hpanel');
        var icon = $(this).find('i:first');
        var body = hpanel.find('div.panel-body');
        var footer = hpanel.find('div.panel-footer');
        body.slideToggle(300);
        footer.slideToggle(200);

        // Toggle icon from up to down
        icon.toggleClass('fa-chevron-up').toggleClass('fa-chevron-down');
        hpanel.toggleClass('').toggleClass('panel-collapse');
        setTimeout(function () {
            hpanel.resize();
            hpanel.find('[id^=map-]').resize();
        }, 50);
    });

    $('.closebox').click(function (event) {
        event.preventDefault();
        var hpanel = $(this).closest('div.hpanel');
        hpanel.remove();
    });

    $('.small-header-action').click(function(event){
        event.preventDefault();
        var icon = $(this).find('i:first');
        var breadcrumb  = $(this).parent().find('#hbreadcrumb');
        $(this).parent().parent().parent().toggleClass('small-header');
        breadcrumb.toggleClass('m-t-lg');
        icon.toggleClass('fa-arrow-up').toggleClass('fa-arrow-down');
    });

    fixWrapperHeight();

    $('.modal').appendTo("body")

});

$(window).bind("load", function () {
    $('.splash').css('display', 'none')
})

$(window).bind("resize click", function () {
    setBodySmall();
    setTimeout(function () {
        fixWrapperHeight();
    }, 300);
})

function fixWrapperHeight() {
    var headerH = 62;
    var navigationH = $("#navigation").height();
    var contentH = $(".content").height();
    if (contentH < navigationH) {
        $("#wrapper").css("min-height", navigationH + 'px');
    }
    if (contentH < navigationH && navigationH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH  + 'px');
    }
    if (contentH > navigationH && contentH < $(window).height()) {
        $("#wrapper").css("min-height", $(window).height() - headerH + 'px');
    }
}

function setBodySmall() {
    if ($(this).width() < 769) {
        $('body').addClass('page-small');
    } else {
        $('body').removeClass('page-small');
        $('body').removeClass('show-sidebar');
    }
}

$.fn['animatePanel'] = function() {
    var element = $(this);
    var effect = $(this).data('effect');
    var delay = $(this).data('delay');
    var child = $(this).data('child');

    if(!effect) { effect = 'zoomIn'};
    if(!delay) { delay = 0.03 } else { delay = delay / 10 };
    if(!child) { child = '.row > div'} else {child = "." + child};

    var startAnimation = 0;
    var start = Math.abs(delay) + startAnimation;

    var panel = element.find(child);
    panel.addClass('opacity-0');

    panel = element.find(child);
    panel.addClass('animated-panel').addClass(effect);

    panel.each(function (i, elm) {
        start += delay;
        var rounded = Math.round(start * 10) / 10;
        $(elm).css('animation-delay', rounded + 's')
        $(elm).removeClass('opacity-0');
    });
}

$.fn.extend({
    disable: function(state) {
        if (state) {
            this.data('html', this.html());
            this.html(icon_loading);
        } else {
            this.html(this.data('html'));
        }
        return this.each(function() {
            this.disabled = state;
        });
    }
});

var nalert = {
    _toastr: function(message, type, timeout) {
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-center",
            "closeButton": true,
            "progressBar": true,
            "timeOut": timeout,
            "hideDuration": "0",
            "toastClass": "animated fadeInDown",
        };
        switch(type) {
            case 'info':
                toastr.info(message);
                break;
            case 'success':
                toastr.success(message);
                break;
            case 'warning':
                toastr.warning(message);
                break;
            case 'error':
                toastr.error(message);
                break;
        }
    },

    _alert: function(title, text, status) {
        swal(title, text, status);
    },

    _prompt: function(title, text, callback) {
        swal({   
            title: title,
            text: text,
            type: "input",   
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            showLoaderOnConfirm: true,
        }, function(inputValue) {
            if (inputValue === false) 
                return false;
            if (inputValue === "") {
                swal.showInputError("Please input!");     
                return false   
            }
            callback(inputValue);
        });
    },

    _confirm: function(title, text, confirm, callback) {
        swal({
            title: title,
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: confirm,
            closeOnConfirm: false
        }, function() {
            callback();
        });
    },

    _term: function() {
        swal({
            title: '<span class="text text-info font-bold">MotDanGa - Term</span>',
            text: '<div class="text text-info" style="text-align: left;">'+
                '<ul class="fa-ul">'+
                    '<li><i class="fa-li fa fa-check-square"></i> CAN enable monetization but disbale TrueView Video Ads.</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO private status.</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO block or allow country.</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO enable age restriction.</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO REFUND if you order with bugs as block country, account suspension, inappropriate content...</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO REFUND for your video has large original view. Because we are not sure that we can ensure to control your original view source.</li>'+
                    '<li><i class="fa-li fa fa-check-square"></i> NO REFUND for the video has been blocked some country (Can consider).</li>'+
                '</ul>'+
            '</div>',
            html: true
        });
    },

    _termMembership: function(callback) {
        swal({
            title: '<span class="text text-info font-bold">Upgrade - Term</span>',
            text: '<div class="text" style="text-align: left;">'+
                '<ol>'+
                    '<li>Không có gì</li>'+
                '</ol>'+
                '<div class="text-center"><input id="cb-term" type="checkbox" style="display: inline; height: 20px; box-shadow: none;"> Bạn có đồng ý?</div>'+
            '</div>',
            html: true,
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, active now!",
            closeOnConfirm: false,
        }, function() {
            if ($('#cb-term').is(':checked')) {
                callback();
            } else {
                nalert._toastr('Bạn chưa đồng ý điều khoản.', 'warning', 5000);
            }
        });
    },
}

var initS = {      
    _logout: function() {
        $.ajax({
            url: URL_API_ACCOUNT,
            type: 'POST',
            data: {
                action: 'logout'
            },
            success: function(data) {
                window.location = 'index';
            },
            error: function(data) {
                nalert._toastr('PLEASE TRY AGAIN!', 'error', 10000);
            }
        }) 
    },

    _checkBalance: function() {
        $.ajax({
            beforeSend: function() {
                $('#balance, #bonus, #balance1, #bonus1').disable(true)
            },
            url: URL_API_ACCOUNT,
            type: 'POST',
            data: {
                action: 'getBalance'
            },
            success: function(data) {
                $('#balance, #bonus, #balance1, #bonus1').disable(false);
                if (data.status == 'success') {
                    $('#balance').html('$' + data.balance);
                    $('#bonus').html('$' + data.bonus);
                    $('#balance1').html('$' + data.balance1);
                    $('#bonus1').html('$' + data.bonus1);
                } else {
                    nalert._toastr('Cant get balance. Please try again!', 'error', 5000);
                }
            },
            error: function(data) {
                nalert._toastr('PLEASE TRY AGAIN!', 'error', 30000);
            }
        }) 
    },

    _checkMembership: function() {
        $.ajax({
            beforeSend: function() {
                
            },
            url: URL_API_ACCOUNT,
            type: 'POST',
            data: {
                action: 'checkMembership'
            },
            success: function(data) {
                window.location = '';
            },
            error: function(data) {
                nalert._toastr('PLEASE TRY AGAIN!', 'error', 30000);
            }
        })
    }
}

// Event Button
$(document).on('click', '#logout', function() {
    initS._logout();
})

$(document).on('click', '.btn-check-balance', function() {
    initS._checkBalance();
})
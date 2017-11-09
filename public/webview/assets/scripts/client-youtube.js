var motdanga = {
    _totalPendingOrder: function() {
        $.ajax({
            beforeSend: function() {
                $('#total_pending_order').html(icon_loading_15);
            },
            url: URL_API_YOUTUBE,
            type: 'POST',
            data: {
                action: 'totalPendingOrder'
            },
            success: function(data) {
                if (data.pending > 0) {
                    var strDateTime = data.time + ' (GMT+7) ';
                    var myDate = new Date(strDateTime);
                    $('#last_order_running').html(data.lastOrder);
                    $('#last_time_running').html(myDate.toLocaleString());
                } else {
                    $('#total_pending_order').removeClass('label-danger').addClass('label-success');
                    $('#last_order_running').parent('label').remove();
                    $('#last_time_running').parent('label').remove();
                }
                $('#total_pending_order').html(data.pending);
            }
        })
    },

    _cancelOrder: function(button) {
        var historyOrder_id = button.data('id');
        nalert._confirm('Are you sure?', '', 'OK', function() {
            button.disable(true);
            $.ajax({
                url: URL_API_YOUTUBE,
                type: 'POST',
                data: {
                    action: 'cancelOrder',
                    historyOrder_id: historyOrder_id
                },
                success: function(data) {
                    if (data.success) {
                        nalert._alert('DONE!', '', 'success');
                        button.parents('tr').toggle('slow');
                        initS._checkBalance();
                    } else {
                        nalert._toastr('ERROR! '+data.error, 'warning', 5000);
                    }
                    button.disable(false);
                }
            })
        })
    },

    _avoidOrder: function(button) {
        var historyOrder_id = button.data('id');
        nalert._confirm('Đơn hàng đang chạy sẽ không được refund khi bạn dừng đơn hàng. Bạn có chắc chắn muốn dừng đơn hàng?', '', 'OK', function() {
            button.disable(true);
            $.ajax({
                url: URL_API_YOUTUBE,
                type: 'POST',
                data: {
                    action: 'avoidOrder',
                    historyOrder_id: historyOrder_id
                },
                success: function(data) {
                    if (data.success) {
                        nalert._alert('DONE!', '', 'success');
                        button.parents('tr').toggle('slow');
                        initS._checkBalance();
                    } else {
                        nalert._toastr('ERROR! '+data.error, 'warning', 5000);
                    }
                    button.disable(false);
                }
            })
        })
    },

    _stopRunning: function(button) {
        var historyOrder_id = button.data('id');
        nalert._confirm('Bạn muốn dừng chạy view tức thì cho đơn hàng này?', '', 'OK', function() {
            button.disable(true);
            $.ajax({
                url: URL_API_YOUTUBE,
                type: 'POST',
                data: {
                    action: 'stopRunning',
                    historyOrder_id: historyOrder_id
                },
                success: function(data) {
                    if (data.success) {
                        nalert._alert('DONE!', '', 'success');
                    } else {
                        nalert._toastr('ERROR! '+data.error, 'warning', 5000);
                    }
                    button.disable(false);
                }
            })
        })
    }
}

var youtube = {
    // HIEN THONG BAO
    _resultStatus: function(status, element, message) {
        if (status == 'success') {
            element.parent().next().removeClass('text-danger');
            element.parent().next().fadeOut(function() {
                $(this).html('<i class="fa fa-info-circle"></i> ' + message);
                $(this).fadeIn();
            })
        } else {
            element.parent().next().addClass('text-danger');
            element.parent().next().fadeOut(function() {
                $(this).html('<i class="fa fa-remove"></i> ' + message);
                $(this).fadeIn();
            })
        }

        youtube._total();
    },

    // LAY ID CUA VIDEO
    _ytParser: function(link) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
        var match = link.match(regExp);
        return (match && match[7].length == 11) ? match[7] : false;
    },

    // KIEM TRA DUNG DINH DANG VIDEO KHONG
    _isYoutube: function(element, callback) {
        $('#btn-submit').disable(true);
        var link = element.val().trim();
        element.parent().next().html(icon_loading_15);
        if (link == '') {
            youtube._resultStatus('error', element, 'Please input youtube link');
            $('#btn-submit').disable(false);
        } else {
            var video_id = youtube._ytParser(element.val().trim());
            if (!video_id) {
                youtube._resultStatus('error', element, 'Wrong youtube link');
                element.data('video-id', '');
                $('#btn-submit').disable(false);
            } else {
                element.data('video-id', video_id);
                youtube._checkDuplicate(element, video_id); 
                youtube._apiYoutube(element, video_id, callback);
            }
        }
    },

    // LAY THONG TIN VIDEO
    _apiYoutube: function(element, video_id, callback) {
        var service_id = element.parents('.form-horizontal').find('.service_id').val();
        var keys = ['AIzaSyDEu-03fNag0Sa7Ggvleau_4X1OGbGJxug', 'AIzaSyCuwoD91FUjMa7bG332B3nam9svrR5DcX0', 'AIzaSyA0yXywutPh-Wf2h6JFM40SAWh04X52Z0A', 'AIzaSyA50ajFCvqZElj28lpD7TVdrIHKkiMeM28', 'AIzaSyCTFprGUHcaUKZyC2kZrXDrijQSpsxewQ0', 'AIzaSyAiq5Fj1EOReh7qz3bn_NtgmSJ5ND1kZQQ'];
        $.ajax({
            url: 'https://www.googleapis.com/youtube/v3/videos',
            data: {
                key: keys[Math.floor(Math.random() * keys.length)],
                part: 'contentDetails, statistics, status, snippet',
                id: video_id
            },
            cache: false,
            success: function(data) {
                if (Object.keys(data.items).length > 0) {
                    var uploadStatus = data.items[0].status.uploadStatus;
                    if (service_id == 11) {
                        if ($.inArray(uploadStatus, ['', 'rejected', 'deleted']) > -1) {
                            youtube._resultStatus('error', element, 'Please check STATUS video (Status: ' + uploadStatus + ')');
                        } else {
                            youtube._resultStatus('success', element, '<strong>Title:</strong> ' + data.items[0].snippet.title + '<br /><strong>Views:</strong> ' + parseInt(data.items[0].statistics.viewCount).toLocaleString());
                            callback();
                        }
                    } else {
                        if ($.inArray(uploadStatus, ['', 'rejected', 'deleted', 'uploaded']) > -1) {
                            youtube._resultStatus('error', element, 'Please check STATUS video (Status: ' + uploadStatus + ')');
                        } else {
                            youtube._resultStatus('success', element, '<strong>Title:</strong> ' + data.items[0].snippet.title + '<br /><strong>Views:</strong> ' + parseInt(data.items[0].statistics.viewCount).toLocaleString());
                            callback();
                        }
                    }
                } else {
                    youtube._resultStatus('error', element, 'Please check YOUR LINK');
                }
                $('#btn-submit').disable(false);
            },
            error: function() {
                youtube._resultStatus('error', element, 'Please CONTACT admin');
            }
        })
    },

    // KIEM TRA TRUNG LAP VIDEO
    _checkDuplicate: function(element, video_id) {
        $('.muliple-link .order_video').not(element).each(function() {
            if (video_id == $(this).data('video-id')) {
                if (element.parents('form').parent().hasClass('single-link')) {
                    $(this).parents('form').parent().remove();
                } else {
                    element.parents('form').parent().remove();
                }
                youtube._total();
                nalert._toastr('Duplicate link', 'warning', 2000);
                return;
            }
        })
        $('#btn-submit').disable(false);
    },

    // TINH TONG TIEN
    _total: function() {
        var totalMoney = 0;
        $('.muliple-link .order_sum').each(function() {
            if ($(this).parents('.form-horizontal').find('.order_video').val() == '' || $(this).parents('.form-horizontal').find('.order_video').parent().next().hasClass('text-danger')) {
            } else {
                totalMoney += parseFloat($(this).val());
            }
        })
        $('#ipt-total-money').val(totalMoney);
    },

    // XOA NHUNG DONG ORDER KHONG HOP LE
    _removeInvalid: function() {
        $('.muliple-link .form-group').each(function() {
            if ($(this).find('.help-block').hasClass('text-danger') || $(this).find('input').val().trim() == '') {
                if (!$(this).parent().parent().hasClass('single-link'))
                    $(this).parents('form').parent().remove();
            }
        })
    },

    // TIEN HANH XU LY ORDER
    _order: function(element) {
        youtube._removeInvalid();
        var checker = false;
        $('.muliple-link .form-group').each(function() {
            if (!$(this).find('.help-block').hasClass('text-danger') && $(this).find('input').val().trim() != '') {
                checker = true;
                var service_id = $(this).find('.service_id').val(),
                    order_video = $(this).find('.order_video').data('video-id'),
                    refer = (service_id != 4 && service_id != 5 && service_id != 10 && service_id != 12) ? '' : $(this).find('.order_video_refer').data('video-id'),
                    geo = 'ALL',
                    order_want = $(this).find('.order_want').val(),
                    schedule = $(this).find('.cb-schedule').is(':checked'),
                    hour = $(this).find('.hour-schedule').val(),
                    date = $(this).find('.date-schedule').val();
                var elee = $(this);
                if (date.indexOf(',') > -1) {
                    var arr_date = date.split(',');
                    $.each(arr_date, function(i, eval) {
                        console.log(eval);
                        schedule = 1;
                        var date1 = eval.split('/'),
                            schedule_date = date1[2]+'-'+date1[1]+'-'+date1[0]+' '+hour+':00';
                        youtube._processOrder(elee.find('.order_video'), service_id, order_video, refer, geo, order_want, schedule, schedule_date);
                    })
                } else {
                    if (schedule) {
                        if (hour != '' && date != '') {
                            schedule = 1;
                            date = date.split('/');
                            var schedule_date = date[2]+'-'+date[1]+'-'+date[0]+' '+hour+':00';
                        } else {
                            schedule = 0;
                            var schedule_date = '';
                        }
                    } else {
                        schedule = 0;
                        var schedule_date = '';
                    }

                    schedule = service_id == 11 ? 0 : schedule;
                    schedule_date = service_id == 11 ? '' : schedule_date;
                    youtube._processOrder($(this).find('.order_video'), service_id, order_video, refer, geo, order_want, schedule, schedule_date);
                }
            }
        })
        if (!checker) {
            nalert._toastr('No link', 'warning', 2000);
        }
    },

    // XU LY TUNG ORDER
    _processOrder: function(element, service_id, order_video, refer, geo, order_want, schedule, schedule_date) {
        $.ajaxq('Order', {
            beforeSend: function() {
                element.parent().next().html(icon_loading_15);
                $('#btn-submit').disable(true);
            },
            url: URL_API_YOUTUBE,
            type: 'POST',
            data: {
                action: 'order',
                service_id: service_id,
                order_video: order_video,
                order_video_refer: refer,
                order_geo: geo,
                order_want: order_want,
                schedule: schedule,
                schedule_date, schedule_date
            },
            success: function(data) {
                $('#btn-submit').disable(false);
                if (data.allowCountry) {
                    youtube._resultStatus(data.status, element, data.message + '<br />' + data.allowCountry);
                } else if (data.blockCountry) {
                    youtube._resultStatus(data.status, element, data.message + '<br />' + data.blockCountry);
                } else {
                    youtube._resultStatus(data.status, element, data.message);
                }
                initS._checkBalance();
            },
            error: function(data) {
                 youtube._resultStatus('error', element, 'Please try again or contact ADMIN.');
                $('#btn-submit').disable(false);
            }
        })
    },

    // XU LY TIM KIEM ORDER
    _searchOrder: function(element) {
        var keyword = $('#ipt-keyword').val().trim();
        if (keyword == '') {
            nalert._toastr('Please input keyword.', 'warning', 3000);
            $('#ipt-keyword').focus();
        } else {
            $.ajax({
                beforeSend: function() {
                    $('#tbody-search').html('<tr><td colspan="8" class="text-center">'+icon_loading_15+'</td></tr>');
                    element.disable(true);
                },
                url: URL_API_YOUTUBE,
                type: 'POST',
                data: {
                    action: 'searchOrder',
                    keyword: keyword,
                },
                success: function(data) {
                    $('#tbody-search').html('');
                    if (data.total > 0) {
                        $.each(data.data, function(i, eval) {
                            $('#tbody-search').append(youtube._rowSearch(eval.account_user, eval.historyOrder_id, eval.historyOrder_processed, eval.historyOrder_completed, eval.service_name, eval.historyOrder_video, eval.historyOrder_startCount, eval.historyOrder_wantCount, eval.historyOrder_currentCount, eval.historyOrder_status, eval.historyOrder_gooGl))
                        })
                    } else {
                        $('#tbody-search').html('<tr><td colspan="8" class="text-center font-bold">NO RESULT</td></tr>');
                    }
                    element.disable(false);
                },
                error: function(data) {
                    nalert._toastr('PLEASE TRY AGAIN!', 'error', 30000);
                }
            })
        }
    },

    // XU LY TIM KIEM THEO NGAY
    _searchOrderByDate(button) {
        var keyword = $('#date-search').val().trim();
        if (keyword == '') {
            nalert._toastr('Please choose date.', 'warning', 3000);
            $('#date-search').focus();
        } else {
            $.ajax({
                beforeSend: function() {
                    $('#tbody-search').html('<tr><td colspan="8" class="text-center">'+icon_loading_15+'</td></tr>');
                    button.disable(true);
                },
                url: URL_API_YOUTUBE,
                type: 'POST',
                data: {
                    action: 'searchOrderByDate',
                    keyword: keyword,
                },
                success: function(data) {
                    $('#tbody-search').html('');
                    if (data.total > 0) {
                        $.each(data.data, function(i, eval) {
                            $('#tbody-search').append(youtube._rowSearch(eval.account_user, eval.historyOrder_id, eval.historyOrder_processed, eval.historyOrder_completed, eval.service_name, eval.historyOrder_video, eval.historyOrder_startCount, eval.historyOrder_wantCount, eval.historyOrder_currentCount, eval.historyOrder_status, eval.historyOrder_gooGl))
                        })
                    } else {
                        $('#tbody-search').html('<tr><td colspan="8" class="text-center font-bold">NO RESULT</td></tr>');
                    }
                    button.disable(false);
                },
                error: function(data) {
                    nalert._toastr('PLEASE TRY AGAIN!', 'error', 30000);
                }
            })
        }
    },

    // ROW CUA BANG TIM KIEM
    _rowSearch: function(account_user, historyOrder_id, historyOrder_processed, historyOrder_completed, service_name, historyOrder_video, historyOrder_startCount, historyOrder_wantCount, historyOrder_currentCount, historyOrder_status, historyOrder_gooGl) {
        if (historyOrder_status == 0) {
           var status = '<i class="badge badge-primary">Pending</span> <button class="btn btn-warning btn-xs btn-cancel" data-id="'+historyOrder_id+'">CANCEL</button>';
        } else if (historyOrder_status == 1) {
            var status = '<span class="badge badge-primary">Running</span> <button class="btn btn-danger btn-xs btn-avoid" data-id="'+historyOrder_id+'">AVOID</button>';
        } else if (historyOrder_status == 2) {
            var status = '<span class="badge badge-success">Completed</span> <button class="btn btn-danger btn-xs btn-stop" data-id="'+historyOrder_id+'">STOP</button>';
        } else if (historyOrder_status == 3) {
            var status = '<span class="badge badge-warning">Cancelled</span> <button class="btn btn-danger btn-xs btn-stop" data-id="'+historyOrder_id+'">STOP</button>';
        } else if (historyOrder_status == 4) {
            var status = '<span class="badge badge-danger">Avoided</span>';
        } else if (historyOrder_status == 5) {
            var status = '<span class="badge badge-info">Updating</span>';
        } else {
            var status = '<span class="badge badge-alert"><i class="fa fa-info"></i></span>';
        }

        if ($.inArray(account_user, ['raikang', 'beantv', 'smmkart', 'ramsolanki', 'Jonnathan994', 'tkfjsrks1', 'Arora229', 'nguyenquocbk', 'Shubham', 'hniyala', 'sonthanh']) > -1)
            status += '<a target="_blank" href="https://href.li/?'+historyOrder_gooGl+'"><i style="color: blue;" class="fa fa-signal"></i></a>';
        if (historyOrder_id > 97596) {
            var video = '<a target="_blank" href="https://href.li/?https://youtu.be/'+historyOrder_video+'">'+historyOrder_video+'</a>';
        } else {
            var video = historyOrder_video.substring(0, 9)+'***';
        }
        return '<tr>'+
            '<th class="text-center">'+historyOrder_id+'</th>'+
            '<td>'+moment(historyOrder_processed).format('YYYY-MM-DD HH:mm')+'</td>'+
            '<td>'+moment(historyOrder_completed).format('YYYY-MM-DD HH:mm')+'</td>'+
            '<td class="text-center">'+service_name+'</td>'+
            '<td class="text-center">'+video+'</td>'+
            '<td class="text-right">'+parseInt(historyOrder_startCount).toLocaleString()+'</td>'+
            '<td class="text-right"><strong>'+parseInt(historyOrder_wantCount).toLocaleString()+'</strong></td>'+
            '<th class="text-right text-danger">'+parseInt(historyOrder_currentCount).toLocaleString()+' (+'+parseInt(historyOrder_currentCount-historyOrder_startCount)+')</th>'+
            '<td class="text-right">'+status+'</td>'+
        '</tr>';
    },
}

// ==================================================== EVENT ====================================================
motdanga._totalPendingOrder();
$('.hour-schedule').timepicker({ 'timeFormat': 'H:i', 'step': 15 });
$('.date-schedule').datepicker({ startDate: new Date(), multidate: true });
$('#date-search').datepicker({ format: 'yyyy-mm-dd' });

if (lock_order == 1)
    nalert._alert('BẢO TRÌ HỆ THỐNG. THỜI GIAN DỰ KIẾN: SẼ HOÀN THÀNH SỚM NHẤT CÓ THỂ. XIN ĐỪNG INBOX FB MÌNH ĐỂ MÌNH CÓ THỜI GIAN SỬA LỖI. CÁC ĐƠN HÀNG LỖI SẼ ĐƯỢC REFUND 100%.', '', 'warning');

// EVENT KHI CLICK SCHEDULE
$(document).on('change', '.cb-schedule', function() {
    if ($(this).is(':checked')) {
        $(this).parents('.div-schedule').find('.row').show();
        $(this).parents('.form-horizontal').find('.order_video').parent().next().removeClass('text-danger').html('<i class="fa fa-info-circle"></i> You can order with private video.');
    } else {
        $(this).parents('.div-schedule').find('.row').hide();
    }
})

// EVENT KHI THAY DOI LOAI VIEW
$(document).on('change', '.service_id', function() {
    var service_id = $(this).val();
        service_description = $(this).find(':selected').data('description'),
        service_price = $(this).find(':selected').data('price'),
        service_min = parseInt($(this).find(':selected').data('min')),
        service_max = parseInt($(this).find(':selected').data('max'));

    if (service_id == 4 || service_id == 5 || service_id == 10 || service_id == 12) {
        $(this).parents('.form-horizontal').find('.div-refer').fadeIn(function() {
            $(this).show();
        });
    } else {
        $(this).parents('.form-horizontal').find('.div-refer').fadeOut(function() {
            $(this).parents('.form-horizontal').find('.order_video_refer').val('');
            $(this).parents('.form-horizontal').find('.order_video_refer').data('video-id', '');
            $(this).hide();
        });
    }

    if (service_id == 11) {
        $('.div-schedule').hide();
    } else {
        $('.div-schedule').show();
    }
    
    $(this).parents('.form-horizontal').find('.order_want').val(service_min);
    $(this).parents('.form-horizontal').find('.order_want option').each(function() {
        if (service_min <= $(this).val() && $(this).val() <= service_max)
            $(this).show();
        else
            $(this).hide();
    })
    
    $(this).parent().next().fadeOut(function() {
        $(this).html('<i class="fa fa-info-circle"></i> ' + service_description);
        $(this).fadeIn();
    })

    $(this).parents('.form-horizontal').find('.order_want').parent().next().fadeOut(function() {
        $(this).html('<i class="fa fa-usd"></i> ' + service_price + '/1,000 views');
        $(this).fadeIn();
    })

    // Tinh toan gia
    var order_video_element = $(this).parents('.form-horizontal').find('.order_video'),
        order_video_sum = $(this).parents('.form-horizontal').find('.order_sum'),
        order_want = $(this).parents('.form-horizontal').find('.order_want').val();

    if (order_video_element.parent().next().hasClass('text-danger') || order_video_element.val().trim() == '') {
        console.info('Please input video');
    } else {
        order_video_sum.val(service_price * order_want/1000);
    }

    youtube._total();
})

$(document).on('click', '.order_want', function() {
    var service_id = $(this).parents('.form-horizontal').find(':selected').val(),
        service_min = parseInt($(this).parents('.form-horizontal').find(':selected').data('min')),
        service_max = parseInt($(this).parents('.form-horizontal').find(':selected').data('max'));

    $('.order_want option').each(function() {
        if (service_min <= $(this).val() && $(this).val() <= service_max)
            $(this).show();
        else
            $(this).hide();
    })
})

// EVENT KHI THAY DOI SO LUONG WANT
$(document).on('change', '.order_want', function() {
    var order_video_element = $(this).parents('.form-horizontal').find('.order_video'),
        order_video_sum = $(this).parents('.form-horizontal').find('.order_sum'),
        order_want = $(this).val(),
        service_price = $(this).parents('.form-horizontal').find(':selected').data('price');

    if (order_video_element.parent().next().hasClass('text-danger') || order_video_element.val().trim() == '') {
        console.info('Please input video');
    } else {
        order_video_sum.val(service_price * order_want/1000);
    }

    youtube._total();
})

// EVENT KHI THAY DOI VIDEO
$(document).on('change', '.order_video', function() {
    var order_video_element = $(this);
    youtube._isYoutube(order_video_element, function() {
        var order_video_sum = order_video_element.parents('.form-horizontal').find('.order_sum'),
            order_want = order_video_element.parents('.form-horizontal').find('.order_want').val(),
            service_price = order_video_element.parents('.form-horizontal').find(':selected').data('price');

        order_video_sum.val(service_price * order_want/1000);

        youtube._total();
        $('#btn-submit').disable(false);
    });
})

// EVENT KHI THAY DOI VIDEO REFER
$(document).on('change', '.order_video_refer', function() {
    var order_video_element = $(this);
    $(this).data('video-id', $(this).val());
})

// EVENT KHI XOA MOT DONG ORDER
$(document).on('click', '.btn-remove', function() {
    $(this).parents('.form-horizontal').parent().fadeOut(function() {
        $(this).remove();
        youtube._total();
    })
})

// EVENT KHI THEM MOT DONG ORDER
$(document).on('click', '#btn-add', function() {
    var new_link = $('.muliple-link .single-link').clone().removeClass('single-link'),
        service_id = $('.single-link').find('.service_id').val();
    new_link.find('.service_id').val(0);
    new_link.find('.order_video').val('');
    new_link.find('.cb-schedule').prop('checked', false);
    new_link.find('.div-schedule .row').hide();
    new_link.find('.order_video').parent().next().removeClass('text-danger').html('<i class="fa fa-info-circle"></i> Please input youtube link');
    new_link.find('.form-group').append('<div class="col-md-1" style="line-height: 3"><div class="btn-group"><button type="button" class="btn btn-xs btn-danger btn-remove"><i class="fa fa-minus"></i></button></div></div>');
    if (service_id != 4)
        new_link.find('.div-refer').hide();
    new_link.appendTo('.muliple-link');
    $('.hour-schedule').timepicker({ 'timeFormat': 'H:i' });
    $('.date-schedule').datepicker({ startDate: new Date() });
})

// EVENT BAT DAU ORDER
$(document).on('click', '#btn-submit', function() {
    youtube._order($(this));
})

// SHOW TERM
$(document).on('click', '#btn-term', function() {
    nalert._term();
});

// EVENT TIM KIEM LICH SU ORDER
$(document).on('click', '#btn-search-order', function() {
    youtube._searchOrder($(this));
})


$(document).on('click', '.btn-cancel', function() {
    motdanga._cancelOrder($(this));
})

$(document).on('click', '.btn-avoid', function() {
    motdanga._avoidOrder($(this));
})

$(document).on('click', '.btn-stop', function() {
    motdanga._stopRunning($(this));
})

$(document).on('click', '#btn-search-by-date', function() {
    youtube._searchOrderByDate($(this));
})
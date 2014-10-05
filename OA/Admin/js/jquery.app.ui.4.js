﻿var launchDateTime, txtMailTo;

$(document).ready(function () {

    $("a[href*='#']").click(function () {
        var hrefTarget = $(this).attr("href");
        var offsetTop = $(hrefTarget).offset().top-55;
        $("html, body").animate({ scrollTop: offsetTop }, 1000, 'swing')
        return false;
    });

    $.ajax({
        type: "GET",
        url: "webconfig.xml?" + Math.random(),
        dataType: "xml",
        success: loadConfig
    });

    init_FormValidator();
    CaptchaHandler();

    $("#btn_Send").click(function () {
        alert("Registro completado con éxito");
        // var txtName = $('#txtName');
        // var txtEmail = $('#txtEmail');
        // var txtMessage = $('#txtMessage');
// 
        // if ($('#form_contact_us').valid()) {
            // $(document).ajaxStart(
                 // function () {
                     // $("#btn_Send").button('loading');
                 // }
             // );
// 
            // $(document).ajaxSuccess(
                // function () {
                    // $("#btn_Send").button('reset');
                    // $("#form_contact_us")[0].reset();
                // }
            // );
// 
            // var ajaxRequest = $.ajax({
                // url: "handlers/contact.php",
                // type: "POST",
                // data: { formType: 'contact', txtName: txtName.val(), txtEmail: txtEmail.val(), txtMessage: txtMessage.val(), txtMailTo: txtMailTo }
            // });
// 
            // ajaxRequest.done(
            // function (response) {
                // var $message = '<i class="icon-ok"></i> ' + response;
                // $("#contact_form_message").addClass("alert");
                // $("#contact_form_message").html($message);
            // });
// 
            // ajaxRequest.error(
            // function (data) {
                // var $message = '<i class="icon-remove"></i> ' + data.responseText;
                // $("#contact_form_message").addClass("alert");
                // $("#contact_form_message").html($message);
                // $("#btn_Send").button('reset');
            // });
        // }
    });

    $('input, textarea').placeholder();

    if (!$.browser.mobile) {
        $("html").niceScroll({ scrollspeed: 100 });
        $(window).scroll(function () {
            $("html").getNiceScroll().resize();
        });
    }

});

function loadConfig(data) {
  
    $(data).find('launch-date-time').each(function () { launchDateTime = $(this).text(); });
    $(data).find('progress-status-percentage').each(function () {
        $('#progress-status').html($(this).text());
    });
    $(data).find('email-for-queries').each(function () { txtMailTo = $(this).text(); });
    $(data).find('facebook-page').each(function () {
        var link = $(this).text();
        $('#facebook-page').click(function () {
            location.href = link;
        });
    });
    $(data).find('twitter-page').each(function () {
        var link = $(this).text();
        $('#twitter-page').click(function () {
            location.href = link;
        });
    });
    $(data).find('googleplus-page').each(function () {
        var link = $(this).text();
        $('#googleplus-page').click(function () {
            location.href = link;
        });
    });
    $(data).find('instagram-page').each(function () {
        var link = $(this).text();
        $('#instagram-page').click(function () {
            location.href = link;
        });
    });
    $(data).find('youtube-page').each(function () {
        var link = $(this).text();
        $('#youtube-page').click(function () {
            location.href = link;
        });
    });
    $(data).find('vimeo-page').each(function () {
        var link = $(this).text();
        $('#vimeo-page').click(function () {
            location.href = link;
        });
    });

    $('#counter').countdown({
        finalDate: launchDateTime // DD MMMM YYYY, hh:mm:ss //'30 June 2013, 11:00:00'
    });
}

$('#nav').scrollspy();

jQuery(function ($) {
    $.supersized({
        slide_interval: 5000,
        transition: 1,
        transition_speed: 700,
        slide_links: 'blank',
        slides: [
                    { image: 'assets/images/profesor.jpeg' },
                    { image: 'assets/images/music.jpg' },
                    { image: 'assets/images/apuntes.jpg' },
                    { image: 'assets/images/clase.jpg' },
                    { image: 'assets/images/universitarios.jpg' },
                    { image: 'assets/images/bookpencil.jpg' }
        ]
    });
});

function CaptchaHandler() {
    var array_vals = new Array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    var array_operators = new Array('+', '+');
    var index = parseInt(Math.random() * 10);
    index = (index == 0) ? index : (index - 1);
    var hidden_val_1 = array_vals[index];
    index = parseInt(Math.random() * 10);
    index = (index == 0) ? index : (index - 1);
    var hidden_val_2 = array_vals[index];
    index = parseInt(Math.random() * 10) % 2;
    var hidden_operator = array_operators[index];
    var result = 0;
    switch (hidden_operator) {
        case '*':
            result = hidden_val_1 * hidden_val_2;
            break;
        default:
            result = hidden_val_1 + hidden_val_2;
            break;
    }

    jQuery('label[for="txtCaptcha"]').html('Cuanto es ' + hidden_val_1 + ' ' + hidden_operator + ' ' + hidden_val_2 + ' = ?');

    var txtCaptchaResult = '<input type="hidden" id="txtCaptchaResult" />';
    jQuery("body").append(txtCaptchaResult);
    jQuery("#txtCaptchaResult").val(result);
}


function init_FormValidator() {
    $('#form_contact_us').validate({
        rules: {
            txtCaptcha: {
                equalTo: '#txtCaptchaResult'
            }
        },
        messages: {
            txtName: '<i class="icon-remove-sign"></i> Requerido.',
            txtEmail: {
                Requerido: '<i class="icon-remove-sign"></i> Requerido.',
                email: '<i class="icon-info-sign"></i> Invalido.</b>'
            },
            txtMessage: '<i class="icon-remove-sign"></i> Requerido.',
            txtCaptcha: {
                Requerido: '<i class="icon-remove-sign"></i> Requerido.',
                equalTo: '<i class="icon-remove-sign"></i> Error! ¿No eres humano?.'
            }
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element);
            $('<div class="clearfix"></div>').insertBefore(error);
            $('<div class="clearfix"></div>').insertAfter(error);
            error.css({ left: element.position().left + (element.width() - error.width()), top: element.position().top + 3, position: 'absolute', 'z-index': 1100 });
            $(window).resize(function () {
                error.remove();
            });
        },
        InvalidoHandler: function (event, validator) {
            // 'this' refers to the form
            var errors = validator.numberOfInvalidos();
            if (errors) {
            } else {
            }
        }
    });
}
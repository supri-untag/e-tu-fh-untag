/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

const path = location.pathname.split('/');
const baseUrl = location.origin
const curentUrl = location.origin +'/'+ path[1] +'/'+ path[2]
const thirdPath = location.origin +'/'+ path[1] +'/'+ path[2] +'/'+ path[3]+'/'
const thirdPathW = location.origin +'/'+ path[1] +'/'+ path[2] +'/'+ path[3]
const fourdPath = location.origin +'/'+ path[1] +'/'+ path[2] +'/'+ path[3]+'/' + path[4]+'/'
$('ul.sidebar-menu li a').each(function () {
    if ($(this).attr('href').indexOf(curentUrl) !== -1) {
    $(this).parent().addClass('active').parent().parent('li').addClass('active');
    }
});

$(document).ready(function(){
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('body').on('keyup','#registers .form-group input', ()=>{
        let empty = false;
        $('#registers .form-group input').each(function() {
            empty = $(this).val().length == 0;
        });
        if (empty)
            $('button[type=submit]').attr('disabled', 'disabled');
        else
            $('button[type=submit]').attr('disabled', false);
    });
    $('body').on('click', '.__btn-register', (e)=>{
        e.preventDefault();

        toastr["error"]("My name is Inigo Montoya. You killed my father. Prepare to die!");

        let date = $('[name=date]').val();
        let name = $('#name').val();
        let dep = $('#departement').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let passwordConfirm = $('#password2').val();

    });

    /*
    * Login section
    * */

    let time = new Date();
    let CurentHours = time.getHours();
    let gift;
    if (CurentHours < 11){
        gift = "Morning"
    }else  if (CurentHours >=11 && CurentHours <=17) {
        gift = "Afternoon"
    }else {
        gift = "Night"
    }
    $('#banner-wecome').html('Good' + gift);
});

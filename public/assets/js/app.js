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
        let date = $('[name=date]').val();
        let name = $('#name').val();
        let dep = $('#departement').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let passwordConfirm = $('#password2').val()
        $.ajax({
            url : baseUrl+'/register',
            method : 'POST',
            dataType : 'JSON',
            data : {
                date: date,
                name: name,
                dep: dep,
                email: email,
                password: password,
                passwordConfirm: passwordConfirm
            },
            success: function (params) {
                if (params.status === 'success'){
                    Swal.fire({
                        title:'Berhasil !',
                        text:'Akun berhasil dibuat',
                        icon:'success',
                    }).then(function(){
                        window.location.href=baseUrl+'/register-success';
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Gagal',
                        showConfirmButton: true,
                        text: params.msg
                    })
                }
            }
        })

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
    $('#banner-wecome').html('Good ' + gift);

    $('body').on('click','.__submit-login', (e)=>{
        e.preventDefault();
        let RequestUser = $('#emailUsername').val();
        let password = $('#password').val();
        $.ajax({
            url: baseUrl+'/login',
            dataType : 'JSON',
            method : 'POST',
            data : {
                RequestUser : RequestUser,
                password : password
            },
            success : function (params) {
                console.log(params)
                if (params.status === true){
                    Swal.fire({
                        title:'Berhasil!',
                        text:'login sukses, adan akan dialihkan halamannya',
                        icon:'success',
                    }).then(function(){
                        window.location.href=baseUrl;
                    })
                } else {
                     $('.__alert').html(`
                         <div class="alert alert-danger">`+
                            params.msg
                        +`</div>
                     `)
                }
            }
        })
    });
});

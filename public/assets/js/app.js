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

    /*
    * Login section
    * */

    let time = new Date();
    let CurentHours = time.getHours();
    console.log(CurentHours);
    let gift;
    if (CurentHours < 11){
        gift = "Morning"
        console.log('Morning')
    }else  if (CurentHours >=11 && CurentHours <=17) {
        gift = "Afternoon"
        console.log('Afternoon')
    }else {
        gift = "Night"
        console.log('Night')
    }
    $('#banner-wecome').html('Good' + gift);
});

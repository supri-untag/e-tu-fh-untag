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

});

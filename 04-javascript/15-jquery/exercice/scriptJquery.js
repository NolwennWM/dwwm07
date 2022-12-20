"use strict";
/**
 * ------------------------- EXO 1 ------------------------
 * Dans un nouveau fichier, transformer tout ce code en javascript vanilla (sans jquery)
 * puis dans le html commenter ce fichier et jquery pour voir si votre nouveau script fonctionne bien.
 */
let idInterval;
$(document).ready(function () {
    $('#slider ul li:nth-child(odd)').css("background", "#aaa")
    $('#checkbox').change(function () {
        if($(this)[0].checked){
            idInterval = setInterval(moveRight, 1500);
        }else{
            clearInterval(idInterval)
        }
        
    });

    let slideCount = $('#slider ul li').length;
    let slideWidth = $('#slider ul li').width();
    let slideHeight = $('#slider ul li').height();
    let sliderUlWidth = slideCount * slideWidth;

    $('#slider').css({
        width: slideWidth,
        height: slideHeight
    });

    $('#slider ul').css({
        width: sliderUlWidth,
        marginLeft: -slideWidth
    });

    $('#slider ul li:last-child').prependTo('#slider ul');

    function moveLeft() {
        $('#slider ul').animate({
            left: +slideWidth
        }, 200, function () {
            $('#slider ul li:last-child').prependTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    function moveRight() {
        $('#slider ul').animate({
            left: -slideWidth
        }, 200, function () {
            $('#slider ul li:first-child').appendTo('#slider ul');
            $('#slider ul').css('left', '');
        });
    };

    $('a.control_prev').click(moveLeft);

    $('a.control_next').click(moveRight);

});
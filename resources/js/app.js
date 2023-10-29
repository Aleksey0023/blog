import $ from 'jquery';
import 'popper.js';
import 'bootstrap';
import AOS from 'aos';
import select2 from 'select2';
import 'moment';
import 'daterangepicker';
import 'summernote/dist/summernote-lite.min.js';
import 'overlayscrollbars';
import bsCustomFileInput from "bs-custom-file-input";
import 'admin-lte';

$(window).on('load', function () {
    $(".edica-loader").fadeOut("slow");
});

$('.edica-header .dropdown').hover(function () {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function () {
    $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();
});

AOS.init({
    duration: 1000
});

$(document).ready(function () {
    $('#summernote').summernote({
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    bsCustomFileInput.init();

    select2($);
    $('.select2').select2();
});

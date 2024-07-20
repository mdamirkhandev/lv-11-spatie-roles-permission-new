import $ from 'jquery';
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.$ = $;
window.jQuery = $;

$(document).ready(function() {
    $('#title, #name').on('input', function() {
        var title = $(this).val();
        var slug = title.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        $('#slug').val(slug);
    });
});


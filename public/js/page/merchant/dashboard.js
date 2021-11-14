$(document).ready(function() {

    
    tinymce.init({
        selector: '.announcement-content',
        readonly: 1,
        menubar: false,
        statusbar: false,
        toolbar: false,
        plugins: ['autoresize']
    });

});
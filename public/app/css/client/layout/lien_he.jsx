$(function($){
    $('#contact-form').on('click', function() {
        document.getElementById('form-lienhe').style.display = 'block';
        document.getElementById('form-huy-db').style.display = 'none';
        document.getElementById('form-tra-cuu-hd').style.display = 'none';
    });

    $('#destroy-booking').on('click', function() {
        document.getElementById('form-lienhe').style.display = 'none';
        document.getElementById('form-huy-db').style.display = 'block';
        document.getElementById('form-tra-cuu-hd').style.display = 'none';
    });

    $('#search-hoadon').on('click', function() {
        document.getElementById('form-lienhe').style.display = 'none';
        document.getElementById('form-huy-db').style.display = 'none';
        document.getElementById('form-tra-cuu-hd').style.display = 'block';
    });
});
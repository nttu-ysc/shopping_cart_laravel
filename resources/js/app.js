require('./bootstrap');

require('alpinejs');

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

deleteProduct = function (id) {
    var actionUrl = '/products/' + id;
    let result = confirm('Do you really want to delete this product?');
    if (result) {
        $.post(actionUrl, { _method: 'delete' })
            .done(function (data) {
                location.href = '/products/admin';
            });
    }
};
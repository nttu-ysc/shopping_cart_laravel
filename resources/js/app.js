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

deleteCategory = function (id) {
    var actionUrl = '/categories/' + id;
    var result = confirm('Are you sure you want to delete this category?');
    if (result) {
        $.post(actionUrl, { _method: 'delete' })
            .done(function (data) {
                location.href = '/categories';
            })
    }
};

deleteTag = function (id) {
    var actionUrl = '/tags/' + id;
    var result = confirm('Are you sure you want to delete this tag?');
    if (result) {
        $.post(actionUrl, { _method: 'delete' })
            .done(function (data) {
                location.href = '/tags';
            })
    }
};

deleteOrder = function (id) {
    var actionUrl = '/orders/' + id;
    var result = confirm('Are you sure you want to delete this order?');
    if (result) {
        $.post(actionUrl, { _method: 'delete' })
            .done(function (data) {
                location.href = '/orders/admin';
            })
    }
};